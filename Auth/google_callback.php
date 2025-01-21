<?php


include('../Database/db.php');


Use Dotenv\Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

include('../vendor/autoload.php');

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

/////=====================================...Google Authentication Start...========================================================//////

$client = new Google\Client;

$client ->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);




$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

$client->setAccessToken($token["access_token"]);

// echo $token["access_token"];

$oauth = new  Google\Service\Oauth2($client);

$userinfo = $oauth->userinfo->get();


//    $userinfo->email,
//     $userinfo->familyName,
//     $userinfo->givenName,
//     $userinfo->name,
//     $userinfo->picture,
//     $userinfo->id


$email = $userinfo->email;
$familyName = $userinfo->familyName;
$givenName = $userinfo->givenName;
$name = $userinfo->name;
$picture = $userinfo->picture;
$id = $userinfo->id;

$check = "SELECT * FROM users WHERE Email = '$email'";
$check_query = mysqli_query($conn, $check);
$row = mysqli_fetch_assoc($check_query);
$id = $row['SN'];


if (!isset($_GET["code"])) {
    exit("Login failed");
} else {
    // Assuming $check_query is already defined and executed
    if (mysqli_num_rows($check_query) > 0) {
        session_start();
        $_SESSION['google_auth'] = $id;
        header("Location: http://localhost/PortfolioReady/portal/home.php?uid=$id");
    } else {
        // Insert user into database
        $insert = "INSERT INTO users (First_Name, Last_Name, Email, avatar, Pass, Reg_Date) VALUES ('$givenName', '$familyName', '$email', '$picture', 'portfolio1234', NOW())";
        $insert_query = mysqli_query($conn, $insert);
        
        if ($insert_query) {
            $id = mysqli_insert_id($conn);

            session_start();
            $_SESSION['google_auth'] = $id;
            header("Location: http://localhost/PortfolioReady/portal/home.php?uid=$id");
        } else {
            exit("Database insertion failed");
        }
    }

    exit();
}

?>
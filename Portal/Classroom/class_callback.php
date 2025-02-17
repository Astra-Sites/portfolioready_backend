<?php
require '../../vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig('credentials.json');
$client->setRedirectUri('http://localhost/portfolioready/portal/classroom/class_callback.php'); // Change to your redirect URI
$client->addScope([
    "https://www.googleapis.com/auth/classroom.courses.readonly",
    "https://www.googleapis.com/auth/classroom.rosters.readonly",
    "https://www.googleapis.com/auth/classroom.coursework.students.readonly"
]);
$client->setAccessType('offline');

if (!isset($_GET['code'])) {
    die("Error: No authorization code provided.");
}

// Exchange authorization code for an access token
$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

if (isset($token['error'])) {
    die("Error fetching token: " . $token['error']);
}

// Store token securely in an HTTP-only cookie
setcookie("access_token", json_encode($token), time() + 3600, "/", "", false, true);

// Redirect to home page
header("Location: home.php");
exit();


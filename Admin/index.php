<?php
// connect to the database
include "../Database/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email = ? AND User_Role = 'admin'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Get the user information
        $user = $result->fetch_assoc();
        if (password_verify($pass, $user['Pass'])) {
            $_SESSION['email'] = $user['Email'];
            $_SESSION['name'] = $user['First_Name'] . ' ' . $user['Last_Name'];
            $_SESSION['id'] = $user['SN'];
            $_SESSION['avatar'] = $user['Avatar'];

            // Get the user ID
            $id = $stmt->insert_id ? $stmt->insert_id : $conn->query("SELECT SN FROM users WHERE Email = '$email'")->fetch_object()->SN;

            // Store user information in session
            $_SESSION['email_auth'] = $id;

            // Redirect to home page
            header('location: dashboard.php');
            exit();
        } else {
            echo "<script>alert('Incorrect email or password');</script>";
        }
    } else {
        echo "<script>alert('Incorrect email or password');</script>";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- Boostrap css -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Font awesome css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<!-- Custom css -->
<link rel="stylesheet" href="style.css">

<style>
    body{
        margin: 0;
        padding: 0;
        background-color: #f1f1f1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;

    }
    .google-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    background-color: #ffffff;
    border: 1px solid #dfdfdf;
    border-radius: 4px;
    color: #333333;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.google-btn img {
    width: 30px;
    margin-right: 10px;
}

.google-btn:hover {
    background-color:rgb(255, 255, 255);
}
</style>
<body style="text-align: center;">

    <form class="form-signin">

       <div class="top d-flex justify-content-center flex-column align-items-center mb-4">
        <img class="mb-4" src="../assets/images/gree.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">PortfolioReady</h1>
       </div> 

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control mb-4" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label class="d-flex justify-content-left align-items-center my-3">
         <span>Forgot Password? <a href="">Reset</a></span> 
        </label>
      </div>
      <button class="btn btn-lg btn-success btn-block mb-4" type="submit">Sign in</button>
       
      <!-- OR separator -->
        <div class="d-flex align-items-center mb-4">
            <div class="flex-grow-1 border-top"></div>
            <span class="mx-2 text-muted">OR</span>
            <div class="flex-grow-1 border-top"></div>
        </div>

      <button class="google-btn">
        <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google Logo">
        <span>Continue with Google</span>
      </button>
      <p class="mt-5 mb-3 text-muted">© 2024-2025</p>
    </form>


</body>
</html>



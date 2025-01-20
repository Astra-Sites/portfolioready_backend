
<?php


// Include database connection
include('database/db.php'); // Adjust the path to your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted email and password
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Check if the email exists in the database
    $query = "SELECT * FROM users WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        $sn = $user['SN'];

        // Verify the password
        if (password_verify($password, $user['Pass'])) {
            // Start a session and set session variables
            session_start();
            $_SESSION['user_id'] = $user['SN'];
            $_SESSION['email'] = $user['Email'];
            $_SESSION['name'] = $user['First_Name'];

            // Redirect to the user's home page
            header("Location: portal/home.php?uid=$sn");
            exit();
        } else {
            echo '<style>
                   #pass{border:1px solid red;}
               </style>
               
                <div class="alert alert-danger container w-50 mt-3" style="font-size:15px;" role="alert">
                  Incorrect Password
               </div>
               
               ';
        }
    } else {
      echo '
         <div class="alert alert-danger container w-50 mt-3" style="font-size:15px;" role="alert">
            No user found! kindly register if you have not!
         </div>

         <style>
         #email{border:1px solid red;}
         </style>';
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <!-- Boostrap css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="Assets/CSS/login.css">
</head>
<body>

<section class="form-container container">
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
      <h3>Login Now</h3>
      <p>Your Email <span>*</span></p>
      <input type="email" name="email" id="email" placeholder="Enter your email" required maxlength="50" class="box">
      <p>Your Password <span>*</span></p>
      <input type="password" name="password" id="pass" placeholder="Enter your password" required maxlength="20" class="box">
      <p><a href="reset.php">Forgot Password?</a></p>
      <input type="submit" value="Login Now" name="submit" class="btn">
      <p>Don't Have an Account Yet? <a href="sign-up.php">Sign Up</a></p>
   </form>
</section>


<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

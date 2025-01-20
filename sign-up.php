
<?php

// Include database connection
include('database/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['pass']));
    $confirmPassword = htmlspecialchars(trim($_POST['c_pass']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             echo "<script>alert('Invalid email format!');</script>";
        exit;
    }

    // Check for existing user
    $checkEmail = $conn->prepare("SELECT * FROM Users WHERE Email = ?");
    $checkEmail->bind_param('s', $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email is already registered!');</script>";
        exit;
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
        exit;
    }

    // Password strength validation
    if (strlen($password) < 8 || 
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/\d/', $password) || 
        !preg_match('/[@$!%*?&]/', $password)) {
        echo "<script>alert('Password must be at least 8 characters long and include uppercase, lowercase, a number, and a special character.');</script>";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);



            // Insert data into database
            $sql = "INSERT INTO Users (First_Name, Last_Name,Phone, Email,Pass, Reg_Date) 
                    VALUES (?, ?, ?, ?,?, NOW())";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssss', $firstName, $lastName,$phone, $email, $hashedPassword);

            if ($stmt->execute()) {
                echo "<script>alert('Registration successful!');</script>";
            } else {
                echo "<script>alert('Error: Could not register. Please try again later.');</script>";
            }
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="Assets/CSS/login.css">

</head>
<body style="height: 150vh; display: flex; align-items: center; justify-content: center;">
<section class="form-container">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data"> 
   <h3>register now</h3>
   <p>Your First name <span>*</span></p>
   <input type="text" name="first_name" placeholder="enter your first name" required maxlength="50" class="box">

   <p>Your Last name <span>*</span></p>
   <input type="text" name="last_name" placeholder="enter your last name" required maxlength="50" class="box">

   <p>Your Phone Number <span>*</span></p>
   <input type="text" name="phone" placeholder="+254**" required maxlength="50" class="box">

   <p>Your email <span>*</span></p>
   <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">

   <p>Your password <span>*</span></p>
   <input type="password" name="pass" placeholder="enter your password" required maxlength="20" class="box">

   
   <p>Confirm password <span>*</span></p>
   <input type="password" name="c_pass" placeholder="confirm your password" required maxlength="20" class="box">


   <input type="submit" value="register now" name="submit" class="btn">
</form>

 </section>



</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
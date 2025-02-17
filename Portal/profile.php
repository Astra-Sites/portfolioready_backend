<?php
session_start();
if (!isset($_SESSION['google_auth']) && !isset($_SESSION['github_auth']) && !isset($_SESSION['email_auth'])) {
   header('location: ../AUTH/index.php');
   exit();
}

require_once('../Database/db.php');

// Check which session variable is set and get the user ID
$id = isset($_SESSION['google_auth']) ? $_SESSION['google_auth'] : (isset($_SESSION['github_auth']) ? $_SESSION['github_auth'] : $_SESSION['email_auth']);

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM users WHERE SN = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$details = $result->fetch_object();

$profileImage = htmlspecialchars($details->Avatar, ENT_QUOTES, 'UTF-8'); // Sanitize output
$name = htmlspecialchars($details->First_Name, ENT_QUOTES, 'UTF-8'); // Sanitize output
$email = htmlspecialchars($details->Email, ENT_QUOTES, 'UTF-8'); // Sanitize output

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="home.php" class="logo">PortfolioReady</a>

      <form action="search.php" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <!-- <img src="images/pic-1.jpg" class="image" alt=""> -->
         <img src="<?php echo $profileImage; ?>" class="image" alt="">
         <h3 class="name"><?php echo$name;  ?></h3>
         <p class="role">student</p>
         <a href="profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="<?php echo$profileImage ?>" class="image" alt="">
      <h3 class="name"><?php echo$name; ?></h3>
      <p class="role">student</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="home.php"><i class="fas fa-home"></i><span>home</span></a>
      <a href="about.php"><i class="fas fa-question"></i><span>about</span></a>
      <a href="courses.php"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact.php"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>

</div>

<section class="user-profile">

   <h1 class="heading">your profile</h1>

   <div class="info">

      <div class="user">
         <img src="<?php echo $profileImage?>" alt="">
         <h3><?php echo $name ?></h3>
         <p>student</p>
         <a href="update.php" class="inline-btn">update profile</a>
      </div>
   
      <div class="box-container">
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-bookmark"></i>
               <div>
                  <span>4</span>
                  <p>saved playlist</p>
               </div>
            </div>
            <a href="#" class="inline-btn">view playlists</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-heart"></i>
               <div>
                  <span>33</span>
                  <p>videos liked</p>
               </div>
            </div>
            <a href="#" class="inline-btn">view liked</a>
         </div>
   
         <div class="box">
            <div class="flex">
               <i class="fas fa-comment"></i>
               <div>
                  <span>12</span>
                  <p>videos comments</p>
               </div>
            </div>
            <a href="#" class="inline-btn">view comments</a>
         </div>
   
      </div>
   </div>

</section>














<footer class="footer">

   &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>
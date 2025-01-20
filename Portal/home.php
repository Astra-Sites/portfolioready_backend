<?php

// session_start();
// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // Redirect to the homepage
//     header("Location: ../login.php");
//     exit(); // Ensure no further code is executed
// }


// include('../Database/db.php');

// $id = $_GET['uid'];

// $sql ="SELECT * FROM users where SN = $id"; 
// $result = mysqli_query($conn, $sql);
// $user = $result->fetch_assoc();
// $f_name = $user['First_Name'];
// $l_name = $user['Last_Name'];
// $profile = $user['Profile'];


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
$client->setRedirectUri("http://localhost/PortfolioReady/portal/home.php");


if (!isset($_GET["code"])){
    exit("Login failed");
}


$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

$client->setAccessToken($token["access_token"]);

echo $token["access_token"];

$oauth = new  Google\Service\Oauth2($client);

$userinfo = $oauth->userinfo->get();


// var_dump(
//     $userinfo->email,
//     $userinfo->familyName,
//     $userinfo->givenName,
//     $userinfo->name,
//     $userinfo->picture,
//     $userinfo->id
// );


// ==========================================GITHUB AUTH=====================================//


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header class="header">
   
   <section class="flex">


       <a href="home.php" class="logo">PortfoioReady</a> 

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


         <!-- Display Profile Image -->
      <?php if (!empty($profileImage) && file_exists($profileImage)): ?>
         <img src="<?php echo htmlspecialchars($profile); ?>" class="image" alt="Profile Picture">
      <?php else: ?>
         <img src="<?php echo $userinfo->picture?>" class="image" alt="">
      <?php endif; ?>

          <h3 class="name"><?php echo$userinfo->name; ?></h3>
         <p class="role">student</p>
         <a href="profile.php?uid=<?php echo$id?>" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.php?uid=<?php echo$id?>" class="option-btn">login</a>
            <a href="register.php?uid=<?php echo$id?>" class="option-btn">register</a>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="<?php echo $userinfo->picture?>" class="image" alt="">
      <h3 class="name"><?php echo$userinfo->name; ?></h3>
      <p class="role">student</p>
      <a href="profile.php?uid=<?php echo$id?>" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="home.php?uid=<?php echo$id?>"><i class="fas fa-home"></i><span>home</span></a>
      <a href="about.php?uid=<?php echo$id?>"><i class="fas fa-question"></i><span>about</span></a>
      <a href="courses.php?uid=<?php echo$id?>"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers.php?uid=<?php echo$id?>"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact.php?uid=<?php echo$id?>"><i class="fas fa-headset"></i><span>contact us</span></a>
      <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Logout</span></a>
   </nav>

</div>

<section class="home-grid">


   <h1 class="heading">DashBoard</h1>

   <div class="box-container" style="margin-bottom:2rem;">

      <div class="box">
         <h3 class="title">Courses Enrolled</h3>
         <h3 class="likes">4</h3>
         <div class="flex">
               <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>View Courses</span></a>
         </div>
      </div>


      <div class="box">
         <h3 class="title">Certificates Earned</h3>
         <h3 class="likes">2</h3>
         <div class="flex">
               <a href="#"><i class="fa fa-trophy" aria-hidden="true"></i><span>View Certificates</span></a>
         </div>
      </div>      
      
      <div class="box">
         <h3 class="title">Recent Course</h3>
         <h3 class="likes">Introduction to Html and Css</h3>
         <a href="#" class="inline-btn">Resume Learning</a>
      </div>
      <div class="box">
         <h3 class="title">Recent Projects</h3>
         <h3 class="likes">Introduction to Html and Css</h3>
         <a href="#" class="inline-btn">Resume Project</a>
      </div>
   </div>

   <h1 class="heading">quick options</h1>

   <div class="box-container">
      <div class="box">
         <h3 class="title">likes and comments</h3>
         <p class="likes">total likes : <span>25</span></p>
         <a href="#" class="inline-btn">view likes</a>
         <p class="likes">total comments : <span>12</span></p>
         <a href="#" class="inline-btn">view comments</a>
         <p class="likes">saved playlists : <span>4</span></p>
         <a href="#" class="inline-btn">view playlists</a>
      </div>

      <div class="box">
         <h3 class="title">top categories</h3>
         <div class="flex">
            <a href="#"><i class="fas fa-code"></i><span>development</span></a>
            <a href="#"><i class="fas fa-chart-simple"></i><span>business</span></a>
            <a href="#"><i class="fas fa-pen"></i><span>design</span></a>
            <a href="#"><i class="fas fa-chart-line"></i><span>marketing</span></a>
            <a href="#"><i class="fas fa-music"></i><span>music</span></a>
            <a href="#"><i class="fas fa-camera"></i><span>photography</span></a>
            <a href="#"><i class="fas fa-cog"></i><span>software</span></a>
            <a href="#"><i class="fas fa-vial"></i><span>science</span></a>
         </div>
      </div>

      <div class="box">
         <h3 class="title">popular topics</h3>
         <div class="flex">
            <a href="#"><i class="fab fa-html5"></i><span>HTML</span></a>
            <a href="#"><i class="fab fa-css3"></i><span>CSS</span></a>
            <a href="#"><i class="fab fa-js"></i><span>javascript</span></a>
            <a href="#"><i class="fab fa-react"></i><span>react</span></a>
            <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
            <a href="#"><i class="fab fa-bootstrap"></i><span>bootstrap</span></a>
         </div>
      </div>

      <div class="box">
         <h3 class="title">become a tutor</h3>
         <p class="tutor">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, nam?</p>
         <a href="teachers.php?uid=<?php echo$id?>" class="inline-btn">get started</a>
      </div>
   </div>
</section>

<section class="courses">
   <h1 class="heading">Video tutorials</h1>
   <div class="box-container">
      <div class="box">
         <div class="tutor">
            <img src="images/pic-2.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="playlist.php?uid=<?php echo$id?>" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-3.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-2.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete CSS tutorial</h3>
         <a href="playlist.php?uid=<?php echo$id?>" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-4.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-3.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JS tutorial</h3>
         <a href="playlist.php?uid=<?php echo$id?>" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-5.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-4.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete Boostrap tutorial</h3>
         <a href="playlist.php?uid=<?php echo$id?>" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-6.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-5.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete JQuery tutorial</h3>
         <a href="playlist.php?uid=<?php echo$id?>" class="inline-btn">view playlist</a>
      </div>

      <div class="box">
         <div class="tutor">
            <img src="images/pic-7.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-6.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete SASS tutorial</h3>
         <a href="playlist.php?uid=<?php echo$id?>" class="inline-btn">view playlist</a>
      </div>

   </div>

   <div class="more-btn">
      <a href="courses.php?uid=<?php echo$id?>" class="inline-option-btn">view all courses</a>
   </div>

</section>




<footer class="footer">

   &copy; copyright @ 2024 by <span>Hope Developers</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>
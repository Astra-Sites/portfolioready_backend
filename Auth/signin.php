<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
Use Dotenv\Dotenv;

include('../vendor/autoload.php');
require_once('../Database/db.php');

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

// Signin With Google Account Start
$client = new Google\Client;

$client ->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();

// Google Auth End


// Signin With Microsoft Account Start
$MS_clientId = $_ENV['MICROSOFT_CLIENT_ID'];
$MS_redirectUri = $_ENV['MICROSOFT_REDIRECT_URI'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfoio Ready | Authethication-Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<style>
 body {
    background-color: #f9f9f9;
 }

.logo{
  background-image:url("../assets/img/logobg1.png");
  width: 150px;
  height: 150px;
  background-position:center;
  background-size:contain;
  background-repeat:no-repeat;
}

.card {
    border: none;
    border-radius: 10px;
}

.btn-outline-secondary {
    color: #555;
    border-color: #ddd;
}

.btn-outline-secondary:hover {
    background-color:rgb(184, 184, 184);
    border-color: #ccc;
}

.form-control {
    border-radius: 8px;
}

</style>
    <div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <!-- Logo -->
             <p class="text-center">PortfolioReady</p>
             <!-- <div class="logo  d-flex justify-content-center align-items-center container p-0" style="background-image:url('../assets/images/gree.png');"></div> -->
            <h2 class="text-center font-weight-bold mb-4">Sign In</h2>
            
            <!-- Email Address Input -->
            <form id="signup-form" method="post" action="Email_Callback.php">
                <div class="form-group">
                    <label for="email">Email address<span class="text-danger">*</span></label>
                    <input type="email"  name="email" class="form-control py-2" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="email">Password<span class="text-danger">*</span></label>
                    <input type="pass"  name="pass" class="form-control py-2" id="email" placeholder="Enter your password" required>
                </div>
             
                <div class="my-2">
                  <small>Forgot Password? <a href="#" class="text-success">Reset</a></small>
                </div>

                <button type="submit" name="sendemail" class="btn btn-success btn-block">Continue</button>
            </form>

            <!-- Already have an account -->
            <div class="text-center my-3">
                <small>Don't have account yet? <a href="" class="text-success" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></small><br>
            </div>

            <!-- OR separator -->
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 border-top"></div>
                <span class="mx-2 text-muted">OR</span>
                <div class="flex-grow-1 border-top"></div>
            </div>

            <!-- Social Login Buttons -->
            <div class="mt-3">
                 <a href='<?= $url ?>' class="btn btn-outline-secondary btn-block mb-2 d-flex align-items-center justify-content-center">
                    <img src="google.png" width="20" class="mr-2">
                    Continue with Google Account
                 </a>
                <a href="https://github.com/login/oauth/authorize?client_id=<?php echo$_ENV['GITHUB_CLIENT_ID']; ?>&scope=read:user user:email" class="btn btn-outline-secondary btn-block mb-2 d-flex align-items-center justify-content-center">
                    <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" width="20" class="mr-2">  -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-github text-dark mr-2" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/></svg>
                    Continue with Github Account
                 </a>
                <a href="https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=<?php echo$MS_clientId;?>&response_type=code&redirect_uri= <?php echo$MS_redirectUri; ?>  &scope=openid profile email User.Read" class="btn btn-outline-secondary btn-block d-flex align-items-center justify-content-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" width="20" class="mr-2">
                    Continue with Microsoft Account
                </a>
            </div>
        </div>
    </div>



<!--Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title fs-5" id="exampleModalLabel"> Enter your Email address below to receive the Registration link! </p>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">close</button> -->
      </div>
      <div class="modal-body">
        <form id="signup-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="new_email">Email address<span class="text-danger">*</span></label>
                    <input type="email"  name="new_email" class="form-control py-2" id="email" placeholder="Enter your email" required>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="reg_new">Send Link</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom JS -->
    


<script>
    const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>

</body>
</html>



<!-- send email with registration link -->

<?php


if(isset($_POST['reg_new'])){

    $new_user = $_POST['new_email'];

    #check is user already exist
    $sql = "SELECT * FROM users WHERE email = '$new_user'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 1){
        echo" <script>alert('User already exist')</script>";
    }else{
    
        #send the email with registration link
        $mail = new PHPMailer(true);


        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['GMAIL_USERNAME']; // Your Gmail address
            $mail->Password = $_ENV['GMAIL_APP_PASSWORD']; // Your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            // Recipients
            $mail->setFrom($_ENV['GMAIL_USERNAME'], 'Portfolio Ready'); // From email and name
            $mail->addAddress($new_user, 'Coder Info'); // Add recipient
            $mail->addReplyTo($_ENV['GMAIL_USERNAME'], 'Portfolio Ready'); // Optional: Reply-to email
        
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Register to Portfolio Ready';
            $mail->Body = '<b>Hello!</b> . Click the link below to register your Porfolio Ready account. <a href="http://localhost/PortfolioReady/Auth/email_callback.php">Register</a>';
            $mail->AltBody = 'Hello! This is a test email sent using Gmail and PHPMailer  Welcome to portfolio Ready.';
        
            // start session
            session_start();
            $_SESSION['new_user'] = $new_user;
            #send the email
            $mail->send();

            echo" <script>alert('Registration link sent successfully!')</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }



    }



    echo" <script>alert( '.$new_user.')</script>";
 


}


?>
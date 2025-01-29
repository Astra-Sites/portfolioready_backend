<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
Use Dotenv\Dotenv;

include('../vendor/autoload.php');
require_once('../Database/db.php');

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

if (isset($_POST['reg_new'])) {
    
    $new_user = mysqli_real_escape_string($conn, $_POST['new_email']); // Escape user input
    $token = bin2hex(random_bytes(16)); // Generate a unique token
    $expires_at = date("Y-m-d H:i:s", strtotime('+1 hour')); // Set expiration time to 1 hour from now

    // Check if the user already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $new_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('User already exists');</script>";
    } else {
        // Insert the token into the user_tokens table
        $insert_token = "INSERT INTO user_tokens (email, token, expires_at) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_token);
        $stmt->bind_param("sss", $new_user, $token, $expires_at);

        if ($stmt->execute()) {
            // Send the email with the registration link
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
                $mail->setFrom($_ENV['GMAIL_USERNAME'], 'Portfolio Ready');
                $mail->addAddress($new_user, 'Coder Info');
                $mail->addReplyTo($_ENV['GMAIL_USERNAME'], 'Portfolio Ready');

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Register to Portfolio Ready';
                $mail->Body = '<b>Hello!</b> Click the link below to register your Portfolio Ready account: 
                    <a href="http://localhost/PortfolioReady/Auth/email_callback.php?token=' . urlencode($token) . '">Register</a>';
                $mail->AltBody = 'Hello! Welcome to Portfolio Ready.';

                $mail->send();
                echo "<script>alert('Registration link sent successfully!');</script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "<script>alert('Failed to generate token');</script>";
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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


</body>
</html>


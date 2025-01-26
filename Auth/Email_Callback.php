<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

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

    $mail->addAddress($_POST['email'], 'Coder Info'); // Add recipient

    $mail->addReplyTo($_ENV['GMAIL_USERNAME'], 'Portfolio Ready'); // Optional: Reply-to email




    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from Portfolio Ready';
    $mail->Body = '<b>Hello!</b> This is a test email sent using Gmail and PHPMailer.';
    $mail->AltBody = 'Hello! This is a test email sent using Gmail and PHPMailer  Welcome to portfolio Ready.';

    // Send Email
    $mail->send();
    echo 'Email has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

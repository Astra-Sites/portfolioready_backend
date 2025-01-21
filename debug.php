<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info.portfolioready@gmail.com'; // Your Gmail address
    $mail->Password = 'rrjxfecuevvxhrbq'; // Your Gmail App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('info.portfolioready@gmail.com', 'Portfolio Ready'); // From email and name
    $mail->addAddress('infocoder4@gmail.com', 'Coder Info'); // Add recipient
    $mail->addReplyTo('info.portfolioready@gmail.com', 'Portfolio Ready'); // Optional: Reply-to email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from Portfolio Ready';
    $mail->Body = '<b>Hello!</b> This is a test email sent using Gmail and PHPMailer.';
    $mail->AltBody = 'Hello! This is a test email sent using Gmail and PHPMailer.';

    // Send Email
    $mail->send();
    echo 'Email has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

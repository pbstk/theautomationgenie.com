<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure PHPMailer is installed using Composer
require 'PHPMailer-master/src/PHPMailer.php'
require 'PHPMailer-master/src/SMTP.php'
require 'PHPMailer-master/src/Exception.php'

$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtpout.secureserver.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'sameeraja@theautomationgenie.com';
    $mail->Password = 'YOUR_PASSWORD'; // Use environment variables for security
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('sameeraja@theautomationgenie.com', 'The Automation Genie');
    $mail->addAddress('sameeraja@theautomationgenie.com');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = 'Name: ' . htmlspecialchars($_POST['name']) . '<br>Email: ' . htmlspecialchars($_POST['email']) . '<br>Message: ' . nl2br(htmlspecialchars($_POST['message']));

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

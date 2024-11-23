<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['phone'];
    $speed = $_POST['speed'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ovichowdhury1001@gmail.com'; // Your Gmail address
        $mail->Password = 'hiph azjj bgkw njyd'; // Your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('ovichowdhury1001@gmail.com', 'Comilla Online');
        $mail->addAddress('ovichowdhury1001@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Comilla Online Package Buy';
        $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phone<br>Speed: $speed<br>Message: $message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}

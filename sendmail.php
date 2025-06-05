<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';         
        $mail->SMTPAuth = true;
        $mail->Username = 'daniejosuep994@gmail.com'; 
        $mail->Password = 'Nutty@123';   
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        
        $mail->setFrom('yourgmail@gmail.com', 'Contact Form');
        $mail->addAddress('danieljosuep994@gmail.com'); 
        
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <strong>Name:</strong> " . $_POST['name'] . "<br>
            <strong>Email:</strong> " . $_POST['email'] . "<br><br>
            <strong>Message:</strong><br>" . nl2br($_POST['message']);

        $mail->send();
        echo 'Message has been sent successfully!';
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid Request";
}
?>
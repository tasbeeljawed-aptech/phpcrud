<?php
session_start();
include("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// data get from -> form
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// session create
$_SESSION["username"] = $username;
$_SESSION["email"] = $email;
$_SESSION["password"] = password_hash($password, PASSWORD_DEFAULT);

// create otp
$otp = rand(100000, 999999);
$_SESSION["otp"] =  $otp;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
   
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = $my_email;                     //SMTP username
    $mail->Password   = $app_password;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($my_email, 'TASBEEL JAWED'); //admin email
    $mail->addAddress($email, $username);     //Add a recipient

    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your OTP Code:';
    $mail->Body    = "Your OTP is <b>$otp</b>";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location:verify_otp.php");

    // echo 'Message has been sent';


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




?>
<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send'])){
$email=$_POST['Email'];
$message=$_POST['Message'];
$fullname=$_POST['FullName'];
$PhoneNumber=$_POST['PhoneNumber'];

include 'link/link.php';

$query="INSERT INTO contact (FullName,PhoneNumber,email,message) VALUES ('$fullname','$PhoneNumber','$email','$message')";
$result=mysqli_query($link,$query);

$mail = new PHPMailer(true);
//Server settings
$mail->SMTPDebug = 2; 
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true; 
$mail->Username = 'nmushi249@gmail.com'; //sender email 
$mail->Password = 'qefa hlmx lklk maar'; 
$mail->SMTPSecure = 'tls'; 
$mail->Port = 587; 
//Recipients
$mail->setFrom($email, 'New User'); //sender email
$mail->addAddress('hillarymalya8@gmail.com'); //Add a recipient
//Content
$mail->isHTML(true); 
$mail->Subject = 'Message';
$email_template = $message;
$mail->Body = $email_template;
$mail->send();
echo 'Message has been sent';
header('location:index.html');
}
?>
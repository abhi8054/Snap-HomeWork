<?php
$email = $_GET['emailrec'];
//print_r($email);
if($email == ""){
    echo "<script>alert('Kindly enter email');</script>";
}else{
    require 'PHPMailer/class.phpmailer.php';
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    // $mail->SMTPSecure = 'tls';

    $mail->Username = 'abhishek.kp6239@gmail.com';//Your Email Address
    $mail->Password = 'auaqeitsexxzmkqw';//Your Email Password
    $mail->setFrom('abhishek.kp6239@gmail.com', 'Snap Homework');

    $mail->addAddress($email);//Receiver Email
//$mail->addReplyTo('subhratocoder@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = '';
    $mail->Body = '<h1>Welcomr To Our Comunity</h1>.<br><h3 style="color:red;">Snap HomeWork</h3><br><h3 style="color:red;">Thank you for becomming a member</h3>';


    if (!$mail->send()) {
        echo "Something went wrong";
        echo $mail->ErrorInfo;
    } else {
        echo "Thank you for becomming a member";
    }
}
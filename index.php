<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// // Load Composer's autoloader
require 'vendor/autoload.php';
require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'example@gmail.com';                     // SMTP username
    $mail->Password   = '*****';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('muneebmansoor98@gmail.com', 'muneeb');
    $mail->addAddress('muneebmansoor98@gmail.com', 'muneeb');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('muneebmansoor98@gmail.com', 'muneeb');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    // // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('NC.docx', 'project.docx');    // Optional name

    $body = '';
    $body .= '<b>Testing mail</b><br>';
    $body .= 'This mail send by muneeb for testing';
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'php mailer';
    $mail->Body    = $body;
    $mail->AltBody = 'This mail send by muneeb for testing';
    if($mail->send()){
        echo 'Message has been sent';
    }else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

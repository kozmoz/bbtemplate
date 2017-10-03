<?php

require 'PHPMailer/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer;


    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host       = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = 'STARTTLS';
    $mail->SMTPAuth = true; // authentication enabled
    $mail->Username   = "joriskrijger1993@gmail.com";  // GMAIL username
    $mail->Password   = "Madeinchina1993$";            // GMAIL password
    $mail->setFrom('joriskrijger1993@gmail.com', 'Joris');
    // sets GMAIL as the SMTP server
    $EmailAddress = 'joriskrijger1993@gmail.com';
    $mail->addReplyTo('indokrijger@gmail.com', 'Lokaal Hellendoorn');
    $mail->addAddress('indokrijger@gmail.com', 'Lokaal Hellendoorn');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML
    // Set email format to HTML

    // Get the form fields and remove whitespace.
    $name = trim($_POST["name"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phonenumber = trim($_POST["phonenumber"]);
    $message = trim($_POST["message"]);

    ob_start();

    include 'contactFormEmail.php';
    $email_content = ob_get_clean();

    $mail->Subject = 'Lokaal Hellendoorn - Bericht via het contactformulier';
    $mail->Body = $email_content;


    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;

    } else {
        http_response_code(200);
        $data = array('result' => 'ok');
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
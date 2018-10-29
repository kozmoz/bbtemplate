<?php

require 'PHPMailer/PHPMailerAutoload.php';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

	$mail = new PHPMailer;

	//$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPDebug   = 0;
	$mail->Debugoutput = 'html';
	//$mail->Host       = 'localhost';
	//$mail->Port = 587;
	//$mail->SMTPSecure = 'STARTTLS';
	//$mail->SMTPAuth = true; // authentication enabled
	//$mail->Username   = '';
	//$mail->Password   = '';
	$mail->setFrom( 'info@lokaalhellendoorn.nl', 'Lokaal Hellendoorn website' );
	$mail->addAddress( 'info@lokaalhellendoorn.nl', 'Lokaal Hellendoorn' );
	$mail->isHTML( true );                                  // Set email format to HTML

	// Get the form fields and remove whitespace.
	$name        = trim( $_POST["field1"] );
	$email       = filter_var( trim( $_POST["email"] ), FILTER_SANITIZE_EMAIL );
	$phoneNumber = trim( $_POST["phonenumber"] );
	$message     = trim( $_POST["message"] );

	// Used for spam detection.
    // If this hidden field is filled, reject the message.
    if (isset($_POST["name"]) && $_POST["name"] != '') {
        return;
    }

	ob_start();

	include 'contactFormEmail.php';
	$email_content = ob_get_clean();

	$mail->Subject = 'Lokaal Hellendoorn - Bericht via het contactformulier';
	$mail->Body    = $email_content;

	try {
		if ( ! $mail->send() ) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;

		} else {
			http_response_code( 200 );
			$data = array( 'result' => 'ok' );
			header( 'Content-Type: application/json' );
			echo json_encode( $data );
		}
	} catch ( phpmailerException $e ) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $e->getMessage();
	}
}

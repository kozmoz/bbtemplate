<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
require 'PHPMailer/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $recaptchaSiteKey = '6LfRNBkUAAAAAHZNFcqUEz4UurZezkf82OyYUjvz';
    $recaptchaPrivateKey = '6LfRNBkUAAAAADYuhT4e7aZpahpomO6eAR-drMOt';
    require_once(dirname(__FILE__) . '/recaptchalib.php');

    if( ! isset($_POST['g-recaptcha-response'])) {
        http_response_code(500);
        $data = array('result' => 'error');
        header('Content-Type: application/json');
        echo json_encode($data);
        die();
    }

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptchaPrivateKey . "&response=" . $_POST['g-recaptcha-response']);
    $response = json_decode($response, true);

    if ($response["success"] === true) {

        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                               // Enable verbose debug output

        $EmailAddress = strtolower(get_field('vacature_mail', 'option'));

        $mail->setFrom('noreply@grandduet.nl', 'GrandDuet');
        $mail->addAddress($EmailAddress, 'GrandDuet');     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        // Get the form fields and remove whitespace.
        $name = trim($_POST["name"]);
        $function = trim($_POST["functie"]);
        $phonenumber = trim($_POST["phonenumber"]);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $motivation = trim($_POST["motivation"]);

        for ($ct = 0; $ct < count($_FILES['file']['tmp_name']); $ct++) {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name'][$ct]));
            $filename = $_FILES['file']['name'][$ct];
            if (move_uploaded_file($_FILES['file']['tmp_name'][$ct], $uploadfile)) {
                $mail->addAttachment($uploadfile, $filename);
            } else {
                $msg .= 'Failed to move file to ' . $uploadfile;
            }
        }

        ob_start();
        include 'Email/VacatureFormEmail.php';
        $email_content = ob_get_clean();

        $mail->Subject = "GrandDuet.nl - Aanmelding voor sollicitatie";
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
    } else {
        http_response_code(500);
        $data = array('result' => 'recaptcha error');
        header('Content-Type: application/json');
        echo json_encode($data);
        die();
    }

}
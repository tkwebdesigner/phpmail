<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@tofiquekhan.com';                     //SMTP username
    $mail->Password   = 'sI8ho!C9/c';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@tofiquekhan.com', 'Mailer');
    $mail->addAddress('tofiquekhan688@gmail.com', 'Tofique Khan');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = '<h2>Contact Form Submission</h2>
    <table border="1" cellspacing="0" cellpadding="10" style="border-collapse: collapse; width: 100%;">
        <tr>
            <th style="background: #f2f2f2;">Field</th>
            <th style="background: #f2f2f2;">Value</th>
        </tr>
        <tr>
            <td><b>Full Name</b></td>
            <td>' . $_POST["full_name"] . '</td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td>' . $_POST["email"] . '</td>
        </tr>
        <tr>
            <td><b>Phone Number</b></td>
            <td>' . $_POST["phone_number"] . '</td>
        </tr>
        <tr>
            <td><b>Message</b></td>
            <td>' . nl2br($_POST["message"]) . '</td>
        </tr>
    </table>
';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
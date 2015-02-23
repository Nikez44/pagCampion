<?php

require_once 'PHPMailer/PHPMailerAutoload.php';

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 23/02/2015
 * Time: 08:28 AM
 */

class Application_Service_Email {

    function sentEmail($email, $name, $message){

        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'p3plcpnl0090.prod.phx3.secureserver.net';

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "soporte@tintoreriaseldanubio.com";

        //Password to use for SMTP authentication
        $mail->Password = "KAs?eg5c";

        //Set who the message is to be sent from
        $mail->setFrom('soporte@tintoreriaseldanubio.com', 'Danubio');

        //Set who the message is to be sent to
        $mail->addAddress($email, $name);

        //Set the subject line
        $mail->Subject = 'Here is the subject';

        $mail->Body = $message;

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }

    }

}
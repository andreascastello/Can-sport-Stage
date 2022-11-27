<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['send_mail'])) {

$mail = new PHPMailer;
$br 		= "<br>\r\n";
$to 		= "can-sport@gmail.com";
$fullName	= $_POST['name'];
$subject 	= "MAIL DE : {$fullName}";
$message 	= $_POST['message'];
$message 	= wordwrap($message, 70, $br);
$from 		= $_POST['mail'];

	try {
		//CONF SMTP
		$mail->isSMTP();
		$mail->Host = "localhost";
		$mail->Port = 1025;

		//charset
		$mail->CharSet = "utf-8";

		//Destinataires
		$mail->addAddress($to);

		//Expediteur
		$mail->setFrom($from);

		//Contenu
		$mail->isHTML();

		$mail->Subject = $subject;
		$mail->Body = "NOM COMPLET : " . $fullName . $br . "MAIL : " . $from . $br . "MESSAGE : " . $message;

		//Evoie
		$mail->send();
		echo "<script> alert ('Message envoyé !') </script>";
	} catch (Exception $e) {
		echo "Message non envoyé. Erreur: {$mail->ErrorInfo}";
	}

}
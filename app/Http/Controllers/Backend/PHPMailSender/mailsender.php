<?php
	
require 'PHPMailerAutoload.php';
require 'phpmailer/class.phpmailer.php';
require 'phpmailer/class.smtp.php';

function sendMail($receiver,$sub,$body){

		$mail = new PHPMailer;

		$mail->SMTPDebug = 4;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'ahossain0917@gmail.com';                 // SMTP username
		$mail->Password = 'IITamran0917';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('ahossain0917@gmail.com', 'DU Services System');
		$mail->addAddress($receiver);     // Add a recipient
		$mail->addReplyTo('ahossain0917@gmail.com');


		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $sub;
		$mail->Body    = $body;
	

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}

}

	
 ?>
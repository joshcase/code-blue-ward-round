<?php

	use PHPMailer\PHPMailer\PHPMailer;

	class Emailer {

		function sendEmail(Array $to, String $filename, String $subject, String $body) {
			$mail = new PHPMailer();
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = MAIL_HOST;                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = MAIL_USERNAME;                     // SMTP username
		    $mail->Password   = MAIL_PASSWORD;                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
		    foreach ($to as $toAddress) {
		    	$mail->addAddress($toAddress, ''); 
		    }

		    if ($filename != '') {
		    	$mail->addAttachment($filename); 
		    }

		    // Content
		    $mail->Subject = $subject;
		    $mail->Body    = $body;

		    $mail->IsHTML(true); 

		    $mail->send();
		}

	}

?>
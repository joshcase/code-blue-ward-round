<?php

	use PHPMailer\PHPMailer\PHPMailer;

	class Emailer {

		function sendEmail($to, $filename, $subject, $body) {
			$mail = new PHPMailer();
		    $mail->isSMTP();
		    $mail->Host       = MAIL_HOST;
		    $mail->SMTPAuth   = true;
		    $mail->Username   = MAIL_USERNAME;                     
		    $mail->Password   = MAIL_PASSWORD;
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		    $mail->Port       = 587;

		    $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
		   	foreach ($to as $toAddress) {
		    	$mail->addAddress($toAddress, ''); 
		    }

		    $mail->addAttachment($filename);

		    $mail->Subject = $subject;
		    $mail->Body    = $body;

		    $mail->IsHTML(true); 

		    $mail->send();
		}

	}

?>
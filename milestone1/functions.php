<?php

	function notifyConsultantOfNewPatients($newPatients, $emailer) {
		if (count($newPatients) > 0) {
			$to = CONSULTANT_EMAIL_ADDRESS;
			$filename = '';
			$subject = 'New Patients Today';
			$body = 'Morning, <br><br>';
			$body = $body . 'Here are our new patients today: <br><br>';
			foreach($newPatients as $patient) {
				$body = $body . $patient->name . ' - ' . $patient->age . 'yo - ' . $patient->admissionNote . '<br>';
			}
			$body = $body . '<br>';
			$body = $body . 'See you shortly for the ward round. <br><br>';
			$body = $body . 'Josh';

			$emailer->sendEmail($to, $filename, $subject, $body);
		}
	}

	function patientIsNewlyAdmitted($patient) {
		if ($patient->lengthOfStay == 0) {
			return true;
		} else {
			return false;
		}
	}

?>
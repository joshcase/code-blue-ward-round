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

	function notifyMedStudentsOfMurmurs(Array $patientsWithMurmurs, Emailer $emailer) {
		if (count($patientsWithMurmurs) > 0) {
			$to = MEDICAL_STUDENT_EMAILS;
			$filename = '';
			$subject = 'Interesting Exam Findings';
			$body = 'Morning, <br><br>';
			$body = $body . 'Here are some patients you should examine today: <br><br>';
			foreach($patientsWithMurmurs as $patient) {
				$body = $body . $patient->name . ' - ' . $patient->age . 'yo <br>';
			}
			$body = $body . '<br>';
			$body = $body . 'See you shortly for the ward round. <br><br>';
			$body = $body . 'Josh';
			$emailer->sendEmail($to, $filename, $subject, $body);
		}
	}

	function patientHasMurmur($patient) {
		if (strpos($patient->admissionNote, 'murmur') == false) {
			return false;
		} else {
			return true;
		}
	}

	function patientIsAnticoagulated($patient) {
		foreach($patient->medications as $medication) {
			if (in_array($medication, ANTICOAGULANTS)) {
				return true;
			}
		}
		return false;
	}

	function patientIsNewlyAdmitted($patient) {
		if ($patient->lengthOfStay == 0) {
			return true;
		} else {
			return false;
		}
	}

	function saveListOfPatientsNotAnticoagulated($patientsNotAnticoagulated) {
		$JSON = json_encode($patientsNotAnticoagulated, JSON_PRETTY_PRINT);
		file_put_contents(ANTICOAGULATION_PROJECT_FOLDER . '/' . date('j-n-Y'), $JSON);
	}

?>
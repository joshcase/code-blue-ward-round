<?php

	require_once('vendor/autoload.php');
	require_once('config.php');
	require_once('classes/Emailer.php');
	require_once('classes/TechHospitalAPI.php');
	require_once('functions.php');

	$API = new TechHospitalAPI();
	$emailer = new Emailer();

	$patients = $API->getPatients('Wednesday');

	$newPatients = [];
	$patientsNotAnticoagulated = [];
	$patientsWithMurmurs = [];

	foreach($patients as $patient) {
		
		if (patientIsNewlyAdmitted($patient)) {
			array_push($newPatients, $patient);
		}

		if (!patientIsAnticoagulated($patient)) {
			array_push($patientsNotAnticoagulated, $patient);
		}

		if (patientHasMurmur($patient)) {
			array_push($patientsWithMurmurs, $patient);
		}

	}

	//notifyConsultantOfNewPatients($newPatients, $emailer);
	saveListOfPatientsNotAnticoagulated($patientsNotAnticoagulated);
	//notifyMedStudentsOfMurmurs($patientsWithMurmurs, $emailer);

?>
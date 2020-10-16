<?php

	require_once('vendor/autoload.php');
	require_once('config.php');
	require_once('classes/Emailer.php');
	require_once('classes/TechHospitalAPI.php');
	require_once('functions.php');

	$API = new TechHospitalAPI();
	$emailer = new Emailer();

	$patients = $API->getPatients('Monday');

	$newPatients = [];

	foreach($patients as $patient) {
		
		if (patientIsNewlyAdmitted($patient)) {
			array_push($newPatients, $patient);
		}

	}

	notifyConsultantOfNewPatients($newPatients, $emailer);

?>
<?php

	require_once('vendor/autoload.php');
	require_once('config.php');
	require_once('classes/Emailer.php');
	require_once('classes/FormGenerator.php');
	require_once('classes/TechHospitalAPI.php');
	require_once('functions.php');

	$API = new TechHospitalAPI();
	$emailer = new Emailer();
	$formGenerator = new FormGenerator();
	
	$patients = $API->getPatients('Tuesday');

	$newPatients = [];
	$patientsNotAnticoagulated = [];
	$patientsWithMurmurs = [];


	foreach($patients as $patient) {

		if($patient->isNewlyAdmitted()) {
			array_push($newPatients, $patient);
		}

		if (!$patient->isAnticoagulated()) {
			array_push($patientsNotAnticoagulated, $patient);
		}

		if ($patient->hasMurmur()) {
			array_push($patientsWithMurmurs, $patient);
		}

		if ($patient->isFebrile()) {
			$formGenerator->generateSepticScreen($patient);
		}

	}

	notifyConsultantOfNewPatients($newPatients, $emailer);
	saveListOfPatientsNotAnticoagulated($patientsNotAnticoagulated);
	notifyMedStudentsOfMurmurs($patientsWithMurmurs, $emailer);



?>
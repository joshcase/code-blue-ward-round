<?php

	require_once('vendor/autoload.php');
	require_once('Patient.php');

	use setasign\Fpdi\Fpdi;

	class FormGenerator {

		function generateSepticScreen(Patient $patient) {
			$this->generateCXRRequest($patient);
			$this->generateBloodCultureRequest($patient);
			$this->generateUrineCultureRequest($patient);
		}

		function generateCXRRequest(Patient $patient) {
			$request = new Fpdi();

			$request->AddPage();
			$request->setSourceFile('templates/imaging_template.pdf');
			$importedPage = $request->importPage(1);
			$request->useTemplate($importedPage, 1, 1, 210);

			$request->SetFont('Helvetica');
			$request->SetTextColor(0, 0, 0);

			$request->SetXY(125, 31);
			$request->Write(0, $patient->name);

			$request->SetXY(19, 55);
			$request->Write(0, $patient->location);

			$request->SetXY(20, 72);
			$request->Write(0, 'Chest x-ray');

			$request->SetXY(20, 95);
			$request->Write(0, 'Exclude consolidation');

			$request->SetXY(20, 132);
			$request->Write(0, $patient->age . 'yo - febrile. Septic screen.');

			$request->SetXY(20, 222);
			$request->Write(0, "Josh Case");

			$request->SetXY(20, 232);
			$request->Write(0, "1234567A");

			$request->SetXY(74, 222);
			$request->Write(0, "Doctor");

			$request->SetXY(74, 232);
			$request->Write(0, "4321");

			$request->SetXY(168, 222);
			$request->Write(0, date('j/n/Y'));

			$filename = date('j-n-y') . ' ' . $patient->name . ' CXR request.pdf';
			$request->output('f', GENERATED_REQUESTS_FOLDER . '/' . $filename);
			return $filename;
		}

		function generateBloodCultureRequest(Patient $patient) {
			$request = new Fpdi();

			$request->AddPage('L');
			$request->setSourceFile('templates/pathology_template.pdf');
			$importedPage = $request->importPage(1);
			$request->useTemplate($importedPage, 1, 1, 290);

			$request->SetFont('Helvetica');
			$request->SetTextColor(0, 0, 0);

			$request->SetXY(38, 42);
			$request->Write(0, $patient->name);

			$request->SetXY(178, 36);
			$request->Write(0, $patient->location);

			$request->SetXY(152, 47);
			$request->Write(0, '3 sets of blood cultures');

			$request->SetXY(152, 100);
			$request->Write(0, $patient->age . 'yo - febrile. Septic screen.');

			$request->SetXY(153, 154);
			$request->Write(0, "C  A  S  E");

			$request->SetXY(153, 165);
			$request->Write(0, "J  O  S  H");

			$request->SetXY(210, 165);
			$request->Write(0, "1   2   3   4   5   6   7   A");

			$request->SetXY(230, 175);
			$request->Write(0, date('j/n/Y'));

			$filename = date('j-n-y') . ' ' . $patient->name . ' blood culture request.pdf';
			$request->output('f', GENERATED_REQUESTS_FOLDER . '/' . $filename);
			return $filename;
		}

		function generateUrineCultureRequest(Patient $patient) {
			$request = new Fpdi();

			$request->AddPage('L');
			$request->setSourceFile('templates/pathology_template.pdf');
			$importedPage = $request->importPage(1);
			$request->useTemplate($importedPage, 1, 1, 290);

			$request->SetFont('Helvetica');
			$request->SetTextColor(0, 0, 0);

			$request->SetXY(38, 42);
			$request->Write(0, $patient->name);

			$request->SetXY(178, 36);
			$request->Write(0, $patient->location);

			$request->SetXY(152, 47);
			$request->Write(0, 'Urine microscopy, culture and sensitivity');

			$request->SetXY(152, 100);
			$request->Write(0, $patient->age . 'yo - febrile. Septic screen.');

			$request->SetXY(153, 154);
			$request->Write(0, "C  A  S  E");

			$request->SetXY(153, 165);
			$request->Write(0, "J  O  S  H");

			$request->SetXY(210, 165);
			$request->Write(0, "1   2   3   4   5   6   7   A");

			$request->SetXY(230, 175);
			$request->Write(0, date('j/n/Y'));

			$filename = date('j-n-y') . ' ' . $patient->name . ' urine culture request.pdf';
			$request->output('f', GENERATED_REQUESTS_FOLDER . '/' . $filename);
			return $filename;
		}

	}

?>
<?php

	class Patient {

		public function __construct(
			string $name,
			int $age,
			int $lengthOfStay,
			string $admissionNote,
			array $medications,
			float $lastTemperature,
			string $location
		) {
			$this->name = $name;
			$this->age = $age;
			$this->lengthOfStay = $lengthOfStay;
			$this->admissionNote = $admissionNote;
			$this->medications = $medications;
			$this->lastTemperature = $lastTemperature;
			$this->location = $location;
		}

	}

?>
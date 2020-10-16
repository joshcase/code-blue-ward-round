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

		function hasMurmur() {
			if (strpos($this->admissionNote, 'murmur') == false) {
				return false;
			} else {
				return true;
			}
		}

		function isFebrile() {
			return $this->lastTemperature > 37.8;
		}

		function isNewlyAdmitted() {
			if ($this->lengthOfStay == 0) {
				return true;
			} else {
				return false;
			}
		}

		function isAnticoagulated() {
			foreach($this->medications as $medication) {
				if (in_array($medication, ANTICOAGULANTS)) {
					return true;
				}
			}
			return false;
		}

	}

?>
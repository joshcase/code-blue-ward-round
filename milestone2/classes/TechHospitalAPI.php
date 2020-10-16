<?php

	require_once('Patient.php');

	class TechHospitalAPI {

		public function getPatients(String $dayOfTheWeek) : array {
			switch($dayOfTheWeek) {

				case "Monday": {
					return [
						new Patient('Peter Thomas', 
							67,
							0,
							'Admitted for management of a presumed bacterial pneumonia.',
							['Amoxicillin', 'Rivaroxaban'],
							37.0,
							'Bed 4'
						),

						new Patient('Jason Bardsley', 
							34,
							2,
							'Admitted for investigation of a potential haematological malignancy.',
							[],
							37.2,
							'Bed 9'
						),

						new Patient('Hannah Power', 
							71,
							1,
							'Admitted with a new diagnosis of atrial fibrillation.',
							['Metoprolol', 'Warfarin', 'Paracetamol'],
							36.8,
							'Bed 17'
						),

					];
				}

				case "Tuesday": {
					return [
						new Patient('Peter Thomas', 
							67,
							1,
							'Admitted for management of a presumed bacterial pneumonia.',
							['Amoxicillin', 'Rivaroxaban'],
							37.0,
							'Bed 4'
						),

						new Patient('Jason Bardsley', 
							34,
							3,
							'Admitted for investigation of a potential haematological malignancy.',
							[],
							37.2,
							'Bed 9'
						),

						new Patient('Kimberley Slice', 
							74,
							0,
							'Admitted with 48 hours of fever of unknown origin.',
							['Frusemide', 'Paracetamol', 'Rivaroxaban'],
							37.3,
							'Bed 14'
						),

						new Patient('Sophie Gibney', 
							26,
							0,
							'Admitted post a motorbike accident at 60km/hr.',
							['Levlen'],
							36.6,
							'Bed 19'
						),
					];
				}


				case "Wednesday": {
					return [
						new Patient('Peter Thomas', 
							67,
							2,
							'Admitted for management of a presumed bacterial pneumonia.',
							['Amoxicillin', 'Rivaroxaban'],
							37.0,
							'Bed 4'
						),

						new Patient('Jason Bardsley', 
							34,
							4,
							'Admitted for investigation of a potential haematological malignancy.',
							[],
							37.2,
							'Bed 9'
						),

						new Patient('Bertie Smith', 
							81,
							0,
							'Admitted with 3 weeks of exertional shortness of breath in the setting of a loud systolic ejection murmur.',
							['Frusemide', 'Paracetamol'],
							37.4,
							'Bed 10'
						),

						new Patient('Kimberley Slice', 
							74,
							1,
							'Admitted with 48 hours of fever of unknown origin.',
							['Frusemide', 'Paracetamol', 'Rivaroxaban'],
							37.3,
							'Bed 14'
						),

						new Patient('Sophie Gibney', 
							26,
							1,
							'Admitted post a motorbike accident at 60km/hr.',
							['Levlen'],
							36.6,
							'Bed 19'
						),
					];
				}

				case "Thursday": {
					return [

						new Patient('Jason Bardsley', 
							34,
							5,
							'Admitted for investigation of a potential haematological malignancy.',
							[],
							37.2,
							'Bed 9'
						),

						new Patient('Bertie Smith', 
							81,
							1,
							'Admitted with 3 weeks of exertional shortness of breath in the setting of a loud systolic ejection murmur.',
							['Frusemide', 'Paracetamol'],
							38.0,
							'Bed 10'
						),

						new Patient('Kimberley Slice', 
							74,
							2,
							'Admitted with 48 hours of fever of unknown origin.',
							['Frusemide', 'Paracetamol', 'Rivaroxaban'],
							37.3,
							'Bed 14'
						),

						new Patient('Bella Roberts', 
							15,
							0,
							'Admitted with malaise, sleepiness and hunger.',
							[],
							38.2,
							'Bed 18'
						),
					];
				}

				case "Friday": {
					return [

						new Patient('Bertie Smith', 
							81,
							2,
							'Admitted with 3 weeks of exertional shortness of breath in the setting of a loud systolic ejection murmur.',
							['Frusemide', 'Paracetamol'],
							36.5,
							'Bed 10'
						),

						new Patient('Kimberley Slice', 
							74,
							3,
							'Admitted with 48 hours of fever of unknown origin.',
							['Frusemide', 'Paracetamol', 'Rivaroxaban'],
							38.3,
							'Bed 14'
						),

						new Patient('Lily Farlow', 
							32,
							0,
							'Admitted with sudden onset chest pain for investigation.',
							['Sertraline', 'Allopurinol'],
							36.6,
							'Bed 15'
						),

						new Patient('Bella Roberts', 
							15,
							1,
							'Admitted with malaise, sleepiness and hunger.',
							[],
							37.2,
							'Bed 18'
						),

						new Patient('Michael Stack', 
							59,
							0,
							'Admitted with possible endocarditis in the setting of possible Marfan\'s and loud aortic murmur.',
							['Warfarin'],
							38.7,
							'Bed 20'
						),

						new Patient('David McCrae',
							57,
							0,
							'Admitted with a syncopal episode in the setting of palpitations and pansystolic murmur.',
							['Digoxin'],
							36.8,
							'Bed 22',
						)
					];
				}

				default: throw new Exception("First argument must be a string representing a day of the week.");

			}
		}



	}

?>
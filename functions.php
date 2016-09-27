<?php
	// functions.php
	
	var_dump($GLOBALS);
	
	//*****************
	//**** SIGNUP *****
	//*****************
	
	function signUp ($email, $password) {
		
		$database = "if16_karlerik";
			$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $database);
			
			$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");
			
			echo $mysqli->error;
			
			$stmt->bind_param("ss", $email, $password);
			
			if($stmt->execute()) {
				echo "salvestamine õnnestus";
			
			} else {
				echo "ERROR ".$stmt->error;
			}
			
			$stmt->close();
			$mysqli->close();

		}
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*function sum($x, $y) {
		
		return $x + $y;
		
	}

	echo sum(5123123,123123123);
	echo "<br>";
	echo sum(1,1);
	echo "<br>";

	
	function hello($firstname, $lastname) {
		
		return "Tere tulemast ".$firstname." ".$lastname."!";
	}
	
	echo hello("Karl-Erik","Borkmann");
	*/
	




?>
 <?php
	
	require("../../config.php");
	
	//echo hash("sha512", "a");
	
	//GET ja POSTi muutujad
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
 
	//muutujad	
	$signupEmailError = "";
	$signupPasswordError = "";
	$nameError = "";
	$dateOfBirthError = "";
	$addressError = "";
	$phoneNumberError = "";
	$signupEmail = "";
	$gender = "";
	
	
	//on üldse olemas selline muutuja
	if( isset($_POST["signupEmail"] ) ){
		
		//jah on olemas
		//kas on tühi
		if( empty($_POST["signupEmail"] ) ){
			
			$signupEmailError = "See väli on kohustuslik";		
		} else {
			//email on olemas
			$signupEmail = $_POST["signupEmail"];
		}
	}
		
 
 if( isset($_POST["signupPassword"] ) ){	
		if( empty($_POST["signupPassword"] ) ){		
			$signupPasswordError = "Parool on kohustuslik";	
		} else {	
			//siia jõuan siis kui parool oli olemas,
			//parool ei olnud tühi -empty	
			if (strlen($_POST["signupPassword"]) < 8 ) {	
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki";		
			}		
		}
	}
 
 if (isset ($_POST["firstName"])){
		if (empty($_POST["firstName"])){
			$nameError = "Palun sisestage oma täisnimi";
		}
 }
 
 if (isset ($_POST["lastName"])){
		if (empty($_POST["lastName"])){
			$nameError = "Palun sisestage oma täisnimi";
		}		
 }
 
 if (isset ($_POST["dateDay"])){
		if (empty($_POST["dateDay"])){
			$dateOfBirthError = "Palun sisestage sünniaeg";
		}
 }
 
 if (isset ($_POST["dateMonth"])){
		if (empty($_POST["dateMonth"])){
			$dateOfBirthError = "Palun sisestage sünniaeg";
		}
 }
 
 if (isset ($_POST["dateYear"])){
		if (empty($_POST["dateYear"])){
			$dateOfBirthError = "Palun sisestage sünniaeg";
		}
 }
 
 if (isset ($_POST["country"])){
		if (empty($_POST["country"])){
			$addressError = "Palun sisestage oma aadress";
		}
 }
 
 if (isset ($_POST["address"])){
		if (empty($_POST["address"])){
			$addressError = "Palun sisestage oma aadress";
		}
 }
 
 if (isset ($_POST["phoneNumber"])){
		if (empty($_POST["phoneNumber"])){
			$phoneNumberError = "Palun sisestage oma telefoninumber";
		}
 }
 
 
 if (isset ($_POST["gender"])){
	 if (!empty($_POST["gender"])){
		 $gender = $_POST["gender"];
	 }
 }
 
 
	// peab olema email ja parool
	// ühtegi errorit

	if ( $signupEmailError == "" &&
		empty($signupPasswordError) &&
		isset($_POST["signupEmail"]) &&
		isset($_POST["signupPassword"])	
		) {
			//salvestame ab'i
			echo "Salvestan... <br>";
			echo "email: ".$signupEmail."<br>";
			echo "password: ".$_POST["signupPassword"]."<br>";
			
			$password = hash("sha512", $_POST["signupPassword"]);
			
			echo "password hashed: ".$password."<br>";
			
			//echo $serverUsername;
			
			//ühendus
			$database = "if16_karlerik";
			$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
			
			//sqli rida
			$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");
			
			echo $mysqli->error;
			
			//stringina üks täht iga muutuja kohta (?), mis tüüp
			//string - s
			//integer - i
			//float (double) - d
			//küsimärgid asendada muutujaga
			$stmt->bind_param("ss", $signupEmail, $password);
			
			//täida käsku
			if($stmt->execute()) {
				echo "salvestamine õnnestus";
			
			} else {
				echo "ERROR ".$stmt->error;
			}
			
			//panen ühenduse kinni
			$stmt->close();
			$mysqli->close();

		}
	
	
 
 ?>
 
 
 
 
 
 <!DOCTYPE html>
<html>
<head>
	<title>Logi sisse või loo kasutaja </title>
</head>
<body>

	<h1>Logi sisse</h1>
	<form method="POST">
			<label>E-post</label><br>
			<input name="loginEmail" type="text">
			<br><br>
			
			<input name="loginPassword" placeholder="Parool" type="password">
			<br><br>
			
			<input type="submit" value="Logi sisse">
	
	</form>

	
	<h1>Loo kasutaja</h1>
	<form method="POST">
			
			<input name="signupEmail" type="text" placeholder="E-mail" value="<?=$signupEmail;?>"> <?php echo $signupEmailError; ?>
			<br><br>
			
			<input name="signupPassword" placeholder="Parool" type="password"> <?php echo $signupPasswordError; ?>
			<br><br>
			
			<label>Nimi</label><br>
			<input name="firstName" placeholder="Eesnimi" type="text">
			<input name="lastName" placeholder="Perekonnanimi" type="text"> <?php echo $nameError; ?>
			<br><br>
								
			<label>Sugu</label><br>
			<?php if($gender == "male"){ ?>
				<input name="gender" type="radio" value="male" checked> Mees
			<?php }else{?>
				<input name="gender" type="radio" value="male"> Mees
			<?php }?>
			
			<?php if($gender == "female"){ ?>
				<input name="gender" type="radio" value="female" checked> Naine
			<?php }else{?>
				<input name="gender" type="radio" value="female"> Naine
			<?php }?>
			
			<?php if($gender == "other"){ ?>
				<input name="gender" type="radio" value="other" checked> Midagi muud
			<?php }else{ ?>
				<input name="gender" type="radio" value="other"> Midagi muud
			<?php } ?>
			<br><br>
			
			<label>Sünniaeg</label><br>
			<input type="number" name="dateDay" placeholder="Päev">
			<input type="number" name="dateMonth" placeholder="Kuu">
			<input type="number" name="dateYear" placeholder="Aasta"> <?php echo $dateOfBirthError; ?>
			<br><br>
			
			<label>Aadress</label><br>
			<input type="text" name="country" placeholder="Riik">
			<input type="text" name="address" placeholder="Aadress"> <?php echo $addressError; ?>
			<br><br>
			
			<label>Kontakttelefon</label><br>
			<input type="text" name="phoneNumber"> <?php echo $phoneNumberError; ?>
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
	
	
	</form>
	
	
</body>
</html>


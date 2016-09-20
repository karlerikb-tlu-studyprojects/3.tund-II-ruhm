
 
 <?php
	
	//GET ja POSTi muutujad
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
 
	$signupEmailError = "";
	$signupPasswordError = "";
	$nameError = "";
	$dateOfBirthError = "";
	$addressError = "";
	$phoneNumberError = "";
	
	
	//on üldse olemas selline muutuja
	if( isset($_POST["signupEmail"] ) ){
		
		//jah on olemas
		//kas on tühi
		if( empty($_POST["signupEmail"] ) ){
			
			$signupEmailError = "See väli on kohustuslik";		
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
			
			<input name="signupEmail" type="text" placeholder="E-mail"> <?php echo $signupEmailError; ?>
			<br><br>
			
			<input name="signupPassword" placeholder="Parool" type="password"> <?php echo $signupPasswordError; ?>
			<br><br>
			
			<label>Nimi</label><br>
			<input name="firstName" placeholder="Eesnimi" type="text">
			<input name="lastName" placeholder="Perekonnanimi" type="text"> <?php echo $nameError; ?>
			<br><br>
			
			<label>Sugu</label><br>
			<input name="gender" type="radio" value="male"> Mees
			<input name="gender" type="radio" value="female"> Naine
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


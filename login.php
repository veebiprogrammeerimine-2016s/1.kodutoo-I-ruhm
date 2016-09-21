﻿
<?php
	
	require("../../config.php");
	//var_dump();
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	//MUUTUJAD
	$signupEmailError="";
	$signupPasswordError="";
	$signupPassword2Error="";
	$loginEmailError="";
	$loginPasswordError="";
	
	$signupEmail ="";
	
	// kas e-post oli olemas
	if (isset($_POST["signupPassword"])){
		
		if (empty($_POST["signupPassword"])){
			
			$signupPasswordError="See vĆ¤li on kohustuslik!";
			
				} else {
			
				if (strlen($_POST["signupPassword"]) <8) {
					$signupPasswordError="Parool peab olema vĆ¤hemalt 8 tĆ¤hemĆ¤rki pikk";
				}
			
		}
	}
	
	/*
	if (isset($_POST["signupPassword2"])){
		
		if (($_POST["signupPassword"])!=($_POST["signupPassword2"]) ){
			
			$signupPassword2Error="Paroolid ei klapi!";
			
				
			
		}
	}
	*/
	if (isset($_POST["signupEmail"])){
				
		if (empty($_POST["signupEmail"])){
					
			$signupEmailError="See vĆ¤li on kohustuslik!";
			
		} else {
			$signupEmail =$_POST["signupEmail"];
			
		
	
		}
	}
	if (isset($_POST["loginPassword"])){
		
		if (empty($_POST["loginPassword"])){
			
			$loginPasswordError="Sisestage siia oma parool, et sisse logida!";
			
				} else {
			
				if (strlen($_POST["loginPassword"]) <8) {
					$loginPasswordError="Parool peab olema vĆ¤hemalt 8 tĆ¤hemĆ¤rki pikk";
				}
			
		}
	}
	if (isset($_POST["loginEmail"])){
				
		if (empty($_POST["loginEmail"])){
					
			$loginEmailError="Sisestage siia oma e-post, et sisse logida!";
		
	
		}
	}
	
	
	
	//Kus tean et uhtegi viga ei olnud ja saan kasutaja andmed salvestada
	if ( isset($_POST["signupPassword"]) &&
		 isset($_POST["signupEmail"]) &&
		 empty($signupEmailError) &&
		 empty($signupPasswordError) 
	   ) {
		
		echo "Salvestan...<br>";
		echo "email ".$signupEmail."<br>";
		
		$password = hash("sha512", $_POST["signupPassword"]);
		
		echo "parool ".$_POST["signupPassword"]."<br>";
		echo "parooli hash ".$password."<br>";
		
		//echo $serverUsername;
		$database = "if16_clevenl";
		//uhendus
		$mysqli = new mysqli($serverHost,$serverUsername,$serverPassword,$database);
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?,?)");
		
		//asendan kusimargi vaartustega
		//iga muutuja kohta 1 taht, mis tuupi muutuja on
		// s - string
		// i - integer
		// d - double/float
		$stmt->bind_param("ss", $signupEmail, $password);
		
		if ($stmt->execute()) {
			
			echo "salvestamine onnestus!";
		} else {
			echo "ERROR ".$stmt->error;
		}
	}
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise lehekülg</title>
	</head>
		<body>

			<h1>Logi sisse</h1>
		
			<form method="POST">
			
				<input name="loginEmail" type="email" placeholder="E-post"> <?php echo $loginEmailError;?>
				
				<br><br>
				
				<input name="loginPassword" type="password" placeholder="Parool"> <?php echo $loginEmailError;?>
				
				<br> <br>
				
				<input type="submit" value="Logi sisse">
				
			
			</form>
			
			<br><br>
			
			<h3>Kasutajat pole?</h3>
			<h1>Loo kasutaja</h1>
			
			<form method="POST">
			
				<label>Kasutajanimi</label>
				<br>
				<input name="signupUsername" type="username">
				<br><br>
			
				<label>E-post</label>
				<br>
				<input name="signupEmail" type="email" value="<?=$signupEmail;?>"> <?php echo $signupEmailError;?>
				<br><br>
				
				<label>Parool</label>
				<br>
				<input name="signupPassword" type="password"> <?php echo $signupPasswordError;?>
				<br> <br>
				
				<label>Parool uuesti</label>
				<br>
				<input name="signupPassword2" type="password"> <?php echo $signupPassword2Error;?>
				<br> <br>
				
				<h4>Vali oma sugu</h4>
				
				<input type="radio" name="gender" value="male" checked> Male
				<br>
				<input type="radio" name="gender" value="female"> Female
				<br>
				<input type="radio" name="gender" value="other"> Other
				<br><br>
				
				<input type="submit" value="Loo kasutaja">
				
				

				
			
			</form>

	</body>
</html>

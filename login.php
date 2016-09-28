<?php
//MVP IDEE: Luua maaklerivabade korterite üürimissait, kus soovija saab reaalajas omanikuga suhelda (tingimusel, kui mõlemad osapooled on samal ajal onlines).
//MVP IDEE LISA: Kõik üürisoovijad peavad looma omale üürimiseks konto ja neid saab hinnata, kui head üürilised nad on, et järgnevad üürileandjad saaksid ülevaate.



//võtab ja kopeerib faili sisu
	require ("../../config.php");

	//var_dump(5.5);
	
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	// MUUTUJAD
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupEmail = "";
	$gender = "male";
	
	// kas e/post oli olemas
	if ( isset ( $_POST["signupEmail"] ) ) {
		
		if ( empty ( $_POST["signupEmail"] ) ) {
			
			// oli email, kuid see oli tühi
			$signupEmailError = "See väli on kohustuslik!";
			
		} else {
			
			// email on õige, salvestan väärtuse muutujasse
			$signupEmail = $_POST["signupEmail"];
			
		}
		
	}
	
	if ( isset ( $_POST["signupPassword"] ) ) {
		
		if ( empty ( $_POST["signupPassword"] ) ) {
			
			// oli password, kuid see oli tühi
			$signupPasswordError = "See väli on kohustuslik!";
			
		} else {
			
			// tean et parool on ja see ei olnud tühi
			// VÄHEMALT 8
			
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk";
				
			}
			
		}
		
	}
		
	// KUI Tühi
	// $gender = "";
	if ( isset ( $_POST["gender"] ) ) {
		if ( empty ( $_POST["gender"] ) ) {
			$genderError = "See väli on kohustuslik!";
		} else {
			$gender = $_POST["gender"];
		}
	}
	// Kus tean et ühtegi viga ei olnud ja saan kasutaja andmed salvestada
	if ( empty($signupEmailError)		&& 
	empty($signupPasswordError) && 
	isset ($_POST["signupPassword"]) && 
	isset($_POST ["signupEmail"]) ) {
		
		echo "Salvestan...<br>";
		echo "email ".$signupEmail."<br>";
		
		$password = hash("sha512", $_POST["signupPassword"]);
		
		echo "parool ".$_POST["signupPassword"]."<br>";
		echo "räsi ".$password."<br>";
		
		//echo $serverPassword;
		
		$database="if16_Tanelmaas_1";
		//ühendus
		$mysqli = new mysqli($serverHost,$serverUsername,$serverPassword,$database);
		//käsk
		$stmt=$mysqli->prepare("INSERT INTO user_sample (email,password) VALUES (?, ?)");
		//asendan küsimärgi väärtustega
		//iga muutuja kohta 1 täht, mis tüüpi muutuja on
		//s-string
		//i-integer
		//d-double või float
		$stmt->bind_param("ss", $signupEmail, $password);
		
		if ($stmt->execute()) {
				
			echo "salvestamine õnnestus";
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
			
			<label>E-post</label><br>
			<input name="loginEmail" type="email">
			
			<br><br>
			
			<input name="loginPassword" type="password" placeholder="Parool">
			
			<br><br>
			
			<input type="submit" value="Logi sisse">
			<input type="submit" value="Unustasin parooli">
			
		</form>
		
		<h1>Loo kasutaja</h1>
		
		<form method="POST">
			
			<label>E-post</label><br>
			<input name="signupEmail" type="email" value="<?=$signupEmail;?>"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input name="signupPassword" type="password" placeholder="Parool"> <?php echo $signupPasswordError; ?>
			
			<br><br>
			
			<label> Ees- ja perekonnanimi</label><br>
			<input name="fullname" type="name" >
			
			<br><br>
			
			<label> Vanus</label><br>
			<input name="age" type="age">
			
			<br><br>
			
			<label>Sugu</label><br>
			
		 <?php if($gender == "male") { ?>
				<input type="radio" name="gender" value="male" checked> Mees<br>
			 <?php } else { ?>
				<input type="radio" name="gender" value="male" > Mees<br>
			 <?php } ?>
			 
			 <?php if($gender == "female") { ?>
				<input type="radio" name="gender" value="female" checked> Naine<br>
			 <?php } else { ?>
				<input type="radio" name="gender" value="female" > Naine<br>
			 <?php } ?>
			 
			 <?php if($gender == "other") { ?>
				<input type="radio" name="gender" value="other" checked> Muu<br>
			 <?php } else { ?>
				<input type="radio" name="gender" value="other" > Muu<br>
			 <?php } ?>
			 <br><br>
			
			<input type="submit" value="Loo kasutaja">
			
		</form>
		
	</body>
</html>

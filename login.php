<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	
	//kas epost oli olemas
	if(isset ($_POST["signupEmail"])) {
		
		if(empty ($_POST["signupEmail"])) {
			
			//oli email, kuid see oli tühi
			$signupEmailError = "See väli on kohustuslik!";
			
		} 
	}
		
		//kas parool oli olemas
		if(isset ($_POST["signupPassword"])) {
			
			if(empty ($_POST["signupPassword"])) {
				
				//oli parool, kuid see oli tühi
				$signupPasswordError = "See väli on kohustuslik!";
			} else {
			
			//tean, et oli parool ja see ei olnud tühi
			//VÄHEMALT 8, soovitatav 16 täheline parool
			
			if (strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk"
			}
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
		
		<form method = "POST">
		
			<input name = "loginEmail" type = "email" placeholder = "E-mail">
			
			<br><br>
			
			<input name = "loginPassword" type = "password" placeholder = "Parool">
			
			<br><br>
			
			<input type = "submit" value = "Logi sisse">
		
		<h1>Loo kasutaja</h1>
		</form>
		
		<form method = "POST">
		
			<input name = "signupEmail" type = "email" placeholder = "E-mail" <?php echo $signupEmailError; ?>>
			
			<br><br>
			
			<input name = "signupPassword" type = "password" placeholder = "Parool" <?php echo $signupPasswordError; ?>>
			
			<br><br>
			
			<input type = "submit" value = "Loo kasutaja">
		
		</form>

	</body>
</html>
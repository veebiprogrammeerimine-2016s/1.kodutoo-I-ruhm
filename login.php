<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	
	//kas epost oli olemas
	
	if ( isset ( $_POST ["signupEmail"])) {
		
		if ( empty ($_POST ["signupEmail"])) {
			
			//oli email, kuid see oli tuhi
			$signupEmailError = "See väli on kohustuslik!";
		}
	}
	
	if ( isset ( $_POST ["signupPassword"])) {
		
		if ( empty ($_POST ["signupPassword"])) {
			
			//oli email, kuid see oli tuhi
			$signupPasswordError = "See väli on kohustuslik!";
			
		} else{
			
			// tean, et parool ja see ei olnud tuhi
			//vahemalt 8
			if ( strlen($_POST ["signupPassword"]) < 8 ){
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk!";
			}
				
			
		}
			
	}
					

?>

<!DOCTYPE html>
<html>
	$signupEmailError = "";
	$signupPasswordError = "";
	
	//kas epost oli olemas
	
	if ( isset ( $_POST ["signupEmail"])) {
		
		if ( empty ($_POST ["signupEmail"])) {
			
			//oli email, kuid see oli tuhi
			$signupEmailError = "See väli on kohustuslik!";
		}
	}
	
	if ( isset ( $_POST ["signupPassword"])) {
		
		if ( empty ($_POST ["signupPassword"])) {
			
			//oli email, kuid see oli tuhi
			$signupPasswordError = "See väli on kohustuslik!";
			
		} else{
			
			// tean, et parool ja see ei olnud tuhi
			//vahemalt 8
			if ( strlen($_POST ["signupPassword"]) < 8 ){
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk!";
			}
				
			
		}
			
	}

	<head>
		<title>Sisselogimise lehekülg</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		
		<form method="POST"> <!-- kaotab aadressireal -->
			
			<input name="loginEmail" type="email" placeholder="E-post">
			<br>
			<br>
			<input name="loginPassword" type= "password" placeholder="Parool">
			<br>
			<br>
			<input type="submit" value="Logi sisse">
		
		</form>

	</body>
</html>

<br><br>

<h1>Loo kasutaja</h1>
		
		<form method="POST"> 
			
			<input name="signupEmail" type="email" placeholder="E-post"> <?php echo $signupEmailError; ?>
			<br>
			<br>
			<input name="signupPassword" type="password" placeholder="Parool"> <?php echo $signupPasswordError; ?>
			<br>
			<br>
			<input type="submit" value="Loo kasutaja">
		
		</form>
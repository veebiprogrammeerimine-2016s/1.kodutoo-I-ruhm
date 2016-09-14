<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";

	//Kas email oli olemas
	if ( isset ( $_POST["signupEmail"] ) ) {
		
		if ( empty ( $_POST["signupEmail"] ) ) {
			
			//oli email, kuid see oli tühi
			$signupEmailError = "See väli on kohustuslik!";
		}
	}
	
	//Kas Password oli olemas
	if ( isset ( $_POST["signupPassword"] ) ) {
		
		if ( empty ( $_POST["signupPassword"] ) ) {
			
			//oli Password, kuid see oli tühi
			$signupPasswordError = "See väli on kohustuslik!";
			
		} else {
		
			//tean et parool ja see ei olnud tühi
			//VÄHEMALT 8
			
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Password peab olema vähemalt 8 tähemärki pikk";
				
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

		<h1>Log in</h1>
		
		<form method="POST">
		
			<label>E-mail</label><br>
		
			<input name="loginEmail" type="Email">
			
			<br><br>
			
			<input name="loginPassword" type="Password" placeholder="Password"> 
			
			<br><br>
			
			<input type="Submit" value="Log in">
		
		</form>
		
		<h1>Loo kasutaja</h1>
		
		<form method="POST">
		
			<label>E-mail</label><br>
		
			<input name="signupEmail" type="Email"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input name="signupPassword" type="Password" placeholder="Password"> <?php echo $signupPasswordError; ?>
			
			<br><br>
			
			<input type="Submit" value="Loo kasutaja">
		
		</form>
		
	</body>
</html>
<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);

	$SignupEmailError="";
	$SignupPasswordError="";
	$signupAgeError="";
	$signupSexError="";

	//kas e-post oli olemas
	if (isset ($_POST["SignupEmail"]) ) {
	
		if (empty ($_POST["SignupEmail"]) ) {
		
			//oli email, kuid see oli tühi
		
		$SignupEmailError="See väli on kohustuslik!";
		
		}
	
	}

	if (isset ($_POST["SignupPassword"] ) ) {
		
		if (empty($_POST["SignupPassword"] ) ) {
		
			//oli password, kuid see oli tühi
			$SignupPasswordError="See väli on kohustuslik!";
			
		} else {
			
			//tean, et parool on ja see ei olnud tühi
			//vähemalt 8
			
			if (strlen($_POST["SignupPassword"] ) <8 ) {
				
					$SignupPasswordError="Parool peab olema vähemalt 8 tähemärki pikk";
					
			}
			
		}
		
	}
	
	if (isset ($_POST["signupAge"])) {
		if (empty($_POST["signupAge"])) {
			$signupAgeError="See väli on kohustuslik!";
		}
	}
	
	if (isset ($_POST["signupSex"])) {
		if (empty($_POST["signupSex"])) {
			$signupSexError="See väli on kohustuslik!";
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
			<input name="LoginEmail" type="email">
		
			<br><br>
		
			<input name="LoginPassword" type="password" placeholder="Parool">
		
			<br><br>
		
			<input type="submit" value="Logi sisse">
			
		</form>
	
		<h1>Loo kasutaja</h1>
		<form method="POST">
		
			<label>E-post</label><br>
			<input name="SignupEmail" type="email"> <?php echo $SignupEmailError; ?>
		
			<br><br>
		
			<input name="SignupPassword" type="password" placeholder="Parool"> <?php echo $SignupPasswordError; ?>
			
			<br><br>
			
			<input name="signupAge" type="age" placeholder="Vanus"><?php echo $signupAgeError;?>
			
			<br><br>
			
			<input name="signupSex" type="sex" placeholder="Sugu-M/N"><?php echo $signupSexError;?>
			
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
			
		</form>

	</body>
</html>
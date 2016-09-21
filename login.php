<?php
// 




	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailerror = "";

	//kas e-post oli olemas
	if (isset ($_POST["signupEmail"])) {
		
		if (empty ($_POST ["signupEmail"])) {
			//oli e-post, kuid see oli tühi
			$signupEmailerror = "See väli on kohustuslik!";
		}	
	}
	
	$signupPassworderror = "";

	//kas parool oli olemas
	if (isset ($_POST["signupPassword"])) {
		
		if (empty ($_POST ["signupPassword"])) {
			//oli parool, kuid see oli tühi
			$signupPassworderror = "See väli on kohustuslik!";
			
			
		}	else {
			
			//tean et parool ja see ei olnud tühi
			//vähemalt 8
			
			if (strlen($_POST["signupPassword"]) < 8 ) {
				$signupPassworderror = "Parool peab olema vähemalt 8 tähemärki pikk"; 
			}
		}
	}
	
	$signupAgeerror = "";
	
	//kas vanus oli vähemalt 18
	
	if (isset ($_POST["signupAge"])) {
		
		if (empty ($_POST ["signupAge"])) {
			$signupAgeerror = "See väli on kohustuslik!";
			
		}
	
		if  (($_POST["signupAge"]) < 18 ) {
		$signupAgeerror = "Pead olema vähemalt 18 aastat vana";
		
	}
	}
	
	//Millegi pärast ei saa erroreid panna nii, et kui tühi on, siis ütleks "See väli on kohustuslik" vaid ütleb ikkagi, et "Pead olema vähemalt 18 aastat vana.
	
	$signupNumbererror = "";
	
	if (isset ($_POST["signupNumber"])) {
		
		if (empty ($_POST ["signupNumber"])) {
			//oli number, kuid see oli tühi
			$signupNumbererror = "See väli on kohustuslik!";
			
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
		
			<input name="loginEmail" type="email" placeholder="E-post"> 
			<br><br>
			<input name="loginPassword" type="password" placeholder="Parool">
			<br><br>
			<input type="submit" value="Logi sisse">
		
		
		</form>
		
		<head>
		<title>Sisselogimise lehekülg</title>
	</head>
	<body>

		<h1>Loo kasutaja</h1>
		
		<form method="POST">
		
			<input name="signupEmail" type="email" placeholder="E-post">  <?php echo $signupEmailerror;  ?>
			<br><br>
			<input name="signupPassword" type="password" placeholder="Parool"> <?php echo $signupPassworderror; ?>
			<br><br>
			<input name="signupAge" type="age" placeholder="Vanus"> <?php echo $signupAgeerror; ?>
			<br><br>
			<input name="signupNumber" type="number" placeholder="Telefoninumber">  <?php echo $signupNumbererror; ?>
			<br><br>
			<input type="submit" value="Loo kasutaja">
			
		
		</form>

	</body>
</html>
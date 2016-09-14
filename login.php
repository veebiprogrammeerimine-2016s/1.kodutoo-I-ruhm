<?php
	
	/*
	var_dump($_GET);
	echo "<br>";
	var_dump($_POST);
	*/
	
	$signupEmailError = "";
	$loginEmailError = "";
	$signupPasswordError = "";
	$loginPasswordError = "";
	
	//Kas e-post oli olemas?
	if (isset ($_POST["signupEmail"]))
		{
			if (empty ($_POST["signupEmail"]))
				{
					//Oli email, kuid tühi.
					$signupEmailError = "Registreerumise email oli tühi";
				}
		}
	if (isset ($_POST["loginEmail"]))
		{
			if (empty ($_POST["loginEmail"]))
				{
					//Oli email, kuid tühi.
					$loginEmailError = "Sisselogimise email oli tühi";
				}
		}
	if (isset ($_POST["signupPassword"]))
		{
			if (empty ($_POST["signupPassword"]))
				{
					//Oli email, kuid tühi.
					$signupPasswordError = "Sisselogimise parool oli tühi";
				}
				else
				{
					//tean et oli parool ja see ei olnud tühi. Kontrollin pikkust
					if (strlen($_POST["signupPassword"]) < 8)
					{
						$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk";
					}
				}
		}
	if (isset ($_POST["loginPassword"]))
		{
			if (empty ($_POST["loginPassword"]))
				{
					//Oli email, kuid tühi.
					$loginPasswordError = "Sisselogimise parool oli tühi";
				}
				else 
				{
					if (strlen($_POST["loginPassword"]) < 8)
					{
					$loginPasswordError = "Sisselogimise parool peab olema vähemalt 8 tähemärki pikk.";
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
		<h1>100% legit site</h1>
					
			<form method = "POST">
				
				<legend>Loo kasutaja</legend>
				<br>
				<!--<label>E-post</break><br>-->
				<input name = "signupEmail" type = "email" placeholder = "E-mail"><?php echo $signupEmailError?>
				<br><br>
				<input name = "signupPassword" type = "password" placeholder = "Parool"><?php echo $signupPasswordError?>
				<br><br>
				<input type = "submit" value = "Registreeru">
				<br><br>
				
			</form>
			<br>
			<form method = "POST">
				
				<legend>Sisselogimine</legend>
			<br>
				<input name = "loginEmail" type = "email" placeholder = "E-mail"><?php echo $loginEmailError?>
				<br><br>
				<input name = "loginPassword" type = "password" placeholder = "Parool"><?php echo $loginPasswordError?>
				<br><br>
				<input type = "submit" value = "Logi sisse">
				<br><br>
				
			</form>
				<a 
					href = "http://www.neti.ee">  Parim otsingumootor 2k16  
					<style> a:link {color:White; background-color:black; text-decoration:none; font: Calibri}</style>
				</a>
		</body>
</html>
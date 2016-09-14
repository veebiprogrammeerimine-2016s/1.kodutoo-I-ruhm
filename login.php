<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	
	// kas e-post oli olemas
	if(isset ($_POST["signupEmail"])) {
		
		if (empty ($_POST["signupEmail"])) {
				
				// oli email, kuid see oli tuhi
				
				$signupEmailError = "See vali on kohustuslik";
			
			
		}else {
			//tean et oli parool ja see ei olnud tuhi
			//vahemalt 8
			
			if (strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vahemalt 8 tahemarki pikk";
				
			}
		}
	}
	
	if(isset ($_POST["signupPassword"])) {
		
		if (empty ($_POST["signupPassword"])){
				
					$signupPasswordError = "See vali on kohustuslik";
		}

	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise lehekulg</title>
	</head>
	<body>

		<h1>logi sisse</h1>

		<form method = "POST">
			
			<label> E-post</label><br>
			
			<input name = "LoginEmail" type = "email">
			
			<br><br>
			
			<input name = "LoginPassword" type = "password" placeholder  = "Parool"> 
			
			<br><br>
			
			<input type = "submit" value = "Logi sisse">
		
		</form>
		
		<h1> Loo kasutaja </h1/>
		
			<form method = "POST">
			
			<label> E-post</label><br>
			
			<input name = "signupEmail" type = "email"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input name = "signupPassword" type = "password" placeholder  = "Parool">  <?php echo $signupPasswordError; ?>
			
			<br><br>
			
			<input type = "submit" value = "Logi sisse">
		
		</form>
		
	</body>
	
</html>
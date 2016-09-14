
<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	
	
	// kas epost oli olemas
	if (isset ($_POST ["signupEmail"])){
		
		if (empty ($_POST ["signupEmail"])){
			
			//oli email, kuigi see oli tühi
			$signupEmailError = "See väli on kohustuslik!";
			
		}
		
	}
	
	
	
	$signupPasswordError = "";
	
	
	// kas epasssword oli olemas
	if (isset ($_POST ["signupPassword"])){
		
		if (empty ($_POST ["signupPassword"])){
			
			//oli password, kuigi see oli tühi
			$signupPasswordError = "See väli on kohustuslik!";
			
		}else{
			// tean et oli parool ja see ei olnud tühi
			// vähemalt 8 sümbolit
			
			if (strlen($_POST["signupPassword"])< 8){
			$signupPasswordError = "Parool peab olema vähemalt	8 tähemärki pikk!";
			}
			
			
		}
		
	}

?>



<html>
	<head>
		<title>Login page</title>
	</head>
	<body>

		<h1>Logi sisse:</h1>
		
		<form method ="post">

			<label>E-post:</label><br>
			<input name = "loginEmail" type ="email" placeholder = "E-post">
			<br><br>
			
			<label>Parool:</label><br>
			<input name = "loginPassword" type ="password" placeholder = "Parool">
			<br><br>
			
			<input type ="submit" value = "Logi sisse">
		
		</form>
		
		
		<h1>Loo kasutaja:</h1>
		
		<form method ="post">

			<label>E-post:</label><br>
			<input name = "signupEmail" type ="email" placeholder = "E-post"> <?php echo $signupEmailError;?>
			<br><br>
			
			<label>Parool:</label><br>
			<input name = "signupPassword" type ="password" placeholder = "Parool"> <?php echo $signupPasswordError;?>
			<br><br>
			
			<input type ="submit" value = "Loo kasutaja">
		
		</form>
		
	</body>	
</html>
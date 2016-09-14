<?php

	//var_dump();
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	
	//kas e-post oli olemas
	if ( isset ( $_POST["SignupEmail"] ) ) {
		
		if ( empty ( $_POST["SignupEmail"] ) ) {
			
			//oli email, kuid see oli tühi
			echo "email oli tühi";
			$SignupEmailError = "See väli on kohustuslik";
		} else {
			//tean, et parool ja see ei olnud tĆ¼hi
			//vĆ¤hemalt 8
			
			if ( strlen($_POST["SignupPassword"]) < 8 ) {
				$SignupPasswordError= "Parool peab olema vĆ¤hemalt 8 tĆ¤hemĆ¤rki pikk" 
			
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
			
			<label>E-post</><br>
			<input name= "LoginEmail" type="email">
			
			<br><br>
			
			<label>Parool</><br>
			<input name="LoginPassword" type="password"> 
			
			<br><br>
			
			<input type="submit" value="Logi sisse">
			
			
		</form>
		
		<h1>Loo kasutaja</h1>
		<form method="POST">
			
			<label>E-post</><br>
			<input name = "SignupEmail" type="email"> <?php echo $SignupEmailError; ?>
			
			<br><br>
			
			<label>Parool</><br>
			<input name="SignupPassword" type="password"> 
			
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
			
			
		</form>
	
	</body>
</html>
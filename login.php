<?php

	$signupEmailError = "";
	$signupPasswordError = "";

	if ( isset ( $_POST["signupEmail"] ) ) {
		
		if ( empty ( $_POST["signupEmail"] ) ) {
			
				//oli email, kuid see oli tühi
				$signupEmailError = "E-mail can't be blank";
		}
	}
	
	
	//Kas Password oli olemas
	if ( isset ( $_POST["signupPassword"] ) ) {
		
		if ( empty ( $_POST["signupPassword"] ) ) {
			
			//oli Password, kuid see oli tühi
			$signupPasswordError = "Password can't be blank";
			
		} else {
		
			//tean et parool ja see ei olnud tühi
			//VÄHEMALT 8
			
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Password is too short (minimum is 8 characters)";
				
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
		
			<input name="loginE-mail" type="E-mail" placeholder="E-mail"> 
			
			<br><br>
			
			<input = name="loginPassword" type="Password" placeholder="Password">
			
			<br><br>
			
			<input type="submit" value="Log in">
			
		</form>
			
		<h1>Sign up</h1>
		
		<form method="POST">
		
			<input name="signupEmail" type="E-mail" placeholder="E-mail"> 
			
			<br>
			
			<?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input name="signupPassword" type="Password" placeholder="Password"> 
			
			<br>
			
			<?php echo $signupPasswordError; ?>
			
			<br><br>
			
			<input name="Confirm Password" type="Password" placeholder="Confirm Password">
			
			<br><br>
			
			<input type="submit" value="Sign up">
			
			</form>
	
	<p></p>

	</body>
</html>
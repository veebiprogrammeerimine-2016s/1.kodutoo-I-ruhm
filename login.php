<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	
	// kas e-post oli olemas
	
	if ( isset ( $_POST["signupEmail"] ) ) {
		
		if ( empty ( $_POST["Sisselogimise"] ) ) {
		
			// oli email, kuid see oli tühi
			$signupEmailError = "Insert correct e-mail!";

		}
		
	}
		if ( isset ( $_POST["signupPassword"] ) ) {
		
			if ( empty ( $_POST["signupPassword"] ) ) {
		
				// oli email, kuid see oli tühi
				$signupPasswordError = "Insert correct password!";
			
			} else {
				
				if ( strlen($_POST["signupPassword"]) < 8 ) {
					
					$signupPasswordError="Password must be atleast 8 character long!";
					
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
		
			<lable>E-mail</lable><br> 
			<input name = "loginEmail" type = "email" placeholder = "E-mail">
			
			<br><br>
			<lable>Password</lable><br>
			<input name = "loginPassword" type = "password" placeholder = "Password">
			
			<br><br>
			
			<input  type = "submit" value="Logi sisse">
			
			
		<h1>Sign up</h1>
		
		</form>

				<form method = "POST">
		
			<lable>E-mail</lable><br> 
			<input name = "signupEmail" type = "email" placeholder = "E-mail"> <?php  echo $signupEmailError; ?>
			
			<br><br>
			<lable>Password</lable><br>
			<input name = "signupPassword" type = "password" placeholder = "Password"> <?php  echo $signupPasswordError; ?>
			
			<br><br>
			
			<input  type = "submit" value="Sign up">
			
			
		</form>
	</body>
</html>
<?php
//mvp idee - 
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	$loginEmailError = "";
	$loginPasswordError = "";
	
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
		
	if ( isset ( $_POST["loginEmail"] ) ) {
			
		if ( empty ( $_POST["loginEmail"] ) ) {
				
			$loginEmailError = "Insert your e-mail!";
				
		}
			
	}

	if ( isset ( $_POST["loginPassword"] ) ) {
		
		if ( empty ($_POST["loginPassword"] ) ) {
			
			$loginPasswordError = "Insert your password!";
			
		}
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log in or Sign up</title>
	</head>
	<body>

	<h1>Log in</h1>
		<form method = "POST">
			<fieldset>
				<legend>Existing users.</legend>
				<lable>E-mail</lable><br> 
				<input name = "loginEmail" type = "email" placeholder = "E-mail"> <?php echo $loginEmailError; ?>
				
				<br><br>
				<lable>Password</lable><br>
				<input name = "loginPassword" type = "password" placeholder = "Password"> <?php echo $loginPasswordError?>
				
				<br><br>
				
				<input  type = "submit" value="Log in">
			</fieldset>	
		</form>
		
	<h1>Sign up</h1>
		<form method = "POST">
			<fieldset>
				<legend>Create a new user.</legend>
				<lable>E-mail</lable><br> 
				<input name = "signupEmail" type = "email" placeholder = "E-mail"> <?php  echo $signupEmailError; ?>
				
				<br><br>
				<lable>Password</lable><br>
				<input name = "signupPassword" type = "password" placeholder = "Password"> <?php  echo $signupPasswordError; ?>
				
				<br><br>
				<lable>Gender</lable><br>
				<input type="radio" name="gender" value="female" checked>Female <input type="radio" name="gender" value="male" >Male 
				<br><br>
				
				<lable>Date of Birth</lable><br>
				<input type="date" name="bday">
				<br><br>
				<input  type = "submit" value="Sign up">
			</fieldset>
		</form>
	</body>
</html>


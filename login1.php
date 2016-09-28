
<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError="";
	$signupPasswordError="";
	$signupPassword2Error="";
	$loginEmailError="";
	$loginPasswordError="";
	
	// kas e-post oli olemas
	if (isset($_POST["signupPassword"])){
		
		if (empty($_POST["signupPassword"])){
			
			$signupPasswordError="See väli on kohustuslik!";
			
				} else {
			
				if (strlen($_POST["signupPassword"]) <8) {
					$signupPasswordError="Parool peab olema vähemalt 8 tähemärki pikk";
				}
			
		}
	}
	
	/*
	if (isset($_POST["signupPassword2"])){
		
		if (($_POST["signupPassword"])=/=($_POST["signupPassword2"]) ){
			
			$signupPassword2Error="Paroolid ei klapi!";
			
				
			
		}
	}
	*/
	
	
	if (isset($_POST["signupEmail"])){
				
		if (empty($_POST["signupEmail"])){
					
			$signupEmailError="See väli on kohustuslik!";
		
	
		}
	}
	if (isset($_POST["loginPassword"])){
		
		if (empty($_POST["loginPassword"])){
			
			$loginPasswordError="Sisestage siia oma parool, et sisse logida!";
			
				} else {
			
				if (strlen($_POST["loginPassword"]) <8) {
					$loginPasswordError="Parool peab olema vähemalt 8 tähemärki pikk";
				}
			
		}
	}
	if (isset($_POST["loginEmail"])){
				
		if (empty($_POST["loginEmail"])){
					
			$loginEmailError="Sisestage siia oma e-post, et sisse logida!";
		
	
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
			
				<input name="loginEmail" type="email" placeholder="E-post"> <?php echo $loginEmailError;?>
				
				<br><br>
				
				<input name="loginPassword" type="password" placeholder="Parool"> <?php echo $loginPasswordError;?>
				
				<br> <br>
				
				<input type="submit" value="Logi sisse">
				
			
			</form>
			
			<br><br>
			
			<h1>Registreeri</h1>
			
			<form method="POST">
			
				<label>Kasutajanimi</label><br>
				<input name="signupUsername" type="username"> <?php echo $signupPassword2Error;?>
				
				
				<br><br>
			
				<label>E-post</label><br>
				<input name="signupEmail" type="email"> <?php echo $signupEmailError;?>
				
				<br><br>
				
				<label>Parool</label><br>
				<input name="signupPassword" type="password"> <?php echo $signupPasswordError;?>
				
				<br> <br>
				
				<label>Parool uuesti</label><br>
				<input name="signupPassword2" type="password"> <?php echo $signupPassword2Error;?>
				
				<br> <br>
				
				Sugu:
				<input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
			    <input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
				
				<br><br>
				
				<input type="submit" value="Loo kasutaja">
				
				
				<br><br>
			
			</form>

	</body>
</html>

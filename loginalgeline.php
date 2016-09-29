
<?php

	$signupEmailError="";
	$signupPasswordError="";
	$signupPassword2Error="";
	$signupUsernameError="";
	$loginEmailError="";
	$loginPasswordError="";
	
	if (isset($_POST["signupPassword"])){
		
		if (empty($_POST["signupPassword"])){
			
			$signupPasswordError="See vali on kohustuslik!";
			
				} else {
			
				if (strlen($_POST["signupPassword"]) <8) {
					$signupPasswordError="Parool peab olema vahemalt 8 tahemarki pikk";
				}
		}
	}
	
	if (isset($_POST["signupPassword2"])){
		
		if (empty($_POST["signupPassword2"])){
			
			$signupPassword2Error="Ara jata tuhjaks, sisesta siia parool uuesti!!!";
		
				if (($_POST["signupPassword"])!=($_POST["signupPassword2"]) ){
			
					$signupPassword2Error="Paroolid ei klapi!";
				}
		}
	}
	
	if (isset($_POST["signupEmail"])){
				
		if (empty($_POST["signupEmail"])){
					
			$signupEmailError="E-maili sisestamine on kohustuslik!";
		}
	}
	
	if (isset($_POST["signupUsername"])){
				
		if (empty($_POST["signupUsername"])){
					
			$signupUsernameError="Kasutajanime sisestamine on kohustuslik!";
		}
	}
	
	if (isset($_POST["loginPassword"])){
		
		if (empty($_POST["loginPassword"])){
			
			$loginPasswordError="Sisestage siia oma parool, et sisse logida!";
			
				} else {
			
				if (strlen($_POST["loginPassword"]) <8) {
					$loginPasswordError="Parool peab olema vahemalt 8 tahemarki pikk";
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
				
				<br><br>
				
				<input type="submit" value="Logi sisse">
				
			</form>
			
			<br><br>
			
			<h1>Loo kasutaja</h1>
			
			<form method="POST">
			
				<label>Kasutajanimi</label>
				<br>
				<input name="signupUsername" type="username"> <?php echo $signupUsernameError;?>
				
				<br><br>
			
				<label>E-post</label>
				<br>
				<input name="signupEmail" type="email"> <?php echo $signupEmailError;?>
				
				<br><br>
				
				<label>Parool</label>
				<br>
				<input name="signupPassword" type="password"> <?php echo $signupPasswordError;?>
				
				<br><br>
				
				<label>Parool uuesti</label>
				<br>
				<input name="signupPassword2" type="password"> <?php echo $signupPassword2Error;?>
				
				<br><br>
				
				<h4>Vali oma sugu</h4>
				
				<input type="radio" name="gender" value="male" checked> Mees
				<br>
				<input type="radio" name="gender" value="female"> Naine
				<br>
				<input type="radio" name="gender" value="other"> Muu
				
				<br><br>
				
				<input type="submit" value="Loo kasutaja">
				
			</form>

	</body>
</html>

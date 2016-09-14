

<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError="";
	$signupPasswordError="";
	
	// kas e-post oli olemas
	if (isset($_POST["signupPassword"])){
		
		if (empty($_POST["signupPassword"])){
			
			$signupPasswordError="See v2li on kohustuslik!!!!!!!";
			
				} else {
			
				if (strlen($_POST["signupPassword"]) <8) {
					$signupPasswordError="Parool peab olema v2hemalt 8 t2hem2rki pikk";
				}
			
		}
	}
	if (isset($_POST["signupEmail"])){
				
		if (empty($_POST["signupEmail"])){
					
			$signupEmailError="See v2li on kohustuslik!!!!!!!!!!!!";
		
	
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
			
				<label>E-post</label><br>
				<input name="loginEmail" type="email">
				
				<br><br>
				
				<input name="loginPassword" type="password" placeholder="Parool">
				
				<br> <br>
				
				<input type="submit" value="Logi sisse">
				
			
			</form>
			
			<br><br>
			
			<form method="POST">
			
				<label>E-post</label><br>
				<input name="signupEmail" type="email"> <?php echo $signupEmailError;?>
				
				<br><br>
				
				<input name="signupPassword" type="password" placeholder="Parool"> <?php echo $signupPasswordError;?>
				
				<br> <br>
				
				<input type="submit" value="Loo kasutaja">
				
			
			</form>

	</body>
</html>

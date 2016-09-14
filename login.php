<?php
	//var_dump ($_GET);
	//echo "<br>";
	//var_dump ($_POST);
	$signupemailerror = "";
	$signuppassworderror = "";
	//kas epost oli olemas
	if(isset ($_POST["signupemail"])){
		
		if (empty ($_POST["signupemail"])){
			
			// oli email, kuid see oli tühi
			$signupemailerror = "See väli on tühi";
			
		}else {
			//tean et oli parool ja ei olnud tühi.
			//vähemalt 8
			if (strlen($_POST["signuppassword"]) < 8) {
				$signuppassworderror = "Parool peab olema vähemalt 8 tähemärkki pikk";
			}
			
		}
	}

	if(isset ($_POST["signuppassword"])){
		if (empty ($_POST["signuppassword"])){
			$signuppassworderror = "See väli on tühi";
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
			<!--<label>E-post</label><br>-->
			<input name="loginemail" placeholder="E-post">
			<br><br>
			<input name="loginpassword" placeholder="Parool">
			<br><br>
			<input type="submit" value="Logi sisse">
		</form>

	</body>
</html>

<h1>Loo kasutaja</h1>
		<form method = "POST">
			<!--<label>E-post</label><br>-->
			<input name="signupemail" type = "email" placeholder="E-post"><?php echo $signupemailerror; ?>
			<br><br>
			<input name="signuppassword" type="password" placeholder="Parool"><?php echo $signuppassworderror; ?>
			<br><br>
			<input type="submit" value="Logi sisse">
		</form>
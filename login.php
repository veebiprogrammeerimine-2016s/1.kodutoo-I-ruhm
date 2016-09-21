

<?php
	
	//var_dump ($_GET);
	//echo "<br>";
	//var_dump ($_POST);
	$signupemailerror = "";
	$signuppassworderror = "";
	$loginemailerror = "";
	$loginpassworderror = "";
	$nimierror = "";
	$pereerror = "";
	
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
	
	if (isset ($_POST["loginemail"])) {
		if (empty ($_POST ["loginemail"])){
			$loginemailerror = "See väli on tühi";
		}else {
			if (strlen ($_POST["loginpassword"])< 8) {
				$loginpassworderror = "Parool peab olema vähemalt 8 tähemärkki pikk";
			}
		}
	}
	
	if (isset($_POST ["loginpassword"])){
		if (empty ($_POST ["loginpassword"])){
			$loginpassworderror = "See väli on tühi";
		}
	}
	
	if (isset ($_POST ["eesnimi"])){
		if (empty($_POST ["nimierror"])){
			$nimierror = "See väli on tühi";
		}
	}
	
	if (isset ($_POST ["perenimi"])){
		if (empty($_POST ["pereerror"])){
			$pereerror = "See väli on tühi";
		}
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise lehekülg</title>
	</head>
	<body bgcolor = "#C1FFFD">
	<style>	
		body {
			background-image:	url("http://orig02.deviantart.net/b294/f/2014/266/1/d/braum_render_by_void_zormak-d809wg3.png");
			background-repeat: no-repeat;
			background-position: right bottom;
			background-attachment: fixed;
			}
	</style>


		<h1><font color = "blue">Logi sisse</font></h1>
		<form method = "POST">
			<!--<label>E-post</label><br>-->
			<input name="loginemail" type = "email" placeholder="E-post"> <?php echo $loginemailerror; ?>
			<br><br>
			<input name="loginpassword" type = "password" placeholder="Parool"> <?php echo $loginpassworderror; ?>
			<br><br>
			<input type="submit" value="Logi sisse">
		</form>

	</body>
</html>

<h1><font color = "blue">Loo kasutaja</font></h1>
		<form method = "POST">
			<!--<label>E-post</label><br>-->
			<input name="signupemail" type = "email" placeholder="E-post"><?php echo $signupemailerror; ?>
			<br><br>
			<input name="signuppassword" type="password" placeholder="Parool"><?php echo $signuppassworderror; ?>
			<br><br>
			<b><font color = "blue">Nimi</font></b> 
			<p>
			<input name ="eesnimi" placeholder = "Eesnimi"><?php echo $nimierror; ?>
			<br><br>
			<input name="perenimi" placeholder="Perekonnanimi"><?php echo $pereerror; ?>
			
		<p>
			<b><font color = "blue">Sugu</font></b>
			<p>
			<input type="radio" name="gender" value="male"> <i>Mees</i><br>
			<input type="radio" name="gender" value="female"> <i>Naine</i><br>
			<input type="radio" name="gender" value="other"> <i>Muu</i><br>
		<p>
		
			<input type="submit" value="Logi sisse">
		</form>
		
		<html>
		<body>
		<h1>MVP IDEE</h1>
		<p>
	    League of legends art community 
		<p>
		veebileht inimestele, kes on huvitatud arvutimängust League of Legends ja joonistavad/harrastavad sellega seotuid fan art'e.
		<p> on võimalus lisada enda joonistusi, hinnata teiste fan art'e.
		<p> On ka olemas kommenteerimise võimalus,paremuse lehekülg, portfolio loomise võimalus.
		</body>
		</html>
	
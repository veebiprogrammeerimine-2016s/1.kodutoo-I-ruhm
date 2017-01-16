<?php
	
	//võtab ja kopeerib faili sisu
	require("functions.php");
	
	//kas kasutaja on sisse logitud
	if (isset ($_SESSION["userId"])) {
		
		header("Location: data.php");
		
	}

	//var_dump(5.5);
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	// MUUTUJAD
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupEmail = "";
	$loginEmailError = "";
	$loginPasswordError = "";
	$loginEmail = "";
	$Nickname = "";
	$Nicknameerror = "";

	// kas e/post oli olemas
	if ( isset ( $_POST["signupEmail"] ) ) {
		if ( empty ( $_POST["signupEmail"] ) ) {
			// oli email, kuid see oli tühi
			$signupEmailError = "See väli on kohustuslik!";
		} else {
			
			$signupEmail = $_POST["signupEmail"];
			
			
		}
	}
	
	if ( isset ( $_POST["Nickname"] ) ) {
		if ( empty ( $_POST["Nickname"] ) ) {
			$Nicknameerror = "See väli on kohustuslik!";
		} else {
			
			$Nickname = $_POST["Nickname"];
		}
	}
	
	if ( isset ( $_POST["signupPassword"] ) ) {
		if ( empty ( $_POST["signupPassword"] ) ) {
			// oli password, kuid see oli tühi
			$signupPasswordError = "See väli on kohustuslik!";
		} else {
			// tean et parool on ja see ei olnud tühi
			// VÄHEMALT 8
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärkki pikk";
			}
		}
	}
	
	if ( isset ( $_POST["loginEmail"] ) ) {
		if ( empty ( $_POST["loginEmail"] ) ) {
			// oli email, kuid see oli tühi
			$loginEmailError = "See väli on kohustuslik!";
		}	
	}
	
	if ( isset ( $_POST["loginPassword"] ) ) {
		if ( empty ( $_POST["loginPassword"] ) ) {
			// oli password, kuid see oli tühi
			$loginPasswordError = "See väli on kohustuslik!";
		} else {
			// tean et parool on ja see ei olnud tühi
			// VÄHEMALT 8
			if ( strlen($_POST["loginPassword"]) < 8 ) {
				$loginPasswordError = "Parool peab olema vähemalt 8 tähemärkki pikk";
			}
		}
	}
	
	$gender = "male";
	// KUI Tühi
	// $gender = "";
	if ( isset ( $_POST["gender"] ) ) {
		if ( empty ( $_POST["gender"] ) ) {
			$genderError = "See väli on kohustuslik!";
		} else {
			$gender = $_POST["gender"];
		}
	}
	
	
	// Kus tean et ühtegi viga ei olnud ja saan kasutaja andmed salvestada
	if ( isset($_POST["signupPassword"]) &&
		isset($_POST["signupEmail"]) &&
		isset($_POST["Nickname"]) &&
		empty($signupEmailError) && 
		empty($signupPasswordError) &&
		empty($Nicknameerror) 
	   ) {
		echo "Salvestan...<br>";
		echo "email ".$signupEmail."<br>";
		$password = hash("sha512", $_POST["signupPassword"]);
		echo "parool ".$_POST["signupPassword"]."<br>";
		echo "räsi ".$password."<br>";
		echo "name " .$Nickname."<br>";
		signup($signupEmail, $password, $gender, $Nickname);
	}
	
	$error = "";
	// kontrollin, et kasutaja täitis välja ja võib sisse logida
	if ( isset($_POST["loginEmail"]) &&
		 isset($_POST["loginPassword"]) &&
		 !empty($_POST["loginEmail"]) &&
		 !empty($_POST["loginPassword"])
	  ) {
		//login sisse
		$error = login($_POST["loginEmail"], $_POST["loginPassword"]);
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
			<p style="color:red;"><?=$error;?></p>
			<label>E-post</label><br>
			<input name="loginEmail" type="email" value="<?=$loginEmail;?>"> <?php echo $loginEmailError; ?>
			
			<br><br>
			
			<input name="loginPassword" type="password" placeholder="Parool"> <?php echo $loginPasswordError; ?>
			
			<br><br>
			
			<input type="submit" value="Logi sisse">
			
		</form>
		
		<h1>Loo kasutaja</h1>
		
		<form method="POST">
		
			<label>E-post</label><br>
			<input name="signupEmail" type="email" value="<?=$signupEmail;?>"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input name="signupPassword" type="password" placeholder="Parool"> <?php echo $signupPasswordError; ?>
			
			<br><br>
			
			 <?php if($gender == "male") { ?>
				<input type="radio" name="gender" value="male" checked> Male<br>
			 <?php } else { ?>
				<input type="radio" name="gender" value="male" > Male<br>
			 <?php } ?>
			 
			 <?php if($gender == "female") { ?>
				<input type="radio" name="gender" value="female" checked> Female<br>
			 <?php } else { ?>
				<input type="radio" name="gender" value="female" > Female<br>
			 <?php } ?>
			 
			 <?php if($gender == "other") { ?>
				<input type="radio" name="gender" value="other" checked> Other<br>
			 <?php } else { ?>
				<input type="radio" name="gender" value="other" > Other<br>
			 <?php } ?>
			 
			<br>
			<label>Nickname</label><br>
			<input name="Nickname" type="text"> <?php echo $Nicknameerror; ?>
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
			
		</form>
		
	</body>
</html>
<br><br>
<h1>MVP idee</h1>
Spordikeskus kus inimesed voivad valida endale kursuseid, saada allahindlusi, treeningukava vaadata, valida treenereid ja muud.
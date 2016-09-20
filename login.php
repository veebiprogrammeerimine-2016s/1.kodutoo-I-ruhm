<?php

$signupEmailError="";
$signupPasswordError="";
$loginEmailError="";
$loginPasswordError="";

//Kas see on üldse olemas
if(isset($_POST["signupEmail"])){
	//On olemas, ehk keegi vajutas nuppu
	if(empty($_POST["signupEmail"])){
		//Kui oli tõesti väli tühjaks jäetud
		$signupEmailError="<i>See väli on kohustuslik!</i>";
	}
}

if(isset($_POST["signupPassword"])){
	if(empty($_POST["signupPassword"])){
		$signupPasswordError="<i>See väli on kohustuslik!<i>";

		else{
			if(strlen($_POST["signupPassword"]) <8 ){
				$signupPasswordError="<i>Parool peab olema vähemalt 8 tähemärki pikk!</i>";
		}
	}
}

if(isset($_POST["loginEmail"])){
	if(empty($_POST["loginEmail"])){
		$loginEmailError="<i>See väli on kohustuslik!<i>";
	}
}

if(isset($_POST["loginPassword"])){
	if(empty($_POST["loginPassword"])){
		$loginPasswordError="<i>See väli on kohustuslik!<i>";
	}
}

?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>Sisselogimine</title>
	</head>

	<body>
		
		<h2>Logi sisse:</h2>

		<form method="POST">
			
			<input name="loginEmail" type="email" placeholder="E-Mail"> <?php echo $loginEmailError; ?>

				<br><br>

			<input name="loginPassword" type="password" placeholder="Parool"> <?php echo $loginPasswordError; ?>

				<br><br>

			<input type="submit" value="Logi sisse">

		<h2>Loo uus kasutaja:</h2>

			<label>E-mail</label>
			<input email="signupEmail" type="email"> <?php echo $signupEmailError; ?>

				<br><br>

			<label>Parool</label>
			<input password="signupPassword" type="password"> <?php echo $signupPasswordError; ?>

				<br><br>

			<label>Sugu:</label>

				<br>

			<input type="radio" name="male" value="male"> Mees
			<input type="radio" name="female" value="female"> Naine

				<br><br>

			<label>Sünnikuupäev</label>

				<br>

			<input type="date" name="birthdate">

				<br><br>

			<input type="submit" value="Loo kasutaja">

		</form>

	</body>

</html>
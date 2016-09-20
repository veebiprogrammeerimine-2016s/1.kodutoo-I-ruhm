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
	}else{
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
			
			<input name="loginEmail" type="email" palceholder="E-Mail">

				<br><br>

			<input name="loginPassword" type="password" placeholder="Parool">

				<br><br>

			<input type="submit" value="Logi sisse!"

		<h2>Loo uus kasutaja:</h2>

		<form method="POST">

			<label>E-mail</label>
			<input email="signupEmail" type="email"> <?php echo $signupEmailError; ?>

				<br><br>

			<label>Parool</label>
			<input password="signupPassword" type="password"> <?php echo $signupPasswordError; ?>

				<br><br>

			<label>Sugu</label>
			<input type="checkbox" name="male" value="male"> Mees

				<br>

			<input type="checkbox" name="female" value="female"> Naine

			<label>Sünnikuupäev</label>
			<input type="date" name="birthdate">

			<input type="submit" value="Loo kasutaja">

		</form>

	</body>

</html>
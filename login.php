<?php

	$signupUsernameError = "";
	$signupGenderError = "";
	$signupEmailError = "";
	$signupPasswordError = "";
	
	if (isset ($_POST["signupUsername"]) ) {
	
		if (empty ($_POST["signupUsername"]) ) { 
			$signupUsernameError = "See väli on kohustuslik!";
		
		}
	}
	
	if (isset ($_POST["signupPassword"]) ) {
	
		if (empty ($_POST["signupPassword"]) ) { 
			$signupPasswordError = "See väli on kohustuslik!";
		
		} else {
			
			if (strlen ($_POST["signupPassword"]) <= 5 ){
				$signupPasswordError = "Parool peab olema 5 tähemärki pikk!";
			}
		}
	}

	
	// püüdsin teha w3schools materjalide põhjal, kuid siin jäi töö poolikuks, sest ei osanud mitme valiku puhul määrata, mis saab siis, kui kasutaja jätab soo määramata.
	if (isset ($_POST["signupGender"]) ) {
	
		if (empty ($_POST["signupGender"]) ) { 
			$signupGenderError = "See väli on kohustuslik!";
		}
	}
	
	if (isset ($_POST["signupEmail"]) ) {
	
		if (empty ($_POST["signupEmail"]) ) { 
			$signupEmailError = "See väli on kohustuslik!";
		}
	}
	
	//MVP idee: luua rakendus (sarnaselt goodreads.com'ile), kuhu kasutaja saab lisada, millist raamatut loeb, kui kaua võttis ühe raamatu lugemine aega, millised on tema lemmikraamatud jms, ning leht näitab nende tunnuste alusel statistikat (nt kui palju raamatuid kasutaja luges ühel aastal ning kui palju aega on ta lugemisele kulutanud)
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise lehekülg</title>
	</head>
	<body>

		<h1>Logi sisse</h1>

		<form method="POST">
		
			<input name="loginEmail" type="email" placeholder="E-maili aadress">
			
			<br><br>
			
			<input name="loginPassword" type="password" placeholder="Parool">
			
			<br><br>
			
			<input type="submit" value="Logi sisse">
		
		</form>
		
		<br><br>
		
		<h1>Loo kasutaja</h1>
		
		<form method="POST"> 
		
			<input name="signupUsername" type="username" placeholder="Kasutajatunnus"> <?php echo $signupUsernameError; ?>
		
			<br><br>
			
			<input name="signupPassword" type="password" placeholder="Parool"> <?php echo $signupPasswordError; ?>
			
			<br><br>
			
			<label>Sugu</label><br>
			
			<input name="signupGender" type="radio" <?php if (isset($signupGender) && $signupGender=="male") echo "checked";?> value="male"> Mees<?php echo $signupGenderError; ?>
			<br>
			<input name="signupGender" type="radio" <?php if (isset($signupGender) && $signupGender=="female") echo "checked";?> value="female"> Naine<?php echo $signupGenderError; ?>
			<br>
			<input name="signupGender" type="radio" <?php if (isset($signupGender) && $signupGender=="other") echo "checked";?> value="other"> Ei soovi avaldada<?php echo $signupGenderError; ?>
			
			<br><br>
		
			<input name="signupEmail" type="email" placeholder="E-maili aadress"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
		
		</form>
		
	</body>

</html>
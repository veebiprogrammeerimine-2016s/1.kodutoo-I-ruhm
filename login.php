<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	$genderError = "";
	$nameError = "";
	$nameErr="";

	//kas epost oli olemas
	
	if ( isset ( $_POST ["signupEmail"])) {
		
		if ( empty ($_POST ["signupEmail"])) {
			
			//oli email, kuid see oli tuhi
			$signupEmailError = "See väli on kohustuslik!";
		}
	}
	
	if ( isset ( $_POST ["signupPassword"])) {
		
		if ( empty ($_POST ["signupPassword"])) {
			
			//oli email, kuid see oli tuhi
			$signupPasswordError = "See väli on kohustuslik!";
			
		} else{
			
			// tean, et parool ja see ei olnud tuhi
			//vahemalt 8
			if ( strlen($_POST ["signupPassword"]) < 8 ){
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk!";
			}
				
			
		}
		if (empty($_POST["gender"])) {
    			$genderError = "See väli on kohustuslik!";
  			}
		}
	if ( isset ( $_POST ["name"])) {
		if ( empty ( $_POST ["name"])) {
			$nameError = "See väli on kohustuslik!";
		} else{
			if ( !preg_match("/^ [a-zA-Z'-]+$/", $name))
				$nameErr = "Lubatud vaid tähed!";
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
		
		<form method="POST"> <!-- kaotab aadressireal -->
			
			<input name="loginEmail" type="email" placeholder="E-post">
			<br>
			<br>
			<input name="loginPassword" type= "password" placeholder="Parool">
			<br>
			<br>
			<input type="submit" value="Logi sisse">
		
		</form>

	</body>
</html>

<br><br>

<h1>Loo kasutaja</h1>
		
		<form method="POST"> 

			<input type="text" name="name" placeholder="Nimi"> <?php echo $nameError; ?> <?php echo $nameErr; ?>
			<br>
			<br>		
			<input name="signupEmail" type="email" placeholder="E-post"> <?php echo $signupEmailError; ?>
			<br>
			<br>
			<input name="signupPassword" type="password" placeholder="Parool"> <?php echo $signupPasswordError; ?>
			<br>
			<br>
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Naine") echo "checked";?> value="Naine">Naine <?php echo $genderError; ?>
  			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Mees") echo "checked";?> value="Mees">Mees <?php echo $genderError; ?>
			<br>
			<br>
			<textarea name="L�hitutvustus" placeholder="Tutvusta ennast(hobid, muusikamaitse jne)" rows="5" cols="40"></textarea>
			<br>
			<br>
			<input type="submit" value="Loo kasutaja">
		
		</form>
	
		<!--T��kindla tellimusvormi loomine. Vajalik tellija info, pakisaatmisteenuse valimine jne.-->

	</body>
</html>

<br><br>

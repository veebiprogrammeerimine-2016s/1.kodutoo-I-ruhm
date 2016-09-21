<?php
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///MVP idee:
	///
	///Esimene idee.. Mingisugune veeb mis kuvab reaalajas erinevaid valuutakursse, suurfirmade aktsiaväärtusi, väärismetallide hindu
    ///jms - mille kohta on info internetist tasuta saadaval. Saab luua erinevad väärtused erinevatesse kategooriatesse.
	///
	///Teise ideena lihtsam e-poe lahendus.
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST)
	
	$signupEmailError = "";
	$signupPasswordError = "";
	$loginEmailError = "";
	$loginPasswordError = "";
	$signupDateError = "";
	
	
	//kas epost oli olemas
	if (isset ($_POST["signupEmail"]) ) {
		
		if( empty ($_POST["signupEmail"]) ) {
			//oli email, kuid see oli tühi
			$signupEmailError = "See väli on kohustuslik!";
		}	
	}
	//kas password oli olemas
	if (isset ($_POST["signupPassword"]) ) {
		
		if( empty ($_POST["signupPassword"]) ) {
			//oli password, kuid see oli tühi
			$signupPasswordError = "See väli on kohustuslik!";
		} else {
			//tean et parool ja see ei olnud tühi
			//vähemalt 8
			
			if ( strlen($_POST["signupPassword"]) < 8) {
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk!";	
			}	
		}	
	}
	//kas eposti v2li on t8hi
	if (isset ($_POST["loginEmail"]) ) {
		
		if( empty ($_POST["loginEmail"]) ) {
			
			$loginEmailError = "See väli on kohustuslik!";
		}
	}	
	//kas parooli v2li on t8hi
	if (isset ($_POST["loginPassword"]) ) {
		
		if( empty ($_POST["loginPassword"]) ) {
			
			$loginPasswordError = "See väli on kohustuslik!";
		}	
	}
	//kontrollib kas sünnikuupäev on õiges formaadis, väli ei ole kohustuslik
	if (isset ($_POST["signupDate"]) ) {
		
		if (strlen ($_POST["signupDate"]) != 10) {
			
			
			if (strlen ($_POST["signupDate"]) != 0 ) {
				
				$signupDateError = "Kuupäev on vales formaadis! Sisesta palun nii: pp/kk/aaaa";
				
			}
			
			
			
		}
				
				
	}	
			
	
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Sisselogimisleht </title>
	
	
	
	</head>

	<body>
	
		<h3>Logi sisse</h3>
	
		<form method="POST">
			
			
			<input type="email" name="loginEmail" placeholder="Email"> <?php echo $loginEmailError;?>
			<br><p>
			<input type="password" name="loginPassword" placeholder="Parool"> <?php echo $loginPasswordError;?>
			<br><p>
			<input type="submit" value="Logi sisse">
		
		</form>
		
		<h3>Loo kasutaja</h3>
	
		<form method="POST">
			
			<input type="email" name="signupEmail" placeholder="example@example.com"> <?php echo $signupEmailError;?>
			<br><p>
			<input type="password" name="signupPassword" placeholder="Parool"> <?php echo $signupPasswordError;?>
			<br><p>
			<input type="email" name="signup" placeholder="Kasutajanimi"> <?php echo $signupEmailError;?>
			<br><p>
			<input type="email" name="signup" placeholder="Nimi"> 
			<br><p>
			<input type="date" name="signupDate" placeholder="Sünnikuupäev"> <?php echo $signupDateError;?>
			<br><sup>pp/kk/aaaa</sup>
			<br><p>
			<input type="submit" value="Registreeri kasutaja">
		
		</form>
	
	
	
	
	 
	
	
	</body>
</html>
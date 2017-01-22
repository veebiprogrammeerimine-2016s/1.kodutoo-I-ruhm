
<?php
//// Järgmise kodutoo ideeks on kitarride registreerimine tansporteerimiseks 

	
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupCountryError = "";
	$signupPhoneError = "";
	
	// kas email  olemas
	if ( isset ( $_POST["signupEmail"] ) ) {
		
		if ( empty ( $_POST["signupEmail"] ) ) {
			
			// oli email, kuid see oli tuhi
			$signupEmailError = "See vali on kohustuslik!";
			
		}
		
	}
	// kas telefon  olemas
	if ( isset ( $_POST["signupphone"] ) ) {
		
		if ( empty ( $_POST["signupphone"] ) ) {
			
			// oli email, kuid see oli tuhi
			$signupPhoneError = "See vali on kohustuslik!";
			
		}
		
	}
	// kas linn  olemas
	if ( isset ( $_POST["signupcountry"] ) ) {
		
		if ( empty ( $_POST["signupcountry"] ) ) {
			
			// oli email, kuid see oli tuhi
			$signupCountryError = "See vali on kohustuslik!";
			
		}
		
	}
	

		
	
	
	if ( isset ( $_POST["signupPassword"] ) ) {
		
		if ( empty ( $_POST["signupPassword"] ) ) {
			
			// oli password, kuid see oli tuhi
			$signupPasswordError = "See vali on kohustuslik!";
			
		} else {
			
			// tean et parool on ja see ei olnud tuhi ja oleks vahemalt 8 tahti
			
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Paroolis peab olema vahemalt 8 tahti";
				
			}
			
		}
		
	}
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise lehekulg</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		
		<form method="POST">
			
			
			<input name="loginEmail" type="email" placeholder="Email">
			
			<br><br>
			
			<input name="loginPassword" type="password" placeholder="Parool">
			
			<br><br>
			
			<input type="submit" value="Logi sisse">
			
		</form>
		
		<h1>Loo kasutaja</h1>
		
		<form method="POST">
			
			
			<input name="signupEmail" type="email" placeholder="Email"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input name="signupPassword" type="password" placeholder="Parool"> <?php echo $signupPasswordError; ?>
			
			<br><br>
			
			<input name="signupcountry" type="text" placeholder="Linn"> <?php echo $signupCountryError; ?>
			
			<br><br>
			
			<input name="signupphone" type="text" placeholder="Telefon"> <?php echo $signupPhoneError; ?>
			
			<br><br>
			
			<select name="singupsex"> 
				<option value="female">Naine</option>
				<option value="male">Mees</option>
				<option value="other">Teine</option>
			</select>
			
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
			
		</form>
		
	</body>
</html>

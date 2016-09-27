<?php
//"MVP idee"
// "Spordikeskuse veebileht kus oleks võimalik kasutada sooduskaarti, valida mis spordikursusi võib valida, treenerite ajakavad, hinnad, mingid üritused ja kampaaniad."
// "Kui sa ei lähe trenni siis sinu koht on kinni ja teised ei saa sinu asemel minna sinna."
// Esimene kord tasuta, proovimiseks. Treeningud, uudised(kalender), reeglid, liitumine ja hinnakiri, kontaktid, koraldada uritus, uurida saal, galerii, soodustused, personaaltreening(isiklik treener), mingi slogan.

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupPhonenumberError = "";
	$PhonenumberError = "";
	// kas e-post oli olemas
	if(isset ($_POST["signupEmail"])) {
		
		if (empty ($_POST["signupEmail"])) {
				
				// oli email, kuid see oli tuhi
				
				$signupEmailError = "See vali on kohustuslik";
			
			
		}else {
			//tean et oli parool ja see ei olnud tuhi
			//vahemalt 8
			
			if (strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vahemalt 8 tahemarki pikk";
				
			}
		}
	}
	
	if(isset ($_POST["signupPassword"])) {
		
		if (empty ($_POST["signupPassword"])){
				
					$signupPasswordError = "See vali on kohustuslik";
		}

	}
	
	if(isset ($_POST["Phonenumber"])) {
		
		if (empty ($_POST["Phonenumber"])){
				
					$PhonenumberError = "Palun sisestage oma number";
		}

	}
	
	
	
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise lehekulg</title>
	</head>
	<body>

		<h1>Logi Sisse</h1>

		<form method = "POST">
		
			<label> E-post</label><br>

			<input name = "LoginEmail" type = "email">
			
			<br><br>
			
			<input name = "LoginPassword" type = "password" placeholder  = "Parool"> 
			
			<br><br>
			
			<input type = "submit" value = "Logi sisse">
		
		</form>
		
		<h1> Loo kasutaja </h1/>
		
			<form method = "POST">
			
			<label> E-post</label><br>
			
			<input name = "signupEmail" type = "email"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input name = "signupPassword" type = "password" placeholder  = "Parool">  <?php echo $signupPasswordError; ?>
			
			<br><br>
		
			<form method = "POST">
			
			<label> Telefoni number </label><br> 
			
			<input type="tel" name="Phonenumber" placeholder  = "12345678"	pattern="[0-9]{8}"> <?php echo $PhonenumberError; ?>
			
			<br><br>
			
			<form method = "POST">
		
			<label> Male/Female</label><br><br>
			
			<input type="radio" name="s" value="m" /> Male<br />
			
			<input type="radio" name="s" value="f" /> Female<br />
			
			<input type="radio" name="s" value="f" /> Other
			
			<br><br>
			
			<form method = "POST">
			
			<label>Birthday (month and year):</label>
			
			<input type="month" name="monthandyear">
			
			<br><br>
			
			<input type = "submit" value = "Registreeru">
			
		</form>
	
	</body>
	
</html>
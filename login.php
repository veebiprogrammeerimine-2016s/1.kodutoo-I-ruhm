<?php
// GET ja POSTi muutujad
//var_dump ($_GET);
//echo"<br>";
//var_dump ($_post);
$signupEmailError = "";
	$signupPasswordError = "";
//kontrollin, kas epost on olemas
if (isset ($_POST["signupEmail"])){
	if (empty ($_POST ["signupEmail"])){
		$signupEmailError = "See vali on kohustuslik";
	//Kui email oli tühi
	
	}
}

	if( isset($_POST["signupPassword"])) {
		
		if( empty($_POST["signupPassword"])) {
			$signupPasswordError = "See vali on kohustuslik";	
			
		
	}else{
		//Siia jõuan siis, kui parool oli olemas ja parool, ei olnud tühi. !ELSE!
			if(strlen($_POST["signupPassword"])<8) {
				
				$signupPasswordError = "Parool peab olema vahemalt 8 marki pikk"; 
				
			}
			
			
		
		
	}
}
	

	
?>

<!DOCTYPE html>
<html>
<title>Sisselogimise lehekulg</title>
<body>
<!-- sedasi käivad kommentaarid! -->
<!-- label annab inputile nimetuse -->
<h1>Logi sisse</h1>

	<form method = "POST">
	
	<label>E-post</label><br>
	<input name="loginemail" type="email">
	<br><br>
	
	<label>Parool</label><br>
	<input name="loginpassword" type="password">
	<br><br>
	
	<input type="submit" value="Logi sisse">
	<input type="submit" value="Unustasin parooli"
	<br><br>
	
	<h1>Loo kasutaja</h1>

	<form method = "POST">
	<br><br>
	<label>E-post</label><br>
	<input name="signupEmail" type="email"> <?php echo $signupEmailError; ?>
	<br><br>
	
	<label>Parool</label><br>
	<input name="signupPassword" type="password"> <?php echo $signupPasswordError; ?>
	<br><br>
	
	<label>Ees- ja perekonnanimi</label><br>
	<input name="signupname" type="name">
	<br><br>
	
	<label>Vanus</label><br>
	<input name="signupage" type="age"
	<br><br>
	
	<input type="submit" value="Registreeru">
	
	</form>

</body>
</html>

<?php
// Loo kasutaja.
// kasutajanimi
// parool
// email
// salvestamis nupp (LOO)

// Kaks erinevat sildistamise viisi. Atribuut label või element label e. silt.
// Connecting label and input. Google this later.
// Input on üks vähestest elementidest, millel pole olemas lõppu.
// Atribuutide järiekord ei oma tähtsust.


// GET ja POST meetod. 
// GET on igaühele ligipääsetavad. 
// POST on varjatud informatsiooni jaoks nagu password, kustutamistegevused jne.


?>


<?php

	//GET ja POST muutujad
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	$lowPasswordError = "";

	
	//$_POST["signEmail"]
	//$_POST["signEmail"]
	
	//isset küsib kas selline asi on olemas
	if(isset($_POST["signEmail"])){
		
		//jah on olemas
		//kas on tühi
		if(empty($_POST["signEmail"])){
			$signupEmailError = "See väli on kohustuslike.";
		}
	}

	if(isset($_POST["signupPassword"])){
		if(empty($_POST["signupPassword"])){
			$signupPasswordError= "See väli on kohustuslik.";	
		}
	}

	
	if(isset($_POST["signupPassword"])){
		if(strlen($_POST["signupPassword"])<16){
			echo "you sick bastard.";
		}
	}
	
?>

<?php 
	//GET ja POSTi muutujad
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	
	// on üldse olemas selline muutja
	if( isset( $_POST["signupEmail"] ) ){
		
		//jah on olemas
		//kas on tühi
		if( empty( $_POST["signupEmail"] ) ){
			
			$signupEmailError = "See väli on kohustuslik";
			
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sissepääsuhaldur</title>
</head>
<body>

	<h1>Logi sisse</h1>
	<form method="POST">
		
		<input placeholder="E-Post" name="loginEmail" type="text">
		<input type="password" name="loginPassword" placeholder="Parool">
		<input type="submit" value="Logi sisse">
	
	</form>
	
	
	<h1>Loo kasutaja</h1>
	<form method="POST">
		
		<input placeholder="E-Post" name="signupEmail" type="text"> <?php echo $signupEmailError; ?>
		<br><input type="password" name="signupPassword" placeholder="Parool"><?php echo $signupPasswordError ?>  <?php echo $lowPasswordError; ?>
		</br><input type="submit" value="Loo kasutaja">
		
		
	</form>

</body>
</html>
</html>
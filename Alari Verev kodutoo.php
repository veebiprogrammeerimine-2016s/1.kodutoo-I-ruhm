<?php
//MVP IDEE:
//kasutaja saab veebilehele minnes valida eesti linna
//peale linna valimist näeb listi linnas asuvatest restoranidest
//restorane saab järjestada hinnete järgi, keskmise hinna ning nime järgi
//restorani peale klõpsates näeb inimene restorani menüüd
//andmebaasi salvestub kui inimene annab restoranile hinnangu või klõpsab peale, selleks et teha 
//statistikat populaarsematest restorranidest


	//votab ja kopeerib faili sisu
	require("../../config.php");
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupCheckboxError = "";
	$signupError = "";
	$signupEmail = "";
	$gender = "male";
	$signupage = "";
	$signupageError = "";
	
	//kas on üldse olemas
	if (isset ($_POST["signupEmail"])) {
		// oli olemas, ehk keegi vajutas nuppu
		if (empty($_POST["signupEmail"])) {
			//oli tõesti tühi
			$signupEmailError = "See väli on kohustuslik";
		} else {
			
			$signupEmail = $_POST["signupEmail"];
			
		}
		
		if (!isset ($_POST["tingimused"])) {
		
			$signupCheckboxError = "pead noustuma tingimustega";
		}	
	}
	if (isset ($_POST["signupageError"])) {
		// oli olemas, ehk keegi vajutas nuppu
		if (empty($_POST["signupage"])) {
			//oli tõesti tühi
			$signupageError = "See väli on kohustuslik";
		} else {
			
			$signupage = $_POST["signupage"];
		}
	}
		//tean yhtegi viga ei olnud
	if( empty($signupEmailError)&&
		empty($signupPasswordError)&&
		isset($_POST["signupPassword"])&&
		isset($_POST["signupEmail"])
		)
		{
		
		echo "salvestan...<br>";
		echo "email ".$signupEmail."<br>";
		
		$password = hash ("sha512", $_POST["signupPassword"]);
		
		echo "parool ".$_POST["signupPassword"]."<br>";
		echo "rasi ".$password."<br>";
		
		//echo $serverPassword
		
		$database = "if16_ALARI_VEREV";
		
		//yhendus olemas
		$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
		
		//kask
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email,password) VALUES (?, ?)");
		
		echo $mysqli->error;
		//asendan kysimargid vaartustega
		//iga muutuja kohta 1 taht
		//s tahistab stringi
		//i integer
		//d double/float
		$stmt->bind_param("ss", $signupEmail, $password);
		
		if($stmt->execute()){
			echo "salvestamine onnestus ";
		}else {
			echo"ERROR ".$stmt->error;
		}
	}
	
	//kas on üldse olemas
	if (isset ($_POST["signupPassword"])) {
		// oli olemas, ehk keegi vajutas nuppu
		if (empty($_POST["signupPassword"])) {
			//oli tõesti tühi
			$signupPasswordError = "See väli on kohustuslik";
			
		} else {
			//oli midagi, ei olnud tühi
			//kas pikkust vähemalt 8
			
			if (strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk";
				
			}
		}
	}
	
		
	if (isset ($_POST["gender"])) {
		if (empty($_POST["gender"])) {
			$genderError = "See väli on kohustuslik";
		} else {
			
			$gender = $_POST["gender"];
				
			
			
			
			
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimis leht</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		
		<form method="POST">
			
			
			<input placeholder="E-mail" name="loginEmail" type="email">
			
			<br><br>
			
			<input placeholder="Parool" name="loginPassword" type="password">
			
			
			<br><br>
			
			<input type="submit">
		
		</form>

		<h1>Loo kasutaja</h1>
		
		<form method="POST">
		
			<input placeholder="E-mail" name="signupEmail" type="email"  value = "<?=$signupEmail;?>"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input placeholder="Parool" name="signupPassword" type="password"> <?php echo $signupPasswordError; ?>
			
			<br><br>
			
			<input placeholder="vanus" name="signupage" type="number">  <?php echo $signupageError; ?>
			
			<br><br>
			
			<input placeholder="telefoni number" name="signupnumber" type="number"> 
			
			<br><br>
			
			<?php  ?>
			<input type="radio" name="gender" value="male" checked> Male<br>
			<input type="radio" name="gender" value="female"> Female<br>
			<input type="radio" name="gender" value="other"> Other

			<br><br>
			
			noustun tingimustega
			<input name="tingimused" type="checkbox"> <?php echo $signupCheckboxError; ?>
			
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
		
		</form>
	</body>
</html>
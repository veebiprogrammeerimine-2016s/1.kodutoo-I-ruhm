<?php
	// MVP idee - autotöökoda veebileht. Kaks kasutajat - klient ja töökoda administraator.
	// Esimene avaldab soove veebivormi kaudu, täidab informatsiooni endast (nimi, kontakt),sõidukist (mudel, mootor)
	// ning valib, milliseid teenuseid soovib (checkboxidega, näiteks). Programm siis arvutab, palju umbes aega selle jaoks vaja on
	// hiljem administraator pakub täpsemat aega kliendile ja, kui kõik soovib, määrab töökoda ja meistrit.
	// lisada võib ka  näiteks kliendikaarte/boonuspunkte, võimalust vaadata statistikat jne.

	
	//võtab ja kopeerib faili sisu
	require ("../../config.php");

    //var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupBdayError = "";
	$signupCarPrefError ="";
	$signupEmail = "";
	$signupBday = "1995-02-25";
	$signupGender = "male";
	$signupCarPref_items = [];

	// kas epost oli olemas
	if (isset ($_POST ["signupEmail"])){
		
		if (empty ($_POST ["signupEmail"])){
			
			//oli email, kuigi see oli tühi
			$signupEmailError = "See väli on kohustuslik!";
			
		} else {
			
			//email on õige, salvestan väärtuse muutujasse
			$signupEmail = $_POST["signupEmail"];
			
		}
		
	}


    if (isset ($_POST ["signupBday"])){

        if (empty ($_POST ["signupBday"])){

            // if bday wasnt set
            $signupBdayError = "See väli on kohustuslik!";

        }else{
			$signupBday = $_POST["signupBday"];
		}

    }
	
	
	
	if (isset ($_POST ["signupBday"])){

        if (empty ($_POST ["signupBday"])){

            // if bday wasnt set
            $signupBdayError = "See väli on kohustuslik!";

        }else{
			$signupBday = $_POST["signupBday"];
		}

    }



	if (isset ($_POST ["signupPassword"])){
		
		if (empty ($_POST ["signupPassword"])){
			
			//oli password, kuigi see oli tühi
			$signupPasswordError = "See väli on kohustuslik!";
			
		}else{
			// tean et oli parool ja see ei olnud tühi
			// vähemalt 8 sümbolit
			
			if (strlen($_POST["signupPassword"])< 8){
			$signupPasswordError = "Parool peab olema vähemalt	8 tähemärki pikk!";
			}
			
			
		}
		
	}


	if (isset ($_POST['signupGender'])){
			$signupGender = $_POST["signupGender"];
	}


	if (isset($_POST['signupCarPref_items'])){
		if (!in_array("eucars", $_POST['signupCarPref_items']) &&
			!in_array("uscars",$_POST['signupCarPref_items']) &&
			!in_array("japcars",$_POST['signupCarPref_items']) &&
			!in_array("ruscars",$_POST['signupCarPref_items']) &&
			!in_array("korcars",$_POST['signupCarPref_items'])){
			$signupCarPrefError = 'Vähemalt üks valik on kohustuslik!';
		} else {
			$signupCarPref_items = $_POST["signupCarPref_items"];
		}


	}



// tean et ühtegi viga ei olnud ja saan &&med salvestatud
	if (empty ($signupEmailError)&& empty($signupPasswordError) && empty($signupCarPrefError)
		&& empty($signupBdayError) &&  isset ($_POST['signupPassword'])
		&& isset ($_POST['signupEmail']) && isset ($_POST['signupBday'])
		&& isset ($_POST['signupGender']) && !empty ($_POST['signupCarPref_items'])){

		//echo "Salvestan...<br>";
			//echo "E-mail: ".$signupEmail."<br>";

			//echo "Password: ".$_POST["signupPassword"]."<br>";
			//echo "Hash: ".$password."<br>";
			//echo "Bday: ".$_POST['signupBday']."<br>";
			//echo "Gender: ".$_POST['signupGender']."<br>";
			//echo "Carprefs: ".$_POST['signupCarPref_items']."<br>";
			
			
			// &&mebaasiga ühendus
			
			$db = "if16_vladsuto_1";
			
			$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $db);
			
			//käsk 
			$stmt = $mysqli->prepare("INSERT INTO user_table (email, password, bday, gender, carpref) VALUES (?,?,?,?,?)");
			$signupCarPref_todatabase = implode ($_POST['signupCarPref_items'], " ");
			$password = hash("sha512", $_POST["signupPassword"]);

			
			//echo $mysqli->error;
			
			// asendad küsimärgid väärtustega
			//iga muutuja kohta 1 täht, mis tüüpi muutuja on
			//s - string
			//i - integer
			//d - double/float
			$stmt->bind_param("sssss", $signupEmail, $password, $signupBday, $signupGender, $signupCarPref_todatabase);
			
			if($stmt->execute()){
				echo "Salvestamine õnnestus!";
			}else{
				echo "ERROR!".$stmt->error;
			}
	}


?>



<html>
<style>
	* {font-family: "Calibri Light"; vertical-align:top; font-size:14px}
	h1 {font-size: 30px; font-weight: bolder}
	.redtext {color:#f00b0b; font-weight: bolder}
	.table1  {border-collapse:collapse;border-spacing:0;}
	.table1 td{padding:5px;border-style:none;overflow:hidden;word-break:normal}
</style>

<head>
	<title>Registreerimise lehekülg</title>
</head>

<body>

        <!------ Эта форма для домашнего задания не нужна

		<h1>Logi sisse:</h1>
		
		<form method ="post">

			<label>E-post:</label><br>
			<input name = "loginEmail" type ="email" placeholder = "E-post">
			<br><br>
			
			<label>Parool:</label><br>
			<input name = "loginPassword" type ="password" placeholder = "Parool">
			<br><br>
			
			<input type ="submit" value = "Logi sisse">
		
		</form>------->

		<h1>Loo kasutaja:</h1>
		
		<form method ="post">
            <table class="table1">
                <tr>
                    <td>E-post:<span class = 'redtext'>*</span></td>
                    <td><input name = "signupEmail" type ="email" value = "<?=$signupEmail;?>" placeholder = "E-post"></td>
                    <td class="redtext"><?=$signupEmailError;?></td>
                </tr>
                <tr>
                    <td>Parool:<span class = 'redtext'>*</span></td>
                    <td><input name = "signupPassword" type ="password" placeholder = "Parool"></td>
                    <td class="redtext"><?=$signupPasswordError;?></td>
                </tr>
                <tr>
                    <td>Sünnipäev:<span class = 'redtext'>*</span></td>
                    <td><input  name="signupBday" type ="date" min="1900-01-01" max = "<?=date('Y-m-d'); ?>" value = "<?=$signupBday;?>"></td>
                    <td class="redtext"><?=$signupBdayError;?></td>
                </tr>
                <tr>
                    <td>Sugu:<span class = 'redtext'>*</span></td>
                    <td>
						<?php if($signupGender == "male") { ?>
							<label><input type="radio" name="signupGender" value="male" checked> Mees</label><br>
						<?php } else { ?>
							<label><input type="radio" name="signupGender" value="male"> Mees</label><br>
						<?php } ?>
						
						<?php if($signupGender ==  "female") { ?>
							<label><input type="radio" name="signupGender" value="female" checked> Naine</label><br>
						<?php } else { ?>
							<label><input type="radio" name="signupGender" value="female"> Naine</label><br>
						<?php } ?>
						
						<?php if($signupGender ==  "unspecified") { ?>
							<label><input type="radio" name="signupGender" value="unspecified" checked> Ei soovi avaldada</label><br>
						<?php } else {?>
							<label><input type="radio" name="signupGender" value="unspecified"> Ei soovi avaldada</label><br>
						<?php } ?>
                    <td class="table1-errortext"></td>
                </tr>
                <tr>
                    <td>Autohuvid:<span class = 'redtext'>*</span></td>
                    <td>
                        <input type="hidden" name="signupCarPref_items[]"  value="">

						<?php if(isset($_POST['signupCarPref_items']) && is_array($_POST['signupCarPref_items'])&& in_array("eucars", $_POST['signupCarPref_items'])){?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="eucars" checked> Euroopa autod</label><br>
						<?php } else { ?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="eucars"> Euroopa autod</label><br>
						<?php } ?>

						<?php if(isset($_POST['signupCarPref_items']) && is_array($_POST['signupCarPref_items'])&& in_array("uscars", $_POST['signupCarPref_items'])){?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="uscars" checked> Ameerika autod</label><br>
						<?php } else { ?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="uscars"> Ameerika autod</label><br>
						<?php } ?>

						<?php if(isset($_POST['signupCarPref_items']) && is_array($_POST['signupCarPref_items'])&& in_array("japcars", $_POST['signupCarPref_items'])){?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="japcars" checked>Jaapani autod</label><br>
						<?php } else { ?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="japcars"> Jaapani autod</label><br>
						<?php } ?>

						<?php if(isset($_POST['signupCarPref_items']) && is_array($_POST['signupCarPref_items'])&& in_array("ruscars", $_POST['signupCarPref_items'])){?>
						<label><input type="checkbox" name="signupCarPref_items[]" value="ruscars" checked> Vene autod</label><brc>
						<?php } else { ?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="ruscars"> Vene autod</label><br>
						<?php } ?>

						<?php if(isset($_POST['signupCarPref_items']) && is_array($_POST['signupCarPref_items'])&& in_array("korcars", $_POST['signupCarPref_items'])){?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="korcars" checked> Korea autod</label><br>
						<?php } else { ?>
							<label><input type="checkbox" name="signupCarPref_items[]" value="korcars">  Korea autod</label><br>
						<?php } ?>
                    <td class="redtext"><?=$signupCarPrefError;?></td>
                </tr>
                <tr>
                    <td><input type ="submit" value = "Submit"></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
		</form>

</body>
</html>
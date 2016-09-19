<?php

	//var_dump($_GET);
	//echo "<br>";
    var_dump($_POST);
	
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupBdayError = "";
    $signupCarPrefError ="";

	// kas epost oli olemas
	if (isset ($_POST ["signupEmail"])){
		
		if (empty ($_POST ["signupEmail"])){
			
			//oli email, kuigi see oli tühi
			$signupEmailError = "See väli on kohustuslik!";
			
		}
		
	}


    if (isset ($_POST ["signupBday"])){

        if (empty ($_POST ["signupBday"])){

            // if bday wasnt set
            $signupBdayError = "See väli on kohustuslik!";

        }

    }


    if (isset ($_POST ["signupCarPref1"]) && isset($_POST["signupCarPref2"]) && isset($_POST["signupCarPref3"])&& isset($_POST["signupCarPref4"])&& isset($_POST["signupCarPref5"])) {

        if (empty ($_POST ["signupCarPref1"]) && empty($_POST["signupCarPref2"]) && empty($_POST["signupCarPref3"]) && empty($_POST["signupCarPref4"]) && empty($_POST["signupCarPref5"])){

            // if not a single carpref was selected
            $signupCarPrefError = "Vähemalt üks valik on kohustuslik!";

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

?>


<html>
<head>
		<title>Login page</title>

    <style>
        .redtext {

            color: red;
            font-weight: bold;

        }
    </style>
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

            <tr>
                <td><label>E-post:<span class = 'redtext'>*</span></label></td>
                <td><input name = "signupEmail" type ="email" placeholder = "E-post"> </td>
                <td><span class = 'redtext'><?php echo $signupEmailError;?></span></td>
            <br><br>
                
            </tr> 
			
			<label><h3>Parool:<span class = 'redtext'>*</span></h3></label>

			<input name = "signupPassword" type ="password" placeholder = "Parool"> <span class = 'redtext'><?php echo $signupPasswordError;?></span>
			<br><br>

			<label><h3>Sünnipäev:<span class = 'redtext'>*</span></h3></label>
			<input  name="signupBday" type ="date" min="1900-01-01" max = "<?php echo date('Y-m-d'); ?>" value = "1995-02-25"> <span class = 'redtext'><?php echo $signupBdayError;?></span>
            <br><br>

			<label><h3>Sugu:<span class = 'redtext'>*</span></h3></label> <!--- Ошибки быть не может, ибо по дефолту хоть какой-то radiobutton выбран---->
			<input type="radio" name="signupGender" value="male" checked> Mees <br>
			<input type="radio" name="signupGender" value="female"> Naine <br>
			<input type="radio" name="signupGender" value="unspecified"> Ei soovi avaldada
			<br><br>

            <label><h3>Millistes autodes oled huvitatud:<span class = 'redtext'>*</span></h3></label>

            <!---- Тут немного пришлось подумать, не сразу понял, что если галочки нет, то string вообще не возвращается, пришлось придавать ему значение, не знаю, правильно ли---->

            <input type="hidden" name="signupCarPref1"  value="">
            <input type="hidden" name="signupCarPref2"  value="">
            <input type="hidden" name="signupCarPref3"  value="">
            <input type="hidden" name="signupCarPref4"  value="">
            <input type="hidden" name="signupCarPref5"  value="">
            <input type="checkbox" name="signupCarPref1" value="eucars"> Euroopa autod<br>
            <input type="checkbox" name="signupCarPref2" value="uscars"> Ameerika autod<br>
            <input type="checkbox" name="signupCarPref3" value="japcars"> Jaapani autod <br>
            <input type="checkbox" name="signupCarPref4" value="ruscars"> Vene autod<br>
            <input type="checkbox" name="signupCarPref5" value="korcars"> Korea autod<br><span class = 'redtext'><?php echo $signupCarPrefError;?></span>
            <br><br>

			<input type ="submit" value = "Loo kasutaja">

		</form>

</body>
</html>
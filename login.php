<?php

    //var_dump ($_GET); //var_dump näitab kõike, mis on muutuja
    //echo "<br>";
    //var_dump ($_POST);

    // kontrollin, kas vajalikud andmed olid olemas:
$signUpEmailError = " ";
$signUpPasswordError = " ";
$signUpNameError = " ";
$signUpFamilyNameError = " ";
$signUpBirthdayError = " ";
$signUpCodeError = " ";
    if (isset ($_POST["signUpEmail"]) ) {

            if (empty ($_POST["signUpEmail"] ) ) {
            // oli e-mail, kuid see oli tühi
                $signUpEmailError =  "See väli on kohustuslik";

            }
            }

              if (isset ($_POST["signUpPassword"]) ) {

                  if (empty ($_POST["signUpPassword"] ) ) {

                $signUpPasswordError =  "See väli on kohustuslik";

                } else {

          //tean, et parool oli ja see ei olnud tühi. vähemalt 8!

                if (strlen($_POST["signUpPassword"]) < 8 ) {

                    $signUpPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk";
                    }
                    }
                    }

      if (isset ($_POST["signUpName"]) ) {

            if (empty ($_POST["signUpName"] ) ) {
          // oli nimi, kuid see oli tühi
            $signUpNameError =  "See väli on kohustuslik";

                }
              }

                if (isset ($_POST["signUpFamilyName"]) ) {

                    if (empty ($_POST["signUpFamilyName"] ) ) {
          // oli e-mail, kuid see oli tühi
                $signUpFamilyNameError =  "See väli on kohustuslik";

                    } else {

          //tean, et perekonnanimi oli ja see ei olnud tühi

                    if (strlen($_POST["signUpFamilyName"]) < 1 ) {

                    $signUpFamilyNameError = "Perekonnanimi peab olema vähemalt 1 tähemärk pikk!";
                  }
                }
              }

              if (isset ($_POST["signUpBirthday"]) ) {
                    
                            if (empty ($_POST["signUpBirthday"] ) ) {
                      // oli sünniaeg, kuid see oli tühi
                          $signUpBirthdayError =  "See väli on kohustuslik";

                      }
                      }

                      if (isset ($_POST["signUpCode"])) {

                              if (empty ($_POST["signUpCode"] ) ) {
                                  $signUpCodeError =  "Kontrolli kontrollkoodi";

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

      <form method = "POST">

        <input name ="loginEmail" type = "email" placeholder="e-posti aadress">

        <br> <br>

        <input  name = "loginPassword" type = "password" placeholder="parool">

        <br> <br>

        <input type = "submit" value = "LOGI SISSE">

      </input>
      </form>


  <h1>Loo kasutaja </h1>

      <form method = "POST">
        <input name ="signUpEmail" type = "email" placeholder="e-posti aadress"> <?php echo $signUpEmailError; ?>
        <br><br>

        <input  name = "signUpPassword" type = "password" placeholder="parool"> <?php echo $signUpPasswordError; ?>

        <br><br>

        <input name = "signUpName" type = "name" placeholder ="Sinu nimi"> <?php echo $signUpNameError; ?>

        <br><br>

        <input name = "signUpFamilyName" type = "familyname" placeholder = "Sinu perekonnanimi"> <?php echo $signUpFamilyNameError; ?>
        <br><br>

        <input name = "signUpBirthday" type = "birthday" placeholder= "Sinu sünniaeg pp/kk/aaaa"> <?php echo $signUpBirthdayError; ?>
        <br><br>

        <label>Sisesta kontrollkood</label> <br>
        <input name = "signUpCode" type = "controlcode" placeholder = "XgT64Hrf"> <?php echo $signUpCodeError; ?>
        <br><br>
        <input type = "submit" value = "REGISTREERU">

      </input>
      </form>
      <p> Wanna go clubbing? Can't find a proper place? Me aitame Sind! ClubOGo aitab valida soovitud distantsile jäävate klubide seast <br>
        külastajate
        hinnangutele tuginedes selle õige. Et ükski pilet poleks "waste of money". Liitu kohe!</p>
</html>

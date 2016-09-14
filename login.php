<?php

    //var_dump ($_GET); //var_dump näitab kõike, mis on muutuja
    //echo "<br>";
    //var_dump ($_POST);

    // kontrollin, kas e-post oli olemas:
$signUpEmailError = " ";
$signUpPasswordError = " ";
    if (isset ($_POST["signUpEmail"]) ) {

        if (empty ($_POST["signUpEmail"] ) ) {
          // oli e-mail, kuid see oli tühi
            $signUpEmailError =  "See väli on kohustuslik";

        }
    }

    if (isset ($_POST["signUpPassword"]) ) {

        if (empty ($_POST["signUpPassword"] ) ) {
          // oli e-mail, kuid see oli tühi
            $signUpPasswordError =  "See väli on kohustuslik";

        } else {

          //tean, et parool oli ja see ei olnud tühi. vähemalt 8!

            if (strlen($_POST["signUpPassword"]) < 8 ) {

                $signUpPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk";
            }
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
        <br>

        <input name ="loginEmail" type = "email" placeholder="e-posti aadress">

        <br> <br>

        <input  name = "loginPassword" type = "password" placeholder="parool">

        <br> <br>

        <input type = "submit" value = "Logi sisse">

      </input>
      </form>

  <h1>Loo kasutaja <h1>

      <form method = "POST">
        <br>

        <input name ="signUpEmail" type = "email" placeholder="e-posti aadress"> <?php echo $signUpEmailError; ?>

        <br> <br>

        <input  name = "signUpPassword" type = "password" placeholder="parool"> <?php echo $signUpPasswordError; ?>

        <br> <br>

        <input type = "submit" value = "Registreeru">

      </input>
      </form>



</html>

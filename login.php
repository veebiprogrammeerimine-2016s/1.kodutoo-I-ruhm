<?php

  $singupEmailError = "";
  $singupPasswordError = "";
  $singupPhoneError = "";
  $singupSuguError = "";

  // Kas epost oli olemas
  if ( isset($_POST["signupEmail"]) ) {

      if ( empty($_POST["signupEmail"]) ) {

        //oli email, kuid tühi
        $singupEmailError = "See väli on kohustuslik";

      }

  }
  // Kas parool oli olemas
  if ( isset($_POST["signupPassword"]) ) {

      if ( empty($_POST["signupPassword"]) ) {

        //oli email, kuid tühi
        $singupPasswordError = "See väli on kohustuslik";

      } else {

          //tean et parool ja ei olnud tühi

          if ( strlen($_POST["signupPassword"]) < 8 )

            $singupPasswordError = "Parool peab olema vähemalt 8 tähemärki";

      }

  }
  if ( isset($_POST["signupPhone"]) ) {

      if ( empty($_POST["signupPhone"]) ) {

        //Telefoni kontroll
        $singupPhoneError = "See väli on kohustuslik";

      }

  }

?>

<!DOCTYPE html>
<html>
  <head>
      <title>Sisselogmise lehekülg</title>
    </head>
<body>

  <h1>Logi sisse</h1>

  <form method="POST">

    <label>E-post</label><br>
    <input name="loginEmail" type="email" placeholder="Sisestage e-mail">
    <br>
    <label>Parool</label><br>
    <input name="loginPassword" type="tel" placeholder="Sisestage parool">
    <br><br>
    <input type="submit" value="Logis sisse">

  </form>

  <h1>Loo kasutaja</h1>
  <form method="POST">

    <label>E-post</label><br>
    <input name="signupEmail" type="email" placeholder="Sisestage e-mail"> <?php echo $singupEmailError; ?>
    <br>
    <label>Parool</label><br>
    <input name="signupPassword" type="password" placeholder="Sisestage parool"> <?php echo $singupPasswordError; ?>
    <br>
    <label>Telefon</label><br>
    <input name="signupPhone" type="number" placeholder="Sisestage telefon"> <?php echo $singupPhoneError; ?>
    <br>
    <label>Sugu</label><br>
    <input type="radio" name="signupSugu" value="mees" checked> Mees<br>
    <input type="radio" name="signupSugu" value="naine"> Naine<br>
    <input type="radio" name="signupSugu" value="Wut?"> Wut?
    <br><br>
    <input type="submit" value="Loo kasutaja">

  </form>
  <p>
    Ülikooli kursuse tarbeks tunniplaan, kus kirjas kodused tööd, tunnikontrollid ja eksamid.

  </p>


</body>
</html>

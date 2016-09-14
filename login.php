<?php

  //var_dump($_GET);
  //echo "<br>";
  //var_dump($_POST);

  $singupEmailError = "";
  $singupPasswordError = "";

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
    <input name="loginPassword" type="password" placeholder="Sisestage parool">
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
    <br><br>
    <input type="submit" value="Loo kasutaja">

  </form>


</body>
</html>

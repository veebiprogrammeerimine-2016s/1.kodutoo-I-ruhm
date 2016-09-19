<?php

//SIGNUP CHECKS
//e-mail blank after submit?
$signupEmailError = "";
$signupPasswordError = "";
$signupGenderError = "";
$signupPersonalCodeError = "";
$signupAgeError="";
$loginEmailError = "";
$loginPersonalCodeError = "";
$loginPasswordError = "";


if (isset($_POST["signupEmail"])) {
    if (empty($_POST["signupEmail"])) {
        //e-mail was empty
        $signupEmailError = "See väli on kohustuslik!";
    }
}

if (isset($_POST["signupPassword"])) {
    if (empty($_POST["signupPassword"])) {
        //password was empty
        $signupPasswordError = "See väli on kohustuslik!";
    } else {
        //password was not empty
        //minimum length 8
        if (strlen($_POST["signupPassword"]) < 8) {
            $signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk!";
        }
    }
}

if (isset($_POST["signupGender"])) {
    if ($_POST["signupGender"] == "") {
        //gender was empty
        $signupGenderError = "See väli on kohustuslik!";
    }
}

if (isset($_POST["signupPersonalCode"])) {
    if (empty($_POST["signupPersonalCode"])) {
        $signupPersonalCodeError = "See väli on kohustuslik!";
    } else {
        //Personal code was not empty
        //minimum length 11
        if (strlen($_POST["signupPersonalCode"]) < 11) {
            $signupPersonalCodeError = "Isikukood peab olema vähemalt 11 tähemärki pikk!";
        }
    }
}

if (isset($_POST["signupAge"])) {
    if (empty($_POST["signupAge"])) {
        $signupAgeError = "See väli on kohustuslik!";
    } else {
        //Age was not empty
        //Minimum age 13
        if ($_POST["signupAge"] < 13) {
            $signupAgeError = "Kasutaja loomiseks peate olema vähemalt 13 aastat vana!";
        }
    }
}

if (isset($_POST["loginEmail"])) {
    if (empty($_POST["loginEmail"])) {
        //e-mail was empty
        $loginEmailError = "Sisse logimiseks peate sisestama e-maili.";
    }
}

if (isset($_POST["loginPersonalCode"])) {
    if (empty($_POST["loginPersonalCode"])) {
        //personal code was empty
        $loginPersonalCodeError = "Sisse logimiseks peate sisestama isikukoodi.";
    }
}

if (isset($_POST["loginPassword"])) {
    if (empty($_POST["loginPassword"])) {
        //password was empty
        $loginPasswordError = "Sisse logimiseks peate sisestama parooli.";
    }
}
?>

<!doctype html>
<html>
<head>
    <title>Sisse logimine</title>
</head>

<body>
<h1>Logi sisse</h1>
<form method="post">
    <label>E-post
        <input name="loginEmail" type="email">
        <?php echo "<b style='color:red'>" . $loginEmailError . "</b>" ?>
    </label>
    <br><br>
    <label>Isikukood
        <input name="loginPersonalCode" type="text">
        <?php echo "<b style='color:red'>" . $loginPersonalCodeError . "</b>" ?>
    </label>
    <br><br>
    <label>Parool
        <input name="loginPassword" type="password">
        <?php echo "<b style='color:red'>" . $loginPasswordError . "</b>" ?>
    </label>
    <br><br>
    <input type="submit" value="Logi sisse">
</form>

<br><br>

<h1>Loo uus kasutaja</h1>
<form method="post">
    <label>E-post
        <input name="signupEmail" type="email">
        <?php echo "<b style='color:red'>" . $signupEmailError . "</b>" ?>
    </label>
    <br><br>
    <label>Isikukood
        <input name="signupPersonalCode" type="number">
        <?php echo "<b style='color:red'>" . $signupPersonalCodeError . "</b>" ?>
    </label>
    <br><br>
    <label>Parool
        <input name="signupPassword" type="password">
        <?php echo "<b style='color:red'>" . $signupPasswordError . "</b>" ?>
    </label>
    <br><br>
    <label>Sugu
        <select name="signupGender">
            <option value="">Vali...</option>
            <option value="male">Mees</option>
            <option value="female">Naine</option>
            <option value="unknown">Ei soovi avaldada</option>
        </select>
        <?php echo "<b style='color:red'>" . $signupGenderError . "</b>" ?>
    </label>
    <br><br>
    <label>Vanus
        <input name="signupAge" type="number">
        <?php echo "<b style='color:red'>" . $signupAgeError . "</b>" ?>
    </label>
    <br><br>
    <input type="submit" value="Loo uus kasutaja">
</form>
<br><br><br><br>
<b>Idee</b><br>
Foorumi moodi lehekülg kuhu saab igaüks teha postitusi. <br>
Kasutajaid ei ole, kuid iga postitaja saab enda postitusele panna nime<br>
Postitaja saab postitusele panna salasõna, mille abil pärast postitust muuta saab <br>
Kui salasõna ei ole, siis postitust muuta ei saa <br>
Kui nime ei ole, siis antakse vaikimisi nimi. <br>
Admin saab kõiki postitusi kustutada läbi eraldi lehe koos kasutajanime ja parooliga. Google log in? <br>
Kui aega üle jääb, panen külge reCAPTCHA?, teen salasõnad turvalisemaks <br>
Võibolla piltide / videote (youtube) / laulude (soundcloud) linkide muutmine otse saidilt kasutatavaks. <br>
Kasutada saan virtuaalserverit koos andmebaasi ja domeeniga.

</body>

</html>
<?php
/*
var_dump($_GET);
echo "<br>";
var_dump($_POST)
*/

//e-mail blank after submit?
$signupEmailError = "";
$signupPasswordError = "";
if (isset($_POST["signupEmail"])) {
    if (empty($_POST["signupEmail"])){
        //e-mail was empty
        $signupEmailError = "See väli on kohustuslik!";
        }
}

if (isset($_POST["signupPassword"])) {
    if (empty($_POST["signupPassword"])){
        //password was empty
        $signupPasswordError = "See väli on kohustuslik!";
    } else {
        //password was not empty
        //minimum length 8

        if (strlen($_POST["signupPassword"]) < 8 ){
            $signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk!";
        }
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
        </label>
        <br><br>
        <label>Parool
        <input name="loginPassword" type="password">
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
        <label>Parool
            <input name="signupPassword" type="password">
            <?php echo "<b style='color:red'>" . $signupPasswordError . "</b>" ?>
        </label>
        <br><br>
        <input type="submit" value="Loo uus kasutaja">
    </form>
</body>

</html>
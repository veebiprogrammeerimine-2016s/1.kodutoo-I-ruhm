<?php
//var_dump($_GET);
//echo "<br>";
//var_dump ($_POST);
$signupEmailError = "Sisesta e-mail";
$signupPasswordError = "Sisesta parooli";
$signupPasswordError2 = "Paroolid erinevad";
$signupPasswordError3 = "Vähemalt 8 tähemärki";
//session_start();

//$link = mysql_connect( "localhost", $_POST['username'], $_POST['password']) or die ("Connect Error: ".mysql_error());

//$user="username";
//$password="password"; $database="database";
//mysql_connect(“localhost”,$user,$password); @mysql_select_db($database) or die( "Unable
//to select database");



echo "<h1>Logi sisse</h1>";
echo '<form action="config.php" method="POST">';
echo '<input type="text"  name="name" placeholder="Name"><br><br>';
echo '<input type="text" name ="password" placeholder="Password"><br><br>';
echo '<input type="submit" name="submit" value="OK">';
echo "</form>";

echo "<h1>Loo kasutaja</h1>";
echo '<form action="config.php" method="POST">';
echo '<input type="text"  name="newname" placeholder="Name"><br><br>';
if( isset ($_POST["email"])){
	if(empty ($_POST["email"])){
	echo $signupEmailError."<br>";
	}
}
echo '<input type="text" name ="email" placeholder="E-mail"><br><br>';

if( isset ($_POST["newpassword"])){
	if(empty ($_POST["newpassword"]) && empty($_POST["newpassword2"])){
	echo $signupPasswordError."<br>";
		}
		if(!empty ($_POST["newpassword"]) && empty($_POST["newpassword2"])){
			if(strlen($_POST["newpassword"]) < 8){
			echo $signupPasswordError3."<br>";
		}
		}
		if(!$_POST["newpassword"]==$_POST["newpassword2"]){
		echo $signupPasswordError2."<br>";
		}
	
}
echo '<input type="text" name ="newpassword" placeholder="Password"><br><br>';
echo '<input type="text" name ="newpassword2" placeholder="Password"><br><br>';

echo '<input type="submit" name="submit2" value="OK">';
echo "</form>";

//https://github.com/veebiprogrammeerimine-2016s
?>
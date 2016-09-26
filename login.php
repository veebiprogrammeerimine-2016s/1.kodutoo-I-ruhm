<?php
	
	/*
	var_dump($_GET);
	echo "<br>";
	var_dump($_POST);
	*/
	
	require ("../../config.php");
	
	$signupEmailError = "";
	$loginEmailError = "";
	$signupPasswordError = "";
	$loginPasswordError = "";
	$signupLocationError = "";
	$mysqlregmsg = "";
	$mysqlregmsgerror = "";
	
	//Kas e-post oli olemas?
	if (isset ($_POST["signupEmail"]))
		{
			if (empty ($_POST["signupEmail"]))
				{
					//Oli email, kuid tühi.
					$signupEmailError = "See väli on kohustuslik.";
				}
				else
				{
					$signupEmail = $_POST["signupEmail"];
				}
		
		}
	if (isset ($_POST["signupLocation"]))
		{
			if (empty ($_POST["signupLocation"]))
				{
					$signupLocationError = "See väli on kohustuslik.";
				}
				else
				{
					$signupLocation = $_POST["signupLocation"];
				}
		}
	if (isset ($_POST["signupPassword"]))
		{
			if (empty ($_POST["signupPassword"]))
				{
					//Oli parool, kuid tühi.
					$signupPasswordError = "See väli on kohustuslik.";
				}
				else
				{
					//tean et oli parool ja see ei olnud tühi. Kontrollin pikkust
					if (strlen($_POST["signupPassword"]) < 8)
					{
						$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk.";
					}
				}
		}
			if( empty($signupEmailError)&& 
				empty($signupPasswordError)&& 
				empty($signupLocationError)&& 
				isset($_POST["signupPassword"])&&
				isset($_POST["signupEmail"])&&
				isset($_POST["signupLocation"]))
			{
				//echo "Teie andmed on salvestamisel<br>";
				//echo "Teie registreerumise email:  ". $signupEmail."<br>";
				//echo "Teie lisatud asukoht:  ". $signupLocation."<br>";
		
				$password = hash ("sha512", $_POST["signupPassword"]);
		
				//echo "Teie parool: ".$_POST["signupPassword"]."<br>";
				//echo "hashitud ".$password."<br>";
		
			//echo $serverPassword
		
				$database = "if16_alarip";
			//connectib mysqli
				$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
			//pushib info sqli
				$stmt = $mysqli->prepare("INSERT INTO user_sample (email,password,location) VALUES (?, ?, ?)");
				echo $mysqli->error;
			//s stringi
			//i integer
			//d double/float
				$stmt->bind_param("sss", $signupEmail, $password, $signupLocation);
		
	if($stmt->execute())
		{
			$mysqlregmsg = "Kasutaja loomine õnnestus!";
		}
		else 
		{
			$mysqlregmsgerror = "Kasutaja loomisel tekkis viga.";
			// mysqli error $stmt->error;
		}
	}
	if (isset ($_POST["loginEmail"]))
		{
			if (empty ($_POST["loginEmail"]))
				{
					//Oli email, kuid tühi.
					$loginEmailError = "Sisselogimise email oli tühi.";
				}
		}
	
	if (isset ($_POST["loginPassword"]))
		{
			if (empty ($_POST["loginPassword"]))
				{
					//Oli email, kuid tühi.
					$loginPasswordError = "Sisselogimise parool oli tühi.";
				}
				else 
				{
					if (strlen($_POST["loginPassword"]) < 8)
					{
					$loginPasswordError = "Sisselogimise parool peab olema vähemalt 8 tähemärki pikk.";
					}
				}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise lehekülg</title>
	</head>
	<style>
		font 
			{ 
				color: black;
				font-family: verdana;
				font-size: 200%;
				margin: 30px;
			}
		errorfont
			{
				color: red;
				font-family: verdana;
				position: absolute;
				margin: 0 0 0 10px;
			}
		casfont
			{ 
				color: black;
				font-family: verdana;
			}
		announce
			{ 
				color: red;
				font-family: verdana;
			}
		box
			{ 
				color: solid black;
				font-family: verdana;
				border: 1px;
			}
	</style>	
		<center>
			<body>
				<h1><font>Vaatamisväärsused</font></h1>
				<casfont>Minu ideeks on teha instagrami laadne asi, kuhu saab postitada vaatamisväärsusi, mis ei hõlma ainult turistilõkse. S.h ka head ning odavad söögikohad jne.</casfont>
				<hr>	
				<form method = "POST">
				
				<legend>Loo kasutaja</legend>
				<br>
				<!--<label>E-post</break><br>-->
				<input name = "signupEmail" type = "email" placeholder = "E-mail"><errorfont><?php echo " " .$signupEmailError?></errorfont>
				<br><br>
				<input name = "signupPassword" type = "password" placeholder = "Parool"><errorfont><?php echo " ". $signupPasswordError?></errorfont>
				<br><br>
				<input name = "signupLocation" type = "text" placeholder = "Asukoht"><errorfont><?php echo " ". $signupLocationError?></errorfont>
				<br><br>
				<input type = "submit" value = "Registreeru">
				<br><br>
	<announce>			
		<?php			
			echo $mysqlregmsg;
			echo $mysqlregmsgerror;
		?>
	</announce>
				
				
				</form>
				<hr>
				<form method = "POST">
				
				<legend>Sisselogimine</legend>
				<br>
				<input name = "loginEmail" type = "email" placeholder = "E-mail"><errorfont><?php echo $loginEmailError?></errorfont>
				<br><br>
				<input name = "loginPassword" type = "password" placeholder = "Parool"><errorfont><?php echo $loginPasswordError?></errorfont>
				<br><br>
				<input type = "submit" value = "Logi sisse">
				<br><br>
				
				</form>
				<hr>
					<a
						href = "http://www.neti.ee">  Parim otsingumootor 2k16  
						<style>
								a:link {color:White; background-color:black; text-decoration:none; font: verdana}
								a:visited {color: white; background-color:black; text-decoration:none; font: verdana}
						</style>
					</a>
			</body>
		</center>	
</html>
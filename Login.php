<?php

	//var_dump($_GET);
	//echo '<br>';
	//var_dump($_POST);
	
	$signup_email_error = "";
	$signup_password_error = "";
	
	//kontroll, kas epost oli olemas
	if ( isset ($_POST['signup_email'] ) ) {		
		
		if ( empty ( $_POST['signup_email']) ) {
			
			//oli email kuid tühi.
			$signup_email_error = "Väli E-post on kohustislik.";
		
		}
		
	}
	

	
	//kontroll, kas parool oli olemas
	if ( isset ($_POST['signup_password'] ) ) {		
		
		if ( empty ( $_POST['signup_password']) ) {
			
			//oli email kuid tühi
			$signup_password_error = "Väli Parool on kohustislik.";
		
		} else {
			
			if ( strlen( $_POST[$signup_password] ) < 8 ) {
				
				$signup_password_error = 'Liiga lühike password';
				
			}
			
		}
		
	}
	
	//Parooli pikkuse kontroll.
	

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sisse logimine</title>
	</head>
	<body>

<!-- atribuudid asuvad algus tagi sees -->
	
		<h1>Logi sisse</h1>
		

		
		<form method = "POST">
		
<!-- välja üleval tekstina			<label> E-post </label> <br> -->
			<input name = "login_email" type = "email" placeholder = "E-post">
			<br>
			<br>
			<input name = "login_password" type = "password" placeholder = "Parool">
			<br>
			<br>
			<input type = "submit" value = "Logi sisse">
			
<!-- info saatmine kahel viisil>
1. urliga GET=url?m=v&m2=v2
2. varjatud POST
turvalisuse m]ttes pole vahet, aga ebameeldiv, kui urli pealt PWd lugeda saab
-->
			
		</form>
		
		
		<h1> Loo kasutaja</h1>
		
		<form method = "POST">
		

			<input name = "signup_email" type = "email" placeholder = "E-post"> <?php echo $signup_email_error ?>
			<br>
			<br>
			<input name = "signup_password" type = "password" placeholder = "Parool"> <?php echo $signup_password_error ?>
			<br>
			<br>
			<input type = "submit" value = "Logi sisse">
			
			
		</form>
		
	</body>
</html>
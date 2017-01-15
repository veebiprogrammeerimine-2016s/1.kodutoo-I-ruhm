<?php 
	require("functions.php");
	
	// kas on sisseloginud, kui ei ole siis
	// suunata login lehele
	if (!isset ($_SESSION["userId"])) {
		
		header("Location: login.php");
		
	}
	
	//kas logout on aadressireal?
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		
	}
	
	
	if ( isset($_POST["sunnipaev"]) &&
		 isset($_POST["telefon"]) &&
		 !empty($_POST["sunnipaev"]) &&
		 !empty($_POST["telefon"])
	  ) {
		bdayandtel($_POST["sunnipaev"], $_POST["telefon"]);
	}
	
	
?>
<h1>Data</h1>
<p>
	Tere tulemast <?=$_SESSION["userEmail"];?>! 
	<a href="?logout=1">Logi välja</a>
</p> 

<h1>Registreerimise lopetamine</h1>
<form method="POST">
  Sunnipaev:
  <input type="date" name="sunnipaev">
  <br></br>
  Telefoni number:
  <input type='tel' name="telefon" placeholder="Naide 56883412" pattern='\d{4}\d{4}' title='Telefoni numbri naide 9999-9999)'> 
  <br></br>
  <input type="submit" value="Salvesta">
</form>
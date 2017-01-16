<?php
	
	//functions.php
	require("../../config.php");
	//alustan sessiooni, et saaks kasutada
	//$_SESSSION muutujaid
	session_start();
	
	//********************
	//****** SIGNUP ******
	//********************
	//$name = "romil";
	//var_dump($GLOBALS);
	
	$database = "if16_mikuz_1";
	
	function signup ($email, $password, $gender, $name) {
		
		$mysqli = new mysqli($GLOBALS["serverHost"],$GLOBALS["serverUsername"],$GLOBALS["serverPassword"],$GLOBALS["database"]);

		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password, gender, name) VALUES (?, ?, ?, ?)");
		echo $mysqli->error;

		$stmt->bind_param("ssss", $email, $password, $gender, $name);
		
		if ($stmt->execute()) {
			echo "salvestamine �nnestus";
		} else {
			echo "ERROR ".$stmt->error;
		}
		
	}
	
	
	function login ($email, $password) {
		
		$error = "";
		
		$mysqli = new mysqli($GLOBALS["serverHost"],$GLOBALS["serverUsername"],$GLOBALS["serverPassword"],$GLOBALS["database"]);

		$stmt = $mysqli->prepare("
			SELECT id, email, password, created 
			FROM user_sample
			WHERE email = ?
		");
		echo $mysqli->error;
		
		//asendan k�sim�rgi
		$stmt->bind_param("s", $email);
		
		//m��ran tulpadele muutujad
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $created);
		$stmt->execute();
		
		//k�sin rea andmeid
		if($stmt->fetch()) {
			//oli rida
			// v�rdlen paroole
			$hash = hash("sha512", $password);
			if($hash == $passwordFromDb) {
				echo "kasutaja ".$id." logis sisse";
				$_SESSION["userId"] = $id;
				$_SESSION["email"] = $emailFromDb;
				//suunaks uuele lehele
				header("Location: data.php");
			} else {
				$error = "parool vale";
			}
		} else {
			//ei olnud 
			
			$error = "sellise emailiga ".$email." kasutajat ei olnud";
		}
		return $error;	
	}
	
	
	function bdayandtel ($sunnipaev, $telefon) {
		
		$mysqli = new mysqli($GLOBALS["serverHost"],$GLOBALS["serverUsername"],$GLOBALS["serverPassword"],$GLOBALS["database"]);

		$stmt = $mysqli->prepare("INSERT INTO bdayandtel (sunnipaev, telefon) VALUES (?, ?)");
		echo $mysqli->error;

		$stmt->bind_param("ss", $sunnipaev, $telefon);
		
		if ($stmt->execute()) {
			echo "Salvestamine Onnestus";
		} else {
			echo "ERROR ".$stmt->error;
		}
		
	}
?>
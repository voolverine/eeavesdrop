<?php
	include("db.php");
	
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	} 
	if (isset($_POST['surname'])) {
		$surname = $_POST['surname'];
	}
	if (isset($_POST['mail'])) {
		$mail = $_POST['mail'];
	}
	if (isset($_POST['password'])) {
		$password = $_POST['passwoed'];
	}
	
	$name = stripslashes($name);
	$name = htmlspecialchars($name);
	$name = trim($name);
	$surname = stripslashes($surname);
	$surname = htmlspecialchars($surname);
	$surname = trim($surname);
	$mail = stripslashes($mail);
	$mail = htmlspecialchars($mail);
	$mail = trim($mail);
	$password = stripslashes($password);
	$password = htmlspecialchars($password);
	$password = trim($password);
	
	$result = mysql_query("INSERT INTO users (name, surname, mail, password) VALUES('$name', '$surname', '$mail', 'password')");
	//echo "sdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff";
	
	if ($result) {
		echo "You have succesfully registered";
	} else {
		echo "Try again please";
	}
?>


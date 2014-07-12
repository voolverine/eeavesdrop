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
	if (isset($_POST['pw'])) {
		$pw = $_POST['pw'];
	}
	
	if (empty($name) || empty($surname) || empty($mail) || empty($pw)) {
		echo "lalka";
		exit;
	}
	
	$name = stripcslashes($name);
	$name = htmlspecialchars($name);
	$name = trim($name);
	$surname = stripcslashes($surname);
	$surname = htmlspecialchars($surname);
	$surname = trim($surname);
	$mail = stripcslashes($mail);
	$mail = htmlspecialchars($mail);
	$mail = trim($mail);
	$pw = stripcslashes($pw);
	$pw = htmlspecialchars($pw);
	$pw = trim($pw);
	
	echo "lalka";
	exit;
?>


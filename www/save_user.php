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
?>


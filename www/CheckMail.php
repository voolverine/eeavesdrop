<?php
	include("db.php");
	$mail = $_POST['mail'];
	$mail = strtolower($mail);
	
	$result = mysql_query("SELECT id FROM users WHERE mail = '$mail'", $db);
	$ans = mysql_fetch_array($result);
	
	if (!empty($ans['id'])) {
		echo 0; 
	} else {
		echo 1;
	}
?>
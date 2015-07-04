<?php
	include("db.php");
	if (isset($_POST['mail']) && isset($_POST['password'])) {
		$mail = $_POST['mail'];
		$mail = strtolower($mail);
		$password = $_POST['password'];
		$result = mysql_query("SELECT id FROM users WHERE mail = '$mail'", $db);
		$ans = mysql_fetch_array($result);
		if ($ans['password'] == $password) {
			echo "yes";
		} else {
			echo "no";
		}
	} else {
		echo "Write your real e-mail";
	}
?>
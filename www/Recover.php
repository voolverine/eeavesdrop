<?php
	include("db.php");
	function gconfirm(){
		$length = 50;
		$chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
		$numChars = strlen($chars);
		$string = '';
		for ($i = 0; $i < $length; $i++) {
			$string .= substr($chars, rand(1, $numChars) - 1, 1);
		}
		return $string;
	}
	if (!empty($_POST['mail'])) {
		$mail = $_POST['mail'];
		$confirm = gconfirm();
		$url = "http://eeavesdrop.herobo.com/confirm.php?confirm=" . $confirm;
		$From = "From: eeavesdrop.herobo.com <eeavesdrop@gmail.com>\r\nContent-type: text/plain; charset=windows-1251 \r\n";
		$Head = "Password recovery";
		$Text = "To continue go " . $url;
		$result = mysql_query("UPDATE users SET user = 0 WHERE mail = '$mail'");
		$result = mysql_query("UPDATE users SET confirm = '$confirm' WHERE mail = '$mail'");
		mail($mail, $Head, $Text, $From);
		echo "We sent you a letter";
		
	} else {
		echo "Please, fill all labels";
	}
?>
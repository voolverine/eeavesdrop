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
		$password = $_POST['password'];
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
	$mail = strtolower($mail);
	$password = stripslashes($password);
	$password = htmlspecialchars($password);
	$password = trim($password);
	
	$result = true;
	$namer = true;
	$snamer = true;
	$mailr = true;
	$dot = false;
	$dog = false;
	for ($i = 0; $i < strlen($name); $i++) {	
		if ((substr($name, $i, 1) >= 'A' && substr($name, $i, 1) <= 'Z') || (substr($name, $i, 1) >= 'a' && substr($name, $i, 1) <= 'z')
			|| (substr($name, $i, 1) >= 'А' && substr($name, $i, 1) <= 'Я') || (substr($name, $i, 1) >= 'а' && substr($name, $i, 1) <= 'я')) {
			 continue;
			} else {
				$namer = false;
			}
	}	
	for ($i = 0; $i < strlen($surname); $i++) {
		if ((substr($surname, $i, 1) >= 'A' && substr($surname, $i, 1) <= 'Z') || (substr($surname, $i, 1) >= 'a' && substr($surname, $i, 1) <= 'z')
			|| (substr($surname, $i, 1) >= 'А' && substr($surname, $i, 1) <= 'Я') || (substr($surname, $i, 1) >= 'а' && substr($surname, $i, 1) <= 'я')) {
			 continue;
			} else {
				$snamer = false;
			}
	}
	for ($i = 0; $i < strlen($mail); $i++) {
		if ((substr($mail, $i, 1) >= 'A' && substr($mail, $i, 1) <= 'Z') || (substr($mail, $i, 1) >= 'a' && substr($mail, $i, 1) <= 'z')
			|| (substr($mail, $i, 1) >= 'А' && substr($mail, $i, 1) <= 'Я') || (substr($mail, $i, 1) >= 'а' && substr($mail, $i, 1) <= 'я')
				|| substr($mail, $i, 1) == "#'" || substr($mail, $i, 1) == "$" || substr($mail, $i, 1) == "%" || substr($mail, $i, 1) == "*" || substr($mail, $i, 1) == "'" 
					|| (substr($mail, $i, 1) >= "0" && substr($mail, $i, 1) <= "9") || substr($mail, $i, 1) == "&" || substr($mail, $i, 1) == "-" || substr($mail, $i, 1) == "+"
						|| substr($mail, $i, 1) == "/" || substr($mail, $i, 1) == "?" || substr($mail, $i, 1) == "}" || substr($mail, $i, 1) == "{" || substr($mail, $i, 1) == "~" || substr($mail, $i, 1) == "^") {
			 continue;
		} else {
			if (substr($mail, $i, 1) == "@")
				$dog = true;
			else if (substr($mail, $i, 1) == ".")
					$dot = true;
				else $mailr = false;
		}	
	}	
	
	if ($namer != true || $snamer != true || $mailr != true || $dot != true || $dog != true) {
		echo "Sorry, try again please!";
		exit;
	}
	
	if ($result) {
		$confirm = gconfirm();
		$url = "http://eeavesdrop.herobo.com/confirm.php?confirm=" . $confirm;		
		$Text = "Thank you for registration! Here you can confirm your registration " . $url;
		$result = mysql_query("INSERT INTO users (name, surname, mail, password, confirm, user) VALUES('$name', '$surname', '$mail', '$password', '$confirm', '0')");
		$From = "From: eeavesdrop.herobo.com <eeavesdrop@gmail.com>\r\nContent-type: text/plain; charset=windows-1251 \r\n";
		$Head = "Welcome!";
		$res = mail($mail, $Head, $Text, $From);
		echo "We sent you an e-mail";
	} else {
		echo "Try again please";
	}
?>


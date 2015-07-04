<html>
	<head>
		<link type = "text/css" rel = "stylesheet" href = "stylesheet.css" />
		<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
		<script type = "text/javascript" src = "js/jquery-2.0.2.min.js"></script>	
		<script>
			function getXmlHttp(){
			try {
				return new ActiveXObject("Msxml2.XMLHTTP");
			} catch ( e ) {
				try {
					return new ActiveXObject("Microsoft.XMLHTTP");
				} catch (ee) {}
			}
			if (typeof XMLHttpRequest!='undefined') {
			  return new XMLHttpRequest();
			}
		}
			function send() {
				var xmlhttp = getXmlHttp();
				var mail = document.getElementById('cmail').value;
				var password = document.getElementById('password').value;
				var params = '&mail=' + mail + '&password=' + password;
				xmlhttp.open("POST", "send_letter.php", true);
				xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4) {
						var ans = xmlhttp.responseText;
						confirm(ans);
					}
				}
				xmlhttp.send(params);
			}
		</script>
	</head>
	
	<body id = "confirm_error">
		<?php
			include("db.php");
			if (isset($_GET['confirm'])) {
				$userconfirm = $_GET['confirm'];
				$result = mysql_query("SELECT id FROM users WHERE confirm = '$userconfirm'", $db);
				$ans = mysql_fetch_array($result);
				if (!empty($ans['id'])) {
					$id = $ans['id'];
					$result = mysql_query("UPDATE users SET user = 1 WHERE id = '$id'");
					header('Location: http://eeavesdrop.herobo.com/settings.php');
				} else {
					echo "<h1>Visit your mail, to confirm account!<h1>";
					echo "<h3>We can send you on more letter<h3>";
				}
			} else {
				echo "<h1>Visit your mail, to confirm account!<h1>";
				echo "<h3>We can send you on more letter<h3>";
			}
		?>
		<table align = "center">
			<tr>
				<td>
					<input id = "cmail" type = "text" size = "40" maxlength = "40" placeholder = "Your mail" />
				<td>
			</tr>
			<tr>
				<td>
					<input name = "password" id = "password" type = "password" size = "40" maxlength = "40" placeholder = "password"/>
				<td>
			</tr>
			<td align = "center">
				<input class = "button" name = "save" type = "button" onclick = "javascript: send()" value = "Go"/>
			</td>
		</table>
	</body>
</html>
<!DOCTYPE html>

<html>
	<head>
		<link type = "text/css" rel = "stylesheet" href = "stylesheet.css" />
		<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
		<script type = "text/javascript" src = "js/jquery-2.0.2.min.js"></script>
		<script type = "text/javascript">
			$(document).ready(function(){
				PopUpHide();
			}); 
			function PopUpShow(){
				$("#popup1").show();
			}
			function PopUpHide(){
				$("#popup1").hide();
			}
			function call(url) {
				var xmlhttp = getXmlHttp();
				var name = document.getElementByld('name_input').value;
				var surname = document.getElementByld('surname_input').value;
				var mail = document.getElementByld('mail_input').value;
				var password = document.getElementByld('password_input');
				var params = 'name=' + name + '&surname=' + surname + '&mail=' + mail + '&password=' + password;
				xmlhttp.open("POST", "check.php", true);
				xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4) {
						var ans = responseText;
						confirm(ans);
					}
				}
				xmlhttp.send(params);
			}
		</script>		
		<title>
		
		</title>
	</head>
	
	<body>

		<div id = "header">
		
		</div>
	
		<div id = "main">
			<div align = "center">
				<form action = "enter.php" method = "post">
					<input name = "mail" type = "text" size = "16" maxlength = "16" placeholder = "Your mail"/> </br>
					<input name = "pw" type = "text" size = "16" maxlength = "16" placeholder = "Your password"/> </br>
					<table>
						<td><input name = "submit" type = "submit" value = "Enter" id = "EnRe"/></td>
						<td><a href = "javascript: PopUpShow()" ><input type = "button" value = "Register" id = "EnRe" /></a></td>
					</table>
				</form>
				<div class="b-popup" id = "popup1">
					<div class="b-popup-content" align = "center">
						<input name = "name" type = "text" size = "16" maxlength = "16" placeholder = "Your name" /> </br>
						<input name = "surname" type = "text" size = "16" maxlength = "16" placeholder = "Your surname" /> </br>
						<input name = "mail" type = "text" size = "16" maxlength = "16" placeholder = "Your mail" /> </br>
						<input name = "password" type = "text" size = "16" maxlength = "16" placeholder = "Your password" /> </br>
						<input name = "submit" type = "button" value = "Register" onclick = "javascript: call(save_user.php)"/>
						<a href="javascript: PopUpHide()">Close</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
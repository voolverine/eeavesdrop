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
				xmlHttp.open("POST", url, true);
				xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xmlHttp.onreadystatechange = funciton() {
					if (xmlHttp.readyState == 4) {
						var ans = xmlHttp.responseText;
						switch (ans) {
							case "wp":
								
								break;
							case "rp":
								
								break;
							case "wm":
							
								break;
							case "rm":
								
								break;
						}
					}
				}
			}
		</script>		
		<title>
		
		</title>
	</head>
	
	<body>

		<div id = "header">
		
		</div>
	
		<div id = "main">
			<div align = "center	">
				<form action = "enter.php" method = "post">
					<input name = "mail" type = "text" size = "16" maxlength = "16" placeholder = "Your mail"/> </br>
					<input name = "pw" type = "text" size = "16" maxlength = "16" placeholder = "Your password"/> </br>
					<table align = "center">
						<td><input name = "submit" type = "submit" value = "Enter" id = "EnRe"/></td>
						<td><a href = "javascript: PopUpShow()" ><input type = "button" value = "Register" id = "EnRe" /></a></td>
					</table>
				</form>
				<div class="b-popup" id = "popup1">
					<div class="b-popup-content" align = "center">
						<form action = "save_user.php" method = "post" align = "center">
							<input name = "name" type = "text" size = "20" maxlength = "20" placeholder = "Your name" />
							<div id = "cname">
							
							</div>
							</br>
							<input name = "surname" type = "text" size = "20" maxlength = "20" placeholder = "Your surname" />
							<div id = "csname">
							
							</div>
							</br>
							<input name = "mail" type = "text" size = "20" maxlength = "20" placeholder = "Your mail" /> 
							<div id = "cmail">
							
							</div>
							</br>
							<input name = "pw" type = "text" size = "20" maxlength = "20" placeholder = "Your password" /> 
							<div id = "cpw">
							
							</div>
							</br>
							<input name = "cpw" type = "text" size = "20" maxlength = "20" placeholder = "Confirm your password" /> 
							<div id = "ccpw"
							
							</div>
							</br>
							<input name = "submit" type = "submit" value = "Register" /> </br>
						</form>
						<a href="javascript: PopUpHide()">Close</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
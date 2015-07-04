<!DOCTYPE html>

<html>
	<head>
		<link type = "text/css" rel = "stylesheet" href = "stylesheet.css" />
		<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
		<script type = "text/javascript" src = "js/jquery-2.0.2.min.js"></script>
		<script type = "text/javascript">
			$(document).ready(function(){
				PopUpHide();
				PopUpFHide();
				document.getElementById('nn').style.opacity = "0";
				document.getElementById('snn').style.opacity = "0";
				document.getElementById('mn').style.opacity = "0";
				document.getElementById('pn').style.opacity = "0";
				document.getElementById('rmn').style.opacity = "0";
			}); 
			function PopUpFShow() {
				$("#popupF").show();
			}
			function PopUpShow(){
				$("#popup1").show();
			}
			function PopUpFHide() {
				$("#popupF").hide();
			}
			function PopUpHide(){
				$("#popup1").hide();
			}
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
			function call(url) {
				var xmlhttp = getXmlHttp();
				var name = document.getElementsByName('name').item(0).value;
				var surname = document.getElementsByName('surname').item(0).value;
				var mail = document.getElementById('mail').value;
				var password = document.getElementsByName('password').item(0).value;
				var params = 'name=' + name + '&surname=' + surname + '&mail=' + mail + '&password=' + password;
				xmlhttp.open("POST", url, true);
				xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4) {
						var ans = xmlhttp.responseText;
						confirm(ans);
					}
				}
				xmlhttp.send(params);
			}
			function CheckN() {
				var str = document.getElementsByName('name').item(0).value;
				var result = true;
				str = str.replace(/\s/g, "");
				document.getElementsByName('name').item(0).value = str;
				if (str.length == 0) {
					result = false;
				}
				for (var i = 0; i < str.length; i++) {
					var result2 = false;
					if (str.charAt(i) >= 'a' && str.charAt(i) <= 'z')
						result2 = true;
					if (str.charAt(i) >= 'A' && str.charAt(i) <= 'Z')
						result2 = true;
					if (str.charAt(i) >= 'а' && str.charAt(i) <= 'я')
						result2 = true;
					if (str.charAt(i) >= 'А' && str.charAt(i) <= 'Я') 
						result2 = true;
					if (result2 == false)
						result = false;
				}
				if (result == false) {
					document.getElementById('CName').src = "/images/wrong.png";
					document.getElementById('nn').style.opacity = "0.7";
					ButtonLock();
				} else {
					document.getElementById('CName').src = "/images/success.png";
					document.getElementById('nn').style.opacity = "0";
					ButtonLock();
				}
			}
			function CheckSN() {
				var str = document.getElementsByName('surname').item(0).value;
				var result = true;
				str = str.replace(/\s/g, "");
				document.getElementsByName('surname').item(0).value = str;
				if (str.length == 0) {
					result = false;
				}
				for (var i = 0; i < str.length; i++) {
					var result2 = false;
					if (str.charAt(i) >= 'a' && str.charAt(i) <= 'z')
						result2 = true;
					if (str.charAt(i) >= 'A' && str.charAt(i) <= 'Z')
						result2 = true;
					if (str.charAt(i) >= 'а' && str.charAt(i) <= 'я')
						result2 = true;
					if (str.charAt(i) >= 'А' && str.charAt(i) <= 'Я') 
						result2 = true;
					if (result2 == false)
						result = false;
				}
				if (result == false) {
					document.getElementById('CSName').src = "/images/wrong.png";
					document.getElementById('snn').style.opacity = "0.7";
					ButtonLock();
				} else {
					document.getElementById('CSName').src = "/images/success.png";
					document.getElementById('snn').style.opacity = "0";
					ButtonLock();
				}
			}
			function CheckM() {
				var str = document.getElementById("mail").value;
				var result = true;
				str = str.replace(/\s/g, "");
				document.getElementById("mail").value = str;
				if (str.length == 0) {
					result = false;
				}
				var ress = false;
				var resd = false;
				var pos = 0;
				for (var i = 0; i < str.length; i++) {
					if (str.charAt(i) == "@") {
						ress = true;
						pos = i;
					}
					if (str.charAt(i) == ".")
						resd = true;							
				}
				if (ress == false || resd == false)
					result = false;
				for (var i = 0; i < str.length; i++) {
					var res2 = false;
					if ((str.charAt(i) >= 'A' && str.charAt(i) <= 'Z') || (str.charAt(i) >= 'a' && str.charAt(i) <= 'z')
						|| str.charAt(i) == '@' || str.charAt(i) == '.' || (str.charAt(i) >= '0' && str.charAt(i) <= '9') || str.charAt(i) == '!'
							|| str.charAt(i) == '#' || str.charAt(i) == '$' || str.charAt(i) == '%' || str.charAt(i) == '&' || str.charAt(i) == "'" || str.charAt(i) == '*'
								|| str.charAt(i) == '+' || str.charAt(i) == '-' || str.charAt(i) == '/' || str.charAt(i) == '=' || str.charAt(i) == '?' || str.charAt(i) == '^' || str.charAt(i) == '{'
									|| str.charAt(i) == '}' || str.charAt(i) == '|' || str.charAt(i) == '~')
						res2 = true;
					if (res2 == false)
						result = false;
				}	
				if (str.length == pos + 1)
					result = false;
				var das = 0;
				var ndas = 0;
				for (var i = pos; i < str.length; i++) {
					var result3 = false;
					if ((str.charAt(i) >= 'A' && str.charAt(i) <= 'Z') || (str.charAt(i) >= 'a' && str.charAt(i) <= 'z')
						|| str.charAt(i) == '@' || str.charAt(i) == '.' )
						result3 = true;
					if (str.charAt(i) == '.') {
						das = i;
						ndas++;
					}
					if (result3 == false) {
						result = false;
					}
				}
				if (das + 1 == str.length || das == 0 || ndas > 1)
					result = false;
				var ans;
				if (result == true) {
					var xmlhttp = getXmlHttp();
					var mail = document.getElementById('mail').value;
					var params = 'mail=' + mail;
					xmlhttp.open("POST", "CheckMail.php", true);
					xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4) {
							ans = xmlhttp.responseText;
							for (var i = 0; i < ans.length; i++) {
                                if (ans.charAt(i) == "0") result = false;
                            }
							if (result == false) {
								document.getElementById('CMail').src = "/images/wrong.png";
								document.getElementById('mn').style.opacity = "0.7";
								ButtonLock();
							} else {
								document.getElementById('CMail').src = "/images/success.png";
								document.getElementById('mn').style.opacity = "0";
								ButtonLock();
							}
						}
					}
					xmlhttp.send(params);	
				} else {
					if (result == false) {
						document.getElementById('CMail').src = "/images/wrong.png";
						document.getElementById('mn').style.opacity = "0.7";
						ButtonLock();
					} else {
						document.getElementById('CMail').src = "/images/success.png";
						document.getElementById('mn').style.opacity = "0";
						ButtonLock();
					}
				}
			}
			function CheckPW() {
				var str = document.getElementsByName('password').item(0).value;
				var result = true;
				str = str.replace(/\s/g, "");
				document.getElementsByName('password').item(0).value = str;
				if (str.length == 0) {
					result = false;
				}
				for (var i = 0; i < str.length; i++) {
					var temp = false;
					if ((str.charAt(i) >= 'A' && str.charAt(i) <= 'Z') || (str.charAt(i) >= 'a' && str.charAt(i) <= 'z') 
						|| (str.charAt(i) >= '0' && str.charAt(i) <= '9'))
						temp = true;
					if (temp == false) {
						result = false;
					}
				}
				var bigchar = false;
				var smallchar = false;
				var num = false;
				for (var i = 0; i < str.length; i++) {
					if (str.charAt(i) >= 'A' && str.charAt(i) <= 'Z')
						bigchar = true;
					if (str.charAt(i) >= 'a' && str.charAt(i) <= 'z')
						smallchar = true;
					if (str.charAt(i) >= '0' && str.charAt(i) <= '9')
						num = true;
				}
				if (bigchar == false || smallchar == false || num == false || str.length < 6)
					result = false;
				if (result == false) {
					document.getElementById('CPW').src = "/images/wrong.png";
					document.getElementById('pn').style.opacity = "0.7";
					ButtonLock();
				} else {
					document.getElementById('CPW').src = "/images/success.png";
					document.getElementById('pn').style.opacity = "0";
					CheckCPW();
					ButtonLock();
				}				
			}
			function CheckCPW() {
				var str = document.getElementsByName('conpw').item(0).value;
				var result = true;
				str = str.replace(/\s/g, "");
				document.getElementsByName('conpw').item(0).value = str;
				if (str.length == 0) {
					result = false;
				}
				for (var i = 0; i < str.length; i++) {
					var temp = false;
					if ((str.charAt(i) >= 'A' && str.charAt(i) <= 'Z') || (str.charAt(i) >= 'a' && str.charAt(i) <= 'z') 
						|| (str.charAt(i) >= '0' && str.charAt(i) <= '9'))
						temp = true;
					if (temp == false) {
						result = false;
					}
				}

				var str2 = document.getElementsByName('password').item(0).value;
				str2 = str2.replace(/\s/g, "");
				if (str.length != str2.length || str != str2)	
					result = false;
				if (result == false) {
					document.getElementById('CCPW').src = "/images/wrong.png";
					ButtonLock();
				} else {
					document.getElementById('CCPW').src = "/images/success.png";
					ButtonLock();
				}	
			}
			function ButtonLock() {
				var name = false;
				var surname = false;
				var mail = false;
				var password = false;
				var cpw = false;
				var url = document.getElementById('CName').src;
				url = url.split('success.png')[0];
				url = url.split('wrong.png')[0];
				url += 'success.png';
				if (document.getElementById('CName').src == url) {
					name = true;
				} 
				if (document.getElementById('CSName').src == url) {
					surname = true;
				}
				if (document.getElementById('CMail').src == url) {
					mail = true;
				}
				if (document.getElementById('CPW').src == url) {
					password = true;
				}
				if (document.getElementById('CCPW').src == url) {
					cpw = true;
				}
				if (name && surname && mail && password && cpw) {
					document.getElementsByName('save').item(0).disabled = false;
					document.getElementsByName('save').item(0).style.color = "green";
					document.getElementsByName('save').item(0).style.opacity = "1";
				} else {
					document.getElementsByName('save').item(0).disabled = true;
					document.getElementsByName('save').item(0).style.color = "red";
					document.getElementsByName('save').item(0).style.opacity = "0.3";
				}
			}
			function Recover() {
				var xmlhttp = getXmlHttp();
				var mail = document.getElementById('Recover_mail').value;
				var params = 'mail=' + mail	;
				xmlhttp.open("POST", "Recover.php", true);
				xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4) {
						var ans = xmlhttp.responseText;
						confirm(ans);
					}
				}
				xmlhttp.send(params);
			}
			function RecoveryButtonLock() {
				var url = document.getElementById('rms').src;
				url = url.split('success.png')[0];
				url = url.split('wrong.png')[0];
				url += 'success.png';	
				if (document.getElementById('rms').src == url) {
					document.getElementsByName('RecoverBut').item(0).disabled = false;
					document.getElementsByName('RecoverBut').item(0).style.color = "green";
					document.getElementsByName('RecoverBut').item(0).style.opacity = "1";
				} else {
					document.getElementsByName('RecoverBut').item(0).disabled = true;
					document.getElementsByName('RecoverBut').item(0).style.color = "red";
					document.getElementsByName('RecoverBut').item(0).style.opacity = "0.3";
				}
			}
			function RecoveryCheck() {
				var str = document.getElementById("Recover_mail").value;
				var result = true;
				str = str.replace(/\s/g, "");
				document.getElementById("Recover_mail").value = str;
				if (str.length == 0) {
					result = false;
				}
				var ress = false;
				var resd = false;
				var pos = 0;
				for (var i = 0; i < str.length; i++) {
					if (str.charAt(i) == "@") {
						ress = true;
						pos = i;
					}
					if (str.charAt(i) == ".")
						resd = true;							
				}
				if (ress == false || resd == false)
					result = false;
				for (var i = 0; i < str.length; i++) {
					var res2 = false;
					if ((str.charAt(i) >= 'A' && str.charAt(i) <= 'Z') || (str.charAt(i) >= 'a' && str.charAt(i) <= 'z')
						|| str.charAt(i) == '@' || str.charAt(i) == '.' || (str.charAt(i) >= '0' && str.charAt(i) <= '9') || str.charAt(i) == '!'
							|| str.charAt(i) == '#' || str.charAt(i) == '$' || str.charAt(i) == '%' || str.charAt(i) == '&' || str.charAt(i) == "'" || str.charAt(i) == '*'
								|| str.charAt(i) == '+' || str.charAt(i) == '-' || str.charAt(i) == '/' || str.charAt(i) == '=' || str.charAt(i) == '?' || str.charAt(i) == '^' || str.charAt(i) == '{'
									|| str.charAt(i) == '}' || str.charAt(i) == '|' || str.charAt(i) == '~')
						res2 = true;
					if (res2 == false)
						result = false;
				}	
				if (str.length == pos + 1)
					result = false;
				var das = 0;
				var ndas = 0;
				for (var i = pos; i < str.length; i++) {
					var result3 = false;
					if ((str.charAt(i) >= 'A' && str.charAt(i) <= 'Z') || (str.charAt(i) >= 'a' && str.charAt(i) <= 'z')
						|| str.charAt(i) == '@' || str.charAt(i) == '.' )
						result3 = true;
					if (str.charAt(i) == '.') {
						das = i;
						ndas++;
					}
					if (result3 == false) {
						result = false;
					}
				}
				if (das + 1 == str.length || das == 0 || ndas > 1)
					result = false;
				var ans;
				if (result == true) {
					var xmlhttp = getXmlHttp();
					var mail = str;
					var params = 'mail=' + mail;
					xmlhttp.open("POST", "CheckMail.php", true);
					xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4) {
							ans = xmlhttp.responseText;
							for (var i = 0; i < ans.length; i++) {
                                if (ans.charAt(i) == "0") result = false;
                            }
							if (result != false) {
								document.getElementById('rms').src = "/images/wrong.png";
								document.getElementById('rmn').style.opacity = "0.7";
								RecoveryButtonLock();
							} else {
								document.getElementById('rms').src = "/images/success.png";
								document.getElementById('rmn').style.opacity = "0";
								RecoveryButtonLock();
							}
						}
					}
					xmlhttp.send(params);	
				} else {
					if (result == false) {
						document.getElementById('rms').src = "/images/wrong.png";
						document.getElementById('rmn').style.opacity = "0.7";
						RecoveryButtonLock();
					} else {
						document.getElementById('rms').src = "/images/success.png";
						document.getElementById('rmn').style.opacity = "0";
						RecoveryButtonLock();
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
		
			<div align = "center">
				<form action = "enter.php" method = "post">
					<input name = "mail" type = "text" size = "20" maxlength = "40" placeholder = "Your mail"/> </br>
					<input name = "pw" type = "text" size = "20" maxlength = "40" placeholder = "Your password"/> </br>
					<a href = "javascript: PopUpFShow(); RecoveryButtonLock();">Forgot your password?</a>
					<div class = "b-popupF" id = "popupF">
						<div class = "b-popupF-content">
							<table>
								<tr>
									<td>
										<input id = "Recover_mail" type = "text" size = "30" maxlength = "40" placeholder = "Your mail" onchange = "javascript: RecoveryCheck()" />
									</td>
									<td>
										<img class = "status" id = "rms" />
									</td>
									<td width = "300px">
										<div id = "rmn" class = "note" >
											To continue write your real e-mail!
										</div>
									</td>
								</tr>
							</table>
							<input name = "RecoverBut" type = "button" value = "Send a letter" type = "button" onclick = "javascript: Recover(); this.disabled = true" class = "button" disabled />
							</br>
							<a href = "javascript: PopUpFHide()"> Close </a>
						</div>
					</div>
					<table>
						<td><input name = "submit" type = "submit" value = "Enter" id = "EnRe"/></td>
						<td><a href = "javascript: PopUpShow(); ButtonLock()" ><input type = "button" value = "Register" id = "EnRe" /></a></td>
					</table>
				</form>
				<div class="b-popup" id = "popup1">
					<div class="b-popup-content">
						<table>
							<tr>
								<td>
									<input name = "name" type = "text" size = "30" maxlength = "30" placeholder = "Your name" onchange = "javascript: CheckN()" />
								</td>
								<td>
									<img class = "status" id = "CName" />
								</td>
								<td>
									<div class = "note" id = "nn">
									Name should consist only of letters
									</div>
								</td>
							<tr>
							<tr>
								<td>
									<input name = "surname" type = "text" size = "30" maxlength = "30" placeholder = "Your surname" onchange = "javascript: CheckSN()" />
								</td>
								<td>
									<img class = "status" id = "CSName" />
								</td>
								<td>
									<div  class = "note" id = "snn">
									Surname should consist only of letters
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<input id = "mail" type = "text" size = "30" maxlength = "40" placeholder = "Your mail" onchange = "javascript: CheckM()" /> 
								</td>
								<td>
									<img class = "status" id = "CMail" />
								</td>
								<td>
									<div class = "note" id = "mn">
										There is no such mail </br>
										or this address is already in use
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<input name = "password" type = "password" size = "30" maxlength = "30" placeholder = "Your password" onchange = "javascript: CheckPW()" /> 
								</td>
								<td>
									<img class = "status" id = "CPW" />
								</td>
								<td>
									<div class = "note" id = "pn">
										You password must consist of numbers</br>
												big and small characters									
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<input name = "conpw" type = "password" size = "30" maxlength = "30" placeholder = "Confirm your password" onchange = "javascript: CheckCPW(this.value)"  />
								</td>
								<td>
									<img class = "status" id = "CCPW" />
								</td>
							</tr>
						</table>
							<input class = "button" name = "save" type = "button" value = "Register" onclick = "javascript: call('save_user.php'); this.disabled = true" disabled /> </br>
						<a href="javascript: PopUpHide()">Close</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>		
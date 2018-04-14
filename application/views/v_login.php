<?php
session_start(); 
if (empty($_SESSION['level'])){ 
	header('Location:dashboard.php');?>
}else{
	<?php echo $_SESSION["level"];
	header('Location:login.php') ?>	
}
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
<form>
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><input type="button" name="login" value="Login"></td>
		</tr>
	</table>
</form>
</body>
</html>

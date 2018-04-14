<?php if (!empty($_SESSION['level']))
	header('location:'.base_url().'c_dashboard');
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
<form action="<?php echo base_url() ?>c_login/login" method="POST">
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
			<td><input type="submit" name="login" value="Login"></td>
		</tr>
	</table>
</form>
</body>
</html>

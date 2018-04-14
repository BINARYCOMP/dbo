
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?=base_url()?>C_form1/FormRegister" method="post">
 		<table>
 		<tr>
 			<th>Register</th>
 		</tr>
 		<tr>
 			<td>Email</td>
 			<td><input type="email" name="txtemail"></td>
 		</tr>
 		<tr>
 			<td>Username</td>
 			<td><input type="text" name="txtusername"></td>
 		</tr>
 		<tr>
 			<td>Password</td>
 			<td><input type="password" name="txtpassword"></td>
 		</tr>
 		<tr>
 			<td>Level</td>
 			<td><select name="level">
 					<option>Admin</option>
 					<option>Keuangan</option>
 					<option>Managerial</option>
 					<option>Owner</option>
 					<option>Super User</option>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit"></td>
 		</tr>

 		</table>

 	</form>
 
 </body>
 </html>
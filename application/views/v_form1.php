
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
 			<td>Username</td>
 			<td><input type="text" name="txtusername"></td>
 		</tr>
 		<tr>
 			<td>Password</td>
 			<td><input type="password" name="txtpassword"></td>
 		<tr>
 			<td>ID Pegawai</td>
 			<td><input type="text" name="txtidpegawai"></td>
 		</tr>
 		</tr>
 		<tr>
 			<td>Level</td>
 			<td><select name="level">
 					<?php  
 					foreach ($dataLevel as $row){
 						echo "<option value='".$row['LEVE_ID']."'>";
 						echo $row ['LEVE_NAME'];
 					 echo "</option>";
 					}
 					 ?>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>

 	</form>
 
 </body>
 </html>
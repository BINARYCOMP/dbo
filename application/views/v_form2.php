<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
	 	<form action="<?php echo base_url ()?>C_form1/UpdateData/<?php  echo $dataUser[0]['USER_ID'] ?>" method="post">
 		<table>
 		<tr> 
 			<th>Register</th>
 		</tr>
 		<tr>
 			<td>Username</td>
 			<td><input type="text" name="txtusername" value="<?php echo($dataUser[0]['USER_NAME'])?>"></td>
 		</tr>
 		<tr>
 			<td>Password</td>
 			<td><input type="password" name="txtpassword"></td>
 		<tr>
 			<td>ID Pegawai</td>
 			<td><input type="text" name="txtidpegawai" value="<?php  echo($dataUser[0]['USER_DAPE_ID']) ?>" ></td>
 		</tr>
 		</tr>
 		<tr>
 			<td>Level</td>
 			<td><select name="level">
 					<?php  
 					foreach ($dataLevel as $row){
 						if ($row['LEVE_ID']==$dataUser[0]['USER_LEVE_ID']) {
 							# code...
 						echo "<option value='".$row['LEVE_ID']."' selected>";
 						echo $row['LEVE_NAME'];
 					 	echo "</option>";
 						} else{
 							echo "<option value='".$row['LEVE_ID']."'>";
	 						echo $row['LEVE_NAME'];
	 					 	echo "</option>";

 						}
 					}
 					 ?>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit"></td>
 		</tr>

 		</table>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
	
	 	<form action="<?php echo base_url(). 'c_level/UpdateData/' .$level[0]["LEVE_ID"]; ?>" method="post">
 		<table>
 		<tr>
 			<th>EDIT</th>
 		</tr>
 		<tr>
 			
 			<td>level</td>
 			<td><input type="text" name="txtlevel" value="<?php echo($level[0]['LEVE_NAME'])?>"></td>
 		</tr>
 		
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>

</body>
</html>
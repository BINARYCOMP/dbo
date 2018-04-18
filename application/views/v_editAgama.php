<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
	
	 	<form action="<?php echo base_url(). 'c_viewAgama/UpdateData/' .$agama[0]["AGAM_ID"]; ?>" method="post">
 		<table>
 		<tr>
 			<th>edit</th>
 		</tr>
 		<tr>
 			<td>agama</td>
 			<td><input type="text" name="txtagama" value="<?php echo($agama[0]['AGAM_NAME'])?>"></td>
 		</tr>
 		
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>

</body>
</html>
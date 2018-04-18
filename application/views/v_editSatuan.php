<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
	
	 	<form action="<?php echo base_url(). 'c_satuan/UpdateData/' .$satuan[0]["SATU_ID"]; ?>" method="post">
 		<table>
 		<tr>
 			<th>EDIT</th>
 		</tr>
 		<tr>
 			<td>satuan</td>
 			<td><input type="text" name="txtsatuan" value="<?php echo($satuan[0]['SATU_NAME'])?>"></td>
 		</tr>
 		
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>

</body>
</html>
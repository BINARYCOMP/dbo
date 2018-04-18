<!DOCTYPE html>
<html>
<head>
	<title>update BAPA</title>
</head>
<body>
	
	 	<form action="<?php echo base_url(). 'c_barangParent/UpdateData/' .$barangParent[0]["BAPA_ID"]; ?>" method="post">
 		<table>
 		<tr>
 			<th>edit BAPA</th>
 		</tr>
 		<tr>
 			<td>Nama Barang</td>
 			<td><input type="text" name="txtnama" value="<?php echo($barangParent[0]['BAPA_NAME'])?>"></td>
 		</tr>
 		
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>


 		</table>

</body>
</html>
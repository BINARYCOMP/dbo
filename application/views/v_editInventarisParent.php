<!DOCTYPE html>
<html>
<head>
	<title>update INPA</title>
</head>
<body>
	
	 	<form action="<?php echo base_url()?>c_inventarisParent/UpdateData/<?php echo $inventarisParent[0]['INPA_ID']?>" method="post">
 		<table>
 		<tr>
 			<th>edit INPA</th>
 		</tr>
 		<tr>
 			<td>Nama inventaris</td>
 			<td><input type="text" name="txtnama" value="<?php echo($inventarisParent[0]['INPA_NAME'])?>"></td>
 		</tr>
 		
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>


 		</table>

</body>
</html>
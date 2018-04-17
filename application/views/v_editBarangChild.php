<!DOCTYPE html>
<html>
<head>
	<title>update BACH</title>
</head>
<body>
	
	 	<form action="<?php echo base_url(). 'c_barangChild/UpdateData/' .$barangChild[0]["BACH_ID"]; ?>" method="post">
 		<table>
 		<tr>
 			<th>edit BACH</th>
 		</tr>
 		<tr>
 			<td>Nama Barang</td>
 			<td><input type="text" name="txtnama" value="<?php echo($barangChild[0]['BACH_NAME'])?>"></td>
 		</tr>
 		<tr>
 			<td>Harga Barang</td>
 			<td><input type="text" name="txtharga" value="<?php echo($barangChild[0]['BACH_HARGA'])?>"></td>
 		</tr>
 		<tr>
 			<td>Gudang Jadi</td>
 			<td><input type="text" name="txtguja" value="<?php echo($barangChild[0]['BACH_GUJA_TOTAL'])?>"></td>
 		</tr>
 		<tr>
 			<td>Gudang Tak Jadi</td>
 			<td><input type="text" name="txtguta" value="<?php echo($barangChild[0]['BACH_GUTA_TOTAL'])?>"></td>
 		</tr>
 		<tr>
 			<td>Satuan</td>
 			<td><input type="text" name="txtsatuan" value="<?php echo($barangChild[0]['BACH_SATU_ID'])?>"></td>
 		</tr>
 		
 		
 		
 		
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>

</body>
</html>
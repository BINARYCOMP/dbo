 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?php echo base_url(). 'c_barangChild/form'; ?>" method="post">
 		<table>
 		<tr>
 			<th>view barag child</th>
 		</tr>
 		<tr>
 			<td>Nama barang</td>
 			<td><input type="text" name="txtnama"></td>
 		</tr>
 		<tr>
 			<td>Harga</td>
 			<td><input type="text" name="txtharga"></td>
 		</tr>
 		<tr>
 			<td>Gudang Jadi</td>
 			<td><input type="text" name="txtguja"></td>
 		</tr>
		<tr>
 			<td>Gudang Tak Jadi</td>
 			<td><input type="text" name="txtguta"></td>
 		</tr>
 		<tr>
 			<td>Satuan Barang</td>
 			<td><input type="text" name="txtsatuan"></td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>
 		<br>
 		<br>
 		<table border="">
 			<tr>
 				<td>nama barang</td>
 				<td>ID barang</td>
 				<td>harga barang</td>
 				<td>gudang jadi</td>
 				<td>gudang tak jadi</td>
 				<td>satuan barang</td>
 				<td>waktu</td>
 			</tr>
 			<?php 
 				foreach ($barang_child as $row) {
 					echo "<tr>";
 					echo "<td>".$row['BACH_NAME']."</td>";
 					echo "<td>".$row['BACH_ID']."</td>";
 					echo "<td>".$row['BACH_HARGA']."</td>";
 					echo "<td>".$row['BACH_GUJA_TOTAL']."</td>";
 					echo "<td>".$row['BACH_GUTA_TOTAL']."</td>";
 					echo "<td>".$row['BACH_SATU_ID']."</td>";
 					echo "<td>".$row['BACH_TIMESTAMP']."</td>";
 					echo "<td><a href='".base_url()."c_barangChild/FormUpdate/".$row['BACH_ID']."'>Edit</a></td>";
 					echo "<td><a href='".base_url()."c_barangChild/delete/".$row['BACH_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>

 	</form>
 
 </body>
 </html>
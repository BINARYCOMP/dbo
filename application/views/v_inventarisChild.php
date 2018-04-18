 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?php echo base_url(). 'c_inventarisChild/save'; ?>" method="post">
 		<table>
 		<tr>
 			<td>inventaris parent</td>
 			<td><input type="text" name="txtParent"></td>
 		</tr>
 		<tr>
 			<td>Nama </td>
 			<td><input type="text" name="txtNama"></td>
 		</tr>
 		<tr>
 			<td>Jumlah</td>
 			<td><input type="text" name="txtQty"></td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>
 		<br>
 		<br>
 		<table border="">
 			<tr>
 				<td>ID inventaris</td>
 				<td>nama inventaris</td>
 				<td>Jumlah inventaris</td>
 				<td>inventaris parent</td>
 				<td>Tanggal Ditambahkan</td>
 				<td colspan="2">Action</td>
 			</tr>
 			<?php 
 				foreach ($inventaris_child as $row) {
 					echo "<tr>";
 					echo "<td>".$row['INCH_ID']."</td>";
 					echo "<td>".$row['INCH_NAME']."</td>";
 					echo "<td>".$row['INCH_QTY']."</td>";
 					echo "<td>".$row['INPA_NAME']."</td>";
 					echo "<td>".$row['INCH_TIME']."</td>";
 					echo "<td><a href='".base_url()."c_inventarisChild/FormUpdate/".$row['INCH_ID']."'>Edit</a></td>";
 					echo "<td><a href='".base_url()."c_inventarisChild/delete/".$row['INCH_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>

 	</form>
 
 </body>
 </html>
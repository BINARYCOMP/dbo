 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?php echo base_url(). 'c_barangParent/form'; ?>" method="post">
 		<table>
 		<tr>
 			<th>view barag parent</th>
 		</tr>
 		<tr>
 			<td>Barang Parent</td>
 			<td><input type="text" name="txtnama"></td>
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
 				<td>waktu</td>
 			</tr>
 			<?php 
 				foreach ($barang_parent as $row) {
 					echo "<tr>";
 					echo "<td>".$row['BAPA_NAME']."</td>";
 					echo "<td>".$row['BAPA_ID']."</td>";
 					echo "<td>".$row['BAPA_TIMESTAMP']."</td>";
 					echo "<td><a href='".base_url()."c_barangParent/FormUpdate/".$row['BAPA_ID']."'>Edit</a></td>";
 					echo "<td><a href='".base_url()."c_barangParent/delete/".$row['BAPA_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>

 	</form>
 
 </body>
 </html>
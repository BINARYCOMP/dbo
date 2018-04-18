 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?php echo base_url(). 'c_satuan/form'; ?>" method="post">
 		<table>
 		<tr>
 			<th>View DB Satuan</th>
 		</tr>
 		<tr>
 			<td>satuan</td>
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
 				<td>satuan</td>
 				<td>satuan id</td>
 			</tr>
 			<?php 
 				foreach ($satuan as $row) {
 					echo "<tr>";
 					echo "<td>".$row['SATU_NAME']."</td>";
 					echo "<td>".$row['SATU_ID']."</td>";
 					echo "<td><a href='".base_url()."c_satuan/FormUpdate/".$row['SATU_ID']."'>Edit</a></td>";
 					echo "<td><a href='".base_url()."c_satuan/delete/".$row['SATU_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>

 	</form>
 
 </body>
 </html>
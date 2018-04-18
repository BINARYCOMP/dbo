 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?php echo base_url(). 'c_inventarisParent/save'; ?>" method="post">
 		<table>
 		<tr>
 			<th>view barag parent</th>
 		</tr>
 		<tr>
 			<td>inventaris Parent</td>
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
 				<td>nama inventaris</td>
 				<td>ID inventaris</td>
 				<td>Tanggal Di tambahkan</td>
 				<td colspan="2">Action</td>

 			</tr>
 			<?php 
 				foreach ($inventarisParent as $row) {
 					echo "<tr>";
 					echo "<td>".$row['INPA_NAME']."</td>";
 					echo "<td>".$row['INPA_ID']."</td>";
 					echo "<td>".$row['INPA_TIME']."</td>";
 					echo "<td><a href='".base_url()."c_inventarisParent/FormUpdate/".$row['INPA_ID']."'>Edit</a></td>";
 					echo "<td><a href='".base_url()."c_inventarisParent/delete/".$row['INPA_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>

 	</form>
 
 </body>
 </html>
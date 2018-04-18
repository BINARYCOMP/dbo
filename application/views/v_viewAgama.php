 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?php echo base_url(). 'c_viewAgama/form'; ?>" method="post">
 		<table>
 		<tr>
 			<th>view db agama</th>
 		</tr>
 		<tr>
 			<td>agama</td>
 			<td><input type="text" name="txtagama"></td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>
 		<br>
 		<br>
 		<table border="">
 			<tr>
 				<td>agama</td>
 				<td>agama id</td>
 			</tr>
 			<?php 
 				foreach ($agama as $row) {
 					echo "<tr>";
 					echo "<td>".$row['AGAM_NAME']."</td>";
 					echo "<td>".$row['AGAM_ID']."</td>";
 					echo "<td><a href='".base_url()."c_viewAgama/FormUpdate/".$row['AGAM_ID']."'>Edit</a></td>";
 					echo "<td><a href='".base_url()."c_viewAgama/delete/".$row['AGAM_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>

 	</form>
 
 </body>
 </html>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?php echo base_url(). 'c_level/form'; ?>" method="post">
 		<table>
 		<tr>
 			<th>View DB level</th>
 		</tr>
 		<tr>
 			<td>level</td>
 			<td><input type="text" name="txtlevel"></td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>
 		<br>
 		<br>
 		<table border="">
 			<tr>
 				<td>Level</td>
 				<td>Level id</td>
 			</tr>
 			<?php 
 				foreach ($level as $row) {
 					echo "<tr>";
 					echo "<td>".$row['LEVE_NAME']."</td>";
 					echo "<td>".$row['LEVE_ID']."</td>";
 					echo "<td><a href='".base_url()."c_level/FormUpdate/".$row['LEVE_ID']."'>Edit</a></td>";
 					echo "<td><a href='".base_url()."c_level/delete/".$row['LEVE_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
 					echo "</tr>";
 				}
 			 ?>
 		</table>

 	</form>
 
 </body>
 </html>
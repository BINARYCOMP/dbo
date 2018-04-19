<form action="<?php echo base_url().'c_keuangan/simpan'; ?>" method="post">
	Tanggal <input type="date" name="dtmTanggal"> <br>
	Uraian	<textarea name="txtUraian" required="true"></textarea><br>
	Debet	<input type="number" name="txtDebet"><br>
	Kredit	<input type="number" name="txtKredit"><br>
	Saldo	<input type="number" disabled="true" name=""><br>
	<input type="hidden" disabled="true" name="txtSaldo">
	<input type="submit" name="btnSubmit" value="Simpan">




	<table border="1">
 			<tr>
 				<td>Tanggal</td>
 				<td>Uraian</td>
 				<td>Debet</td>
 				<td>Kredit</td>
 				<td>Saldo</td>
 			</tr>

 			 <?php 
 			 	foreach($keuangan as $row){
 			  ?>
 			  	<tr>
 			  		<td><?php echo $row['KEUA_TANGGAL']; ?></td>
 			  		<td><?php echo $row['KEUA_RINCIAN']; ?></td>
 			  		<td><?php echo $row['KEUA_MASUK']; ?></td>
 			  		<td><?php echo $row['KEUA_KELUAR']; ?></td>
 			  		<td><?php echo $row['KEUA_SALDO']; ?></td>
 			  		<td><a href="<?php echo base_url().'c_keuangan/formUpdate/'.$row['KEUA_ID']; ?>">Edit</a></td>
 			  		<td><a href="<?php echo base_url().'c_keuangan/delete/'.$row['KEUA_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
 			  	</tr>
 			 <?php 
 			  	}
 			  ?>
 		</table>
</form>
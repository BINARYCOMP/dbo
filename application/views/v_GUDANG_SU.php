<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?=base_url()?>C_GUDANG_SU/formCreate" method="post">
		<table>
			<tr>
				<td>ID Barang</td>
				<td>Deposit</td>
				<td>Withdraw</td>
				<td>Total Barang</td>
				
			</tr>
			<tr>
				<td><input type="number" name="numidbarang"></td>
				<td><input type="number" name="numdeposit"></td>
				<td><input type="number" name="numwithdraw"></td>
				<td>ngke php na</td>
				<td><input type="submit" name="submit" value="simpan"></td>
				
			</tr>
		</table>
	</form>

</body>
</html>
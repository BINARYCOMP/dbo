<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>tambah data baru</h3>
<form action="<?php echo base_url(). 'c_inputAgama/tambah_aksi' ?>" method="post">
	<table>
		<tr>
			<td>Masukan Agama</td>
		</tr>
		<tr>
			<td><input type="text" name="agama"></td>
		</tr>
		<tr>
			<td>Masukan id Agama</td>
		</tr>
		<tr>
			<td><input type="text" name="agamaId"></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="submit"></td>
		</tr>
	</table>
</body>
</html>
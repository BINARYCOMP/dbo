<h1>Data Keuangan</h1><hr>
<a href="<?php echo base_url('index.php/c_excel_keuangan/export') ?>">Export ke Excel</a><br><br>
<?php $no=1; ?>


<table border="1" cellpadding="8">
	<tr>
		<th>No.</th>
		<th>Tanggal</th>
		<th>Rincian</th>
		<th>Debet</th>
		<th>Kredit</th>
		<th>Saldo</th>
	</tr>

	<?php 
	if (!empty($keuangan)) {
		foreach ($keuangan as $data) {
		$dat = $data->KEUA_TIMESTAMP;
		$fdat = date('d M Y', strtotime($dat));
	?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $fdat ?></td>
		<td><?php echo $data->KEUA_RINCIAN ?></td>
		<td><?php echo $data->KEUA_MASUK ?></td>
		<td><?php echo $data->KEUA_KELUAR ?></td>
		<td><?php echo $data->KEUA_SALDO ?></td>
	</tr>
	<?php
		}
	}
	else{
	?>
	<tr>
		<td colspan="6">Data Tidak Ada</td>
	</tr>
	<?php
	}

	?>
</table>
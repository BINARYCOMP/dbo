<h1>Data Pegawai</h1><hr>
<a href="<?php echo base_url('index.php/c_excel_pegawai/export') ?>">Export ke Excel</a><br><br>
<?php $no=1; ?>

<table border="1" cellpadding="8">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Alamat</th>
		<th>No Tlp</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
	</tr>

	<?php 
	if (!empty($pegawai)) {
		foreach ($$pegawai as $data) {
	?>
	<tr>
		<td><?php $no++ ?></td>
		<td><?php $data->PEGA_NAME ?></td>
		<td><?php $data->PEGA_EMAIL ?></td>
		<td><?php $data->PEGA_ALAMAT ?></td>
		<td><?php $data->PEGA_NO_TLP ?></td>
		<td><?php $data->PEGA_JENKEL ?></td>
		<td><?php $data->PEGA_AGAM_ID ?></td>
	</tr>
	<?php
		}
	}
	else{
	?>
	<tr>
		<td colspan="7">Data Tidak Ada</td>
	</tr>
	<?php
	}

	?>
</table>
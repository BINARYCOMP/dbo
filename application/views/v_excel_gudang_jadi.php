<h1>Data Gudang Jadi</h1><hr>
<a href="<?php echo base_url('index.php/c_excel_gudang_jadi/export') ?>">Export ke Excel</a><br><br>
<?php $no=1; ?>

<table border="1" cellpadding="8">
	<tr>
		<th>No.</th>
		<th>Nama Barang</th>
		<th>Satuan</th>
		<th>Jumlah</th>
	</tr>

	<?php 
	if (!empty($barang_parent)) {
		foreach ($barang_parent as $data) {
	?>
	<tr>
		<td></td>
		<td><?php echo $data->BAPA_NAME ?></td>
		<td></td>
		<td></td>
	</tr>

	<?php
		$barang_child = $this->m_excel_gudang_jadi->view2($data->BAPA_ID);
		foreach ($barang_child as $data) {
	?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $data->BACH_NAME ?></td>
		<td><?php echo $data->SATU_NAME ?></td>
		<td><?php echo $data->BACH_GUJA_TOTAL ?></td>
	</tr>
	<?php
			} 
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
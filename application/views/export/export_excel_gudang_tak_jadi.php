<h1>Data Gudang Tak Jadi</h1><hr>
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
		$barang_child = $this->m_excel_gudang_tak_jadi->view2($data->BAPA_ID);
		foreach ($barang_child as $data) {
	?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $data->BACH_NAME ?></td>
		<td><?php echo $data->SATU_NAME ?></td>
		<td><?php echo $data->BACH_GUTA_TOTAL ?></td>
	</tr>
	<?php
			} 
		}
	}
	else{
	?>
	<tr>
		<td colspan="4">Data Tidak Ada</td>
	</tr>
	<?php
	}

	?>
</table>
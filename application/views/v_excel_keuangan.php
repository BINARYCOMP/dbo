<div class="content-wrapper">
	<div class="row">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    	<h1>
		      <?php if(isset($title)) echo $title ?>
		      <small><i class="fa fa-info"></i></small>
		      <small><?php echo $_SESSION['level'] ?></small>
		    </h1>
	  </section>

	  <!-- Main content -->
	  <section class="content">
		<div class="content">
			<div class="row">
			  <div class="col-md-6">

			      <!-- /.box -->
			  </div> <!-- col-input -->
			  <div class="col-md-12">
			    <div class="box box-warning">
			      <div class="box-header with-border">
			        <h3 class="box-title">Data Keuangan</h3>

			        <div class="box-tools pull-right">
			          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
			      </div>
			      <!-- /.box-header -->
			      <div class="box-body">
					<table class="table table-bordered table-hover table-striped" id="lookup">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tanggal</th>
								<th>Rincian</th>
								<th>Debet</th>
								<th>Kredit</th>
								<th>Saldo</th>
								<th style="text-align: center" colspan="2">Action </th>
							</tr>
						</thead>
						<tbody>
						 <?php 
							if (!empty($keuangan)) {
								foreach ($keuangan as $data) {
								$dat = $data->KEUA_TIMESTAMP;
								$fdat = date('d M Y', strtotime($dat));
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $data->KEUA_TANGGAL ?></td>
								<td><?php echo $data->KEUA_RINCIAN ?></td>
								<td><?php echo $data->KEUA_MASUK ?></td>
								<td><?php echo $data->KEUA_KELUAR ?></td>
								<td><?php echo $data->KEUA_SALDO ?></td>
								<td><?php echo "<a href='base_url('index.php/c_excel_keuangan/export')>Export ke Excel</a>";?></td>
							</tr>
							<?php
								}
							$total = $this->m_excel_keuangan->total();
							var_dump($total);
							?>
							<tr>
								<td colspan="5">Total</td>
								<td><?php echo $total[0] ?></td>
							</tr>
							<?php
								}else{
							?>
								<tr>
									<td colspan="6">Data Tidak Ada</td>
								</tr>
							<?php
								
								
							}

						?>
						</tbody>
					</table>
			      </div>
			    </div>
			      <!-- /.box -->
			  </div> <!-- col-input -->
			</div>
		</div>
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.row -->
</div>
<!-- /.content-wrapper -->


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
		<td><?php echo $data->KEUA_TANGGAL ?></td>
		<td><?php echo $data->KEUA_RINCIAN ?></td>
		<td><?php echo $data->KEUA_MASUK ?></td>
		<td><?php echo $data->KEUA_KELUAR ?></td>
		<td><?php echo $data->KEUA_SALDO ?></td>
	</tr>
	<?php
		}
	$total = $this->m_excel_keuangan->total();
	var_dump($total);
	?>
	<tr>
		<td colspan="5">Total</td>
		<td><?php echo $total[0] ?></td>
	</tr>
	<?php
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
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
			<!-- Form Kotak Mulai -->
			<div class="col-md-6">
				<div class="box box-warning">
				  <div class="box-header with-border">
				    <h3 class="box-title">Form Barang Gudang Bawang</h3>

				    <div class="box-tools pull-right">
				      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				    </div>
				  </div>
				  <!-- /.box-header -->
				  <div class="box-body">
				    <div class="row">
				      <div class="col-md-12 ">
				        <table  class="table" id="lookup" >
				        	<thead>
				        		<tr>
				        			<th>No.</th>
				        			<th>Nama Barang</th>
				        			<th>Satuan</th>
				        			<th>Jumlah</th>
				        		</tr>
				        	</thead>
				        	<tbody>
				        		<?php
				        			foreach ($dataBarangParent as $row) {
				        				?>
						        		<tr>
						        			<td></td>
							        		<td><?php echo $row['BAPA_NAME'] ?></td>
							        		<td></td>
							        		<td></td>
						        		</tr>
				        				<?php
				        				// $dataBarangChildById 
				        				foreach ($dataBarangChildById as $row) {
				        					?>
							        		<tr>
							        			<td><?php echo $no ?></td>
								        		<td><?php echo $row['BACH_NAME'] ?></td>
								        		<td><?php echo $row['SATU_NAME'] ?></td>
								        		<td><?php echo $row['BACH_GUJA_TOTAL'] ?></td>
							        		</tr>
				        					<?php
				        				}
				        			}
				        		?>
				        	</tbody>
				        </table>
				      </div>
				      <!-- /.col -->
				    </div>
				    <!-- /.row -->
				  </div>
				</div>
				<!-- /.box -->
			</div> <!-- col-input -->
			<!-- Form Kotak selesai -->
		</div>
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.row -->
</div>
<!-- /.content-wrapper -->

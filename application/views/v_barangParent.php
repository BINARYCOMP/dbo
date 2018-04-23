<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Induk Barang</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url(). 'c_barangParent/form'; ?>" method="POST">
	              <div class="form-group">
	                  <label class=" control-label">Nama Barang Parent</label>
	                  <div>
	                    <span >
	                      <input class="form-control" type="text"  name="txtnama" required="true">  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-10">
	                    <button type="reset" class="btn btn-default pull-right">Cancel</button>
	                  </div>
	                  <div class="col-md-2">
	                    <button type="submit" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()" >Input Data</button>
	                  </div>
	                </div>
	              </div>
	            </form>
	          </div>
	          <!-- /.col -->
	        </div>
	        <!-- /.row -->
	      </div>
	    </div>
	      <!-- /.box -->
	  </div> <!-- col-input -->
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Data Induk Barang</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
			<table class="table table-bordered table-hover table-striped" id="lookup">
				<thead>
					<tr>
						<th>Name Barang</th>
		 				<th>ID Barang</th>
		 				<th>Waktu</th>
					</tr>
				</thead>
				<tbody>
				 <?php 
	 				foreach ($barang_parent as $row) {
	 					echo "<tr>";
	 					echo "<td>".$row['BAPA_NAME']."</td>";
	 					echo "<td>".$row['BAPA_ID']."</td>";
	 					echo "<td>".$row['BAPA_TIMESTAMP']."</td>";
	 					echo "<td><a href='".base_url()."c_barangParent/FormUpdate/".$row['BAPA_ID']."'>Edit</a></td>";
	 					echo "<td><a href='".base_url()."c_barangParent/delete/".$row['BAPA_ID']."'>Delete</a></td>";
	 					echo "</tr>";
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
<!-- /.content -->

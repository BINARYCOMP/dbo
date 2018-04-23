<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Anak Barang</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url(). 'c_barangChild/form'; ?>" method="POST">
	              <div class="form-group">
	                  <label class=" control-label">Induk Barang</label>
	                  <div>
	                    <select name="txtbapa" id="cmbParent" class="form-control">
						  <option value="0">== Pilih Induk Barang ==</option>
						  <?php  
						    foreach ($barang_parent as $row){
						      echo "<option value='".$row['BAPA_ID']."'>";
						      echo $row ['BAPA_NAME'];
						     echo "</option>";
						    }
						  ?>
						</select>  
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class=" control-label">Nama Anak Barang</label>
	                  <div>
	                    <span >
	                      <input class="form-control" type="text"  name="txtnama" required="true">  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	                  <select name="txtsatuan" id="cmbParent" class="form-control">
						  <option value="0">== Pilih Induk Barang ==</option>
						  <?php  
						    foreach ($satuan as $row){
						      echo "<option value='".$row['SATU_ID']."'>";
						      echo $row ['SATU_NAME'];
						     echo "</option>";
						    }
						  ?>
						</select>  
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
	        <h3 class="box-title">Data Anak Barang </h3>

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
		 				<th>Gudang Jadi</th>
		 				<th>Gudang Tak Jadi</th>
		 				<th>Satuan Barang</th>
		 				<th>Barang Parent</th>
		 				<th>Waktu</th>
					</tr>
				</thead>
				<tbody>
					<?php 
		 				foreach ($barang_child as $row) {
		 					echo "<tr>";
		 					echo "<td>".$row['BACH_NAME']."</td>";
		 					echo "<td>".$row['BACH_ID']."</td>";
		 					echo "<td>".$row['BACH_GUJA_TOTAL']."</td>";
		 					echo "<td>".$row['BACH_GUTA_TOTAL']."</td>";
		 					echo "<td>".$row['BACH_SATU_ID']."</td>";
		 					echo "<td>".$row['BACH_BAPA_ID']."</td>";
		 					echo "<td>".$row['BACH_TIMESTAMP']."</td>";
		 					echo "<td><a href='".base_url()."c_barangChild/FormUpdate/".$row['BACH_ID']."'>Edit</a></td>";
		 					echo "<td><a href='".base_url()."c_barangChild/delete/".$row['BACH_ID']."'>Delete</a></td>";
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



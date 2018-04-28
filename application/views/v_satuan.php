<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-info">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Satuan</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url(). 'c_satuan/form'; ?>" method="POST">
	              <div class="form-group">
	                  <label class=" control-label">Satuan</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" type="text" placeholder="Satuan .." name="txtsatuan" required placeholder="0">  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-10">
	                    <button type="reset" class="btn btn-default pull-right">Cancel</button>
	                  </div>
	                  <div class="col-md-2">
	                    <button type="submit" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()" >Input Data</button>
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
	    <div class="box box-info">
	      <div class="box-header with-border">
	        <h3 class="box-title">Data Satuan</h3>

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
						<th>satuan</th>
							<th>satuan id</th>
							<th style="text-align: center" colspan="2">Action </th>
					</tr>
				</thead>
				<tbody>
				  <?php 
				  $no = 1;
				  foreach ($satuan as $row) {
	 					echo "<tr>";
	 					echo "<td>".$no."</td>";
	 					echo "<td>".$row['SATU_NAME']."</td>";
	 					echo "<td>".$row['SATU_ID']."</td>";
	 					echo "<td><a href='".base_url()."c_satuan/FormUpdate/".$row['SATU_ID']."'>Edit</a></td>";
	 					echo "<td><a href='".base_url()."c_satuan/delete/".$row['SATU_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
	 					echo "</tr>";
	 				$no++;
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

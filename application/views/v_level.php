<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Level</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url(). 'c_level/form'; ?>" method="POST">
	              <div class="form-group">
	                  <label class=" control-label">Level</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" type="text" placeholder="Level .." name="txtlevel" required placeholder="0">  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	                <div class="row">
	                  <div class="col-md-10">
	                    <button type="reset" class="btn btn-default pull-right">Cancel</button>
	                  </div>
	                  <div class="col-md-2">
	                    <button type="submit" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()" >Input Level</button>
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
	        <h3 class="box-title">Data Level</h3>

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
						<th>level</th>
						<th style="text-align: center">Action </th>
					</tr>
				</thead>
				<tbody>
					<?php 
		 				foreach ($level as $row) {
		 					echo "<tr>";
		 					echo "<td>".$row['LEVE_ID']."</td>";
		 					echo "<td>".$row['LEVE_NAME']."</td>";
		 					echo "<td><a href='".base_url()."c_level/FormUpdate/".$row['LEVE_ID']."'>Edit</a> | 
		 						<a href='".base_url()."c_level/delete/".$row['LEVE_ID']."'>Delete</a></td>";
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
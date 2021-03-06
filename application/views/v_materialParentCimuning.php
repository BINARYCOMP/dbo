 <!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-info">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Material Parent Cimuning</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url(). 'c_materialParentCimuning/form'; ?>" method="POST">
	              <div class="form-group">
	                  <label class=" control-label">Input Material Parent Cimuning</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" type="text" name="txtnama"   
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
	        <h3 class="box-title">Data Material Parent Cimuning</h3>

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
						<th>Nama Material Parent</th>
						<th>Waktu</th>	
						<th>Action </th>
					</tr>
				</thead>
				<tbody>
				  <?php 
				  $no = 1;
				  foreach ($paci as $row) {
				    ?>
				      <tr>
				        <td><?php echo $no ?></td>
				        <td><?php echo $row['MPCI_NAME']?></td>
				        <td><?php echo $row['MPCI_TIMESTAMP']?></td>
				        <td>
				        	<a href="<?php echo base_url()?>c_materialParentCimuning/FormUpdate/<?php echo $row['MPCI_ID']?>">Edit</a> | 
				        	<a href="<?php echo base_url()?>c_materialParentCimuning/delete/<?php echo $row['MPCI_ID']?>">Delete</a>
				        </td>
				      </tr>
				    <?php
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
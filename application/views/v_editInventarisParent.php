<!-- Main content -->	  
<div class="content">
	<div class="row">
	  <div class="col-md-12">
	    <div class="box box-info">
	      <div class="box-header with-border">
	        <h3 class="box-title">Edit Inventaris Parent</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url ()?>c_inventarisParent/UpdateData/<?php  echo $inventarisParent[0]['INPA_ID'] ?>" method="post">
	              <div class="form-group">
	                  <label class=" control-label">Nama Inventaris</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" type="text"  required="true" name="txtnama" value="<?php echo($inventarisParent[0]['INPA_NAME'])?>" >  
	                    </span>
	                  </div>
	              </div>
				<div class="form-group">
				  <label class=" control-label">Kategori Gudang</label>
				  <div>
				    <span id="qty">
				      <select name="cmbKategori" class="form-control" required="true">
				      <?php
				      	if ($inventarisParent[0]['INPA_KETERANGAN'] == 'BAWANG') {
				      		?>
				      		<option selected="true">BAWANG</option>
				      		<?php
				      	}else{
					      	?>
					      	<option selected="true">CIMUNING</option>
					      	<?php	
				      	}
				      ?>
				      </select>
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
	      <!-- /.box -->
	  </div> <!-- col-input -->
	</div>
</div>
<!-- /.content -->
<!-- Main content -->	  
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Edit Inventaris Child</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url()?>c_inventarisChild/UpdateData/<?php  echo $inventarisChild[0]['INCH_ID'] ?>" method="post">
	            	<div class="form-group">
	                  <label class=" control-label"></label>
	                  <div>
	                  	<select class="form-control" name="txtParent">
		                      <option>=== Pilih Parent ===</option>
		                      <?php
			 					foreach ($inventaris_parent as $row) {
			 						echo "<option value ='".$row['INPA_ID']."'> ".$row['INPA_NAME']." </option>";
			 					}
			 				?>
	                    </select>
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class=" control-label">Nama Barang</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" type="text"  required="true" name="txtnama" value="<?php echo($inventarisChild[0]['INCH_NAME'])?>" >  
	                    </span>
	                  </div>
	              </div>
	               <div class="form-group">
	                  <label class=" control-label">QTY Barang</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" type="text"  required="true" name="txtqty" value="<?php echo($inventarisChild[0]['INCH_QTY'])?>" >  
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
	      <!-- /.box -->
	  </div> <!-- col-input -->
	</div>
</div>
<!-- /.content -->
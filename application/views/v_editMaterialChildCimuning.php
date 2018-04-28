<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Material Cimuning Child</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url ()?>c_materialChildCimuning/UpdateData/<?php  echo $cimuning_child[0]['MCCI_ID'] ?>" method="POST">
	              <div class="form-group">
	                  <label class=" control-label">Material Induk</label>
	                  <div>
	                    <select name="txtparent" id="cmbparent" class="form-control">
						  <option value="0">== Pilih Material Induk ==</option>
						  <?php 
						    foreach ($cimuning_Parent as $row){
						      echo "<option value='".$row['MPCI_ID']."'>";
						      echo $row ['MPCI_NAME'];
						     echo "</option>";
						    }
						  ?>
						</select>  
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class=" control-label">Nama Material Anak</label>
	                  <div>
	                    <span >
	                      <input class="form-control" type="text"  name="txtnama" required="true">  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	              	<label class=" control-label">Pilih Satuan</label>
	                  <select name="txtsatuan" id="cmbsatuan" class="form-control">
						  <option value="0">== Pilih Satuan ==</option>
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
	                  <label class=" control-label">Total</label>
	                  <div>
	                    <span >
	                      <input class="form-control" type="text"  name="txttotal" required="true">  
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



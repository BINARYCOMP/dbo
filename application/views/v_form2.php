<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Edit Data</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url ()?>C_form1/UpdateData/<?php  echo $dataUser[0]['USER_ID'] ?>" method="post">
	            	<div class="form-group">
					  <label class=" control-label">Username</label>
					  <div>
					    <span id="qty">
					      <input class="form-control" type="text"  name="txtusername" value="<?php echo($dataUser[0]['USER_NAME'])?>" >  
					    </span>
					  </div>
					</div>
					<div class="form-group">
					  <label class=" control-label">Password</label>
					  <div>
					    <span id="qty">
					     <input class="form-control" type="password"  name="txtpassword" >  
					    </span>
					  </div>
					</div>
					<div class="form-group">
					  <label class=" control-label">Nama Pegawai</label>
					  <div>
						<select name="cmbParent" onchange="showChild(this.value)" id="cmbParent" class="form-control">
						  <option value="0">== Pilih Pegawai ==</option>
						  <?php  
						    foreach ($dataPegawai as $row){
						    	if ($row['PEGA_ID'] == $dataUser[0]['USER_DAPE_ID']) {
									echo "<option selected='true' value='".$row['PEGA_ID']."'>";
									echo $row ['PEGA_NAME'];
						    	}else{
						    		echo "<option value='".$row['PEGA_ID']."'>";
							      	echo $row ['PEGA_NAME'];
						    	}
						     echo "</option>";
						    }
						  ?>
						</select>  
					  </div>
					</div>
					<div class="form-group">
					  <label >Level</label>
					  <div>
					      <select name="level" class="form-control">
		 					<?php  
			 					foreach ($dataLevel as $row){
			 						if ($row['LEVE_ID']==$dataUser[0]['USER_LEVE_ID']) {
			 							# code...
			 						echo "<option value='".$row['LEVE_ID']."' selected>";
			 						echo $row['LEVE_NAME'];
			 					 	echo "</option>";
			 						} else{
			 							echo "<option value='".$row['LEVE_ID']."'>";
				 						echo $row['LEVE_NAME'];
				 					 	echo "</option>";

			 						}
			 					}
		 					 ?>
		 				</select>
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
<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Data</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url(). 'C_form1/formRegister'; ?>"  method="post">
	              <div class="form-group">
	                  <label class=" control-label">Username</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" type="text"  name="txtusername" >  
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
	                  	<span id="qty">
	                      
							<select name="cmbParent" onchange="showChild(this.value)" id="cmbParent" class="form-control">
							  <option value="0">== Pilih Pegawai ==</option>
							  <?php  
							    foreach ($dataPegawai as $row){
							      echo "<option value='".$row['PEGA_ID']."'>";
							      echo $row ['PEGA_NAME'];
							     echo "</option>";
							    }
							  ?>
							</select>  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label >Level</label>
	                  <div>
	                      <select name="level" class="form-control">
		 					<?php  
		 					foreach ($dataLevel as $row){
		 						echo "<option value='".$row['LEVE_ID']."'>";
		 						echo $row ['LEVE_NAME'];
		 					 echo "</option>";
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
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Data User</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
			<table  class="table table-bordered table-hover table-striped" id="lookup">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Pegawai</th>
						<th>Username</th>
						<th>Level</th>	
						<th style="text-align: center" >Action </th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$no = 1;

	 				foreach ($dataUser as $row) {
	 					echo "<tr>";
	 					
	 					echo "<td>".$no++."</td>";
	 					echo "<td>".$row['PEGA_NAME']."</td>";
	 					echo "<td>".$row['USER_NAME']."</td>";
	 					echo "<td>".$row['USER_LEVE_ID']."</td>";
	 					echo "<td>
	 							<a href='".base_url()."C_form1/FormUpdate/".$row['USER_ID']."'>Edit</a> |
	 							<a  href='".base_url()."C_form1/Delete/".$row['USER_ID']."'>Delete</a>
	 						 </td>";

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
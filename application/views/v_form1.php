<div class="content-wrapper">
	<div class="row">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    	<h1>
		      <?php if(isset($title)) echo $title ?>
		      <small><i class="fa fa-info"></i></small>
		      <small><?php echo $_SESSION['level'] ?></small>
		    </h1>
	  </section>

	  <!-- Main content -->
	  <section class="content">
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
			            <form action="<?=base_url()?>C_form1/FormRegister" method="post">
			              <div class="form-group">
			                  <label class=" control-label">Username</label>
			                  <div>
			                    <span id="qty">
			                      <input class="form-control" type="text"  name="txtusername" >  
			                    </span>
			                  </div>
			                  <label class=" control-label">Password</label>
			                  <div>
			                    <span id="qty">
			                      <input class="form-control" type="password"  name="txtpassword" >  
			                    </span>
			                  </div>
			                  <label class=" control-label">ID Pegawai</label>
			                  <div>
			                    <span id="qty">
			                      <input class="form-control" type="text"  name="txtidpegawai" >  
			                    </span>
			                  </div>
			                  <label class=" control-label">Level</label>
			                  <div>
			                    <span id="qty">
			                      <select name="level">
				 					<?php  
				 					foreach ($dataLevel as $row){
				 						echo "<option value='".$row['LEVE_ID']."'>";
				 						echo $row ['LEVE_NAME'];
				 					 echo "</option>";
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
			                    <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()" >Input Data</button>
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
			        <h3 class="box-title">Data Agama</h3>

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
								<th>ID Pegawai</th>
								<th>Username</th>
								<th>Password</th>
								<th>Level</th>	
								<th style="text-align: center" colspan="2">Action </th>
							</tr>
						</thead>
						<tbody>
						<?php 
			 				foreach ($dataUser as $row) {
			 					echo "<tr>";
			 					
			 					echo "<td>".$row['USER_DAPE_ID']."</td>";
			 					echo "<td>".$row['USER_NAME']."</td>";
			 					echo "<td>".$row['USER_PASSWORD']."</td>";
			 					echo "<td>".$row['USER_LEVE_ID']."</td>";
			 					echo "<td><a href='".base_url()."C_form1/FormUpdate/".$row['USER_ID']."'>Edit</a></td>";
			 					echo "<td><a href='".base_url()."C_form1/Delete/".$row['USER_ID']?>"'>Delete</a></td>;
			 					<?php 
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
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.row -->
</div>
<!-- /.content-wrapper -->


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?=base_url()?>C_form1/FormRegister" method="post">
 		<table>
 		<tr>
 			<th>Register</th>
 		</tr>
 		<tr>
 			<td>Username</td>
 			<td><input type="text" name="txtusername"></td>
 		</tr>
 		<tr>
 			<td>Password</td>
 			<td><input type="password" name="txtpassword"></td>
 		<tr>
 			<td>ID Pegawai</td>
 			<td><input type="text" name="txtidpegawai"></td>
 		</tr>
 		</tr>
 		<tr>
 			<td>Level</td>
 			<td><select name="level">
 					<?php  
 					foreach ($dataLevel as $row){
 						echo "<option value='".$row['LEVE_ID']."'>";
 						echo $row ['LEVE_NAME'];
 					 echo "</option>";
 					}
 					 ?>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table >
 		<br>
 		<br>
 		<table border="">
 			
 			<tr>
 				
 				<td>ID Pegawai</td>
 				<td>Username</td>
 				<td>Password</td>
 				<td>Level</td>
 			</tr>
 			<?php 
 				foreach ($dataUser as $row) {
 					echo "<tr>";
 					
 					echo "<td>".$row['USER_DAPE_ID']."</td>";
 					echo "<td>".$row['USER_NAME']."</td>";
 					echo "<td>".$row['USER_PASSWORD']."</td>";
 					echo "<td>".$row['USER_LEVE_ID']."</td>";
 					echo "<td><a href='".base_url()."C_form1/FormUpdate/".$row['USER_ID']."'>Edit</a></td>";
 					echo "<td><a href='".base_url()."C_form1/Delete/".$row['USER_ID']?>"'>Delete</a></td>;
 					<?php 
 			 		echo "</tr>";
 				}
 			 ?>
 		</table>
 		

 	</form>
 
 </body>
 </html>
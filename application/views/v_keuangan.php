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
			        <h3 class="box-title">Input Keuangan</h3>

			        <div class="box-tools pull-right">
			          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
			      </div>
			      <!-- /.box-header -->
			      <div class="box-body">
			        <div class="row">
			          <div class="col-md-12 ">
			            <form action="<?php echo base_url().'c_keuangan/simpan'; ?>" method="POST">
			              <div class="form-group">
			                  <label class=" control-label">Tanggal</label>
			                  <div>
			                    <span >
			                      <input class="form-control" type="date" placeholder="Tanggal" name="dtmTanggal" required="true">  
			                    </span>
			                  </div>
			                  <label class=" control-label">Uraian</label>
			                  <div>
			                    <span >
			                      <textarea class="form-control" name="txtUraian" required="true"></textarea> 
			                    </span>
			                  </div>
			                  <label class=" control-label">Debet</label>
			                  <div>
			                    <span >
			                      <input class="form-control" type="number" placeholder="" name="txtDebet" id="masuk">  
			                    </span>
			                  </div>
			                  <label class=" control-label">Kredit</label>
			                  <div>
			                    <span >
			                      <input class="form-control" type="number" placeholder="" name="txtKredit" id="keluar">  
			                    </span>
			                  </div>
			                  <label class=" control-label">Saldo</label>
			                  <div>
			                    <span >
			                      <input class="form-control" type="number" placeholder="" disabled="true" name="txtSaldo" id="saldoAkhir">  
			                    </span>
			                  </div>
			                  <div>
			                    <span >
			                      <input type="hidden" disabled="true" name="txtSaldo" id="saldoAkhir">  
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
			    <div class="box box-warning">
			      <div class="box-header with-border">
			        <h3 class="box-title">Data Keuangan</h3>

			        <div class="box-tools pull-right">
			          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
			      </div>
			      <!-- /.box-header -->
			      <div class="box-body">
					<table class="table table-bordered table-hover table-striped" id="lookup">
						<thead>
							<tr>
								<td>Tanggal</td>
				 				<td>Uraian</td>
				 				<td>Debet</td>
				 				<td>Kredit</td>
				 				<td>Saldo</td>
								<th style="text-align: center" >Action </th>
							</tr>
						</thead>
						<tbody>
						 <?php  
			 			 	foreach($keuangan as $row){
			 			  ?>	
			 			  	<tr>
			 			  		<td><?php echo $row['KEUA_TANGGAL']; ?></td>
			 			  		<td><?php echo $row['KEUA_RINCIAN']; ?></td>
			 			  		<td><?php echo $row['KEUA_MASUK']; ?></td>
			 			  		<td><?php echo $row['KEUA_KELUAR']; ?></td>
			 			  		<td><?php echo $row['KEUA_SALDO']; ?></td>
			 			  		<td>
			 			  			<a href="<?php echo base_url().'c_keuangan/formUpdate/'.$row['KEUA_ID']; ?>">Edit</a> | 
			 			  			<a href="<?php echo base_url().'c_keuangan/delete/'.$row['KEUA_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
			 			  		</td>
			 			  			
			 			  	</tr>
			 			 <?php 
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


<form action="<?php echo base_url().'c_keuangan/simpan'; ?>" method="post">
	Tanggal <input type="date" name="dtmTanggal" required="true"> <br>
	Uraian	<textarea name="txtUraian" required="true"></textarea><br>
	Debet	<input type="number" name="txtDebet" id="masuk"><br>
	Kredit	<input type="number" name="txtKredit" id="keluar"><br>
	Saldo	<input type="number" disabled="true" name="txtSaldo" id="saldoAkhir"><br>
	<input type="hidden" disabled="true" name="txtSaldo" id="saldoAkhir">
	<input type="submit" name="btnSubmit" value="Simpan">




	<table border="1">
 			<tr>
 				<td>Tanggal</td>
 				<td>Uraian</td>
 				<td>Debet</td>
 				<td>Kredit</td>
 				<td>Saldo</td>
 			</tr>

 			 <?php 
 			 	foreach($keuangan as $row){
 			  ?>
 			  	<tr>
 			  		<td><?php echo $row['KEUA_TANGGAL']; ?></td>
 			  		<td><?php echo $row['KEUA_RINCIAN']; ?></td>
 			  		<td><?php echo $row['KEUA_MASUK']; ?></td>
 			  		<td><?php echo $row['KEUA_KELUAR']; ?></td>
 			  		<td><?php echo $row['KEUA_SALDO']; ?></td>
 			  		<td><a href="<?php echo base_url().'c_keuangan/formUpdate/'.$row['KEUA_ID']; ?>">Edit</a></td>
 			  		<td><a href="<?php echo base_url().'c_keuangan/delete/'.$row['KEUA_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
 			  	</tr>
 			 <?php 
 			  	}
 			  ?>
 		</table>
</form>
<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-info">
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
	              </div>
	              <div class="form-group">
	                  <label class=" control-label">Uraian</label>
	                  <div>
	                    <span >
	                      <textarea class="form-control" name="txtUraian" required="true"></textarea> 
	                    </span>
	                  </div> 	
	              </div>
	              <div class="form-group">
	                  <label class=" control-label">Debet</label>
	                  <div>
	                    <span >
	                      <input class="form-control" type="number" onkeyup="saldo('masuk')" placeholder="" name="txtDebet" id="masuk">  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class=" control-label">Kredit</label>
	                  <div>
	                    <span >
	                      <input class="form-control" type="number" onkeyup="saldo('keluar')" placeholder="" name="txtKredit" id="keluar">  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class=" control-label">Saldo</label>
	                  <div class="row">
	                  	<div class="col-md-6">
                  			<input type="text" class="form-control" readonly="true" name="txtSaldoAwal" value=" <?php echo $saldoAkhir?> " >  
                  		</div>
                  		<div class="col-md-6">
                    		<input type="text" class="form-control" readonly="true" name="txtSaldoAkhir" id="saldoAkhirMuncul" >  
                  		</div>
	                  </div>
	              </div>
                  <div class="form-group">
                  		<div class="col-md-6">
                  			<input type="hidden"  readonly="true" name="txtSaldoAwalAsli" value="<?php echo $saldoAkhir ?>" id="saldoAwal">  
                  		</div>
                  		<div class="col-md-6">
                    		<input type="hidden" readonly="true" name="txtSaldoAkhirAsli" id="saldoAkhir">  
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
	        <h3 class="box-title">Data Keuangan</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
			<div class="col-md-12">
				<table class="table table-bordered table-hover table-striped" id="lookup">
					<thead>
						<tr>
							<th>Tanggal</th>
			 				<th>Uraian</th>
			 				<th>Debet</th>
			 				<th>Kredit</th>
			 				<th>Saldo</th>
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
		 			  		<td class="right"><?php echo $row['KEUA_MASUK']; ?></td>
		 			  		<td class="right"><?php echo $row['KEUA_KELUAR']; ?></td>
		 			  		<td class="right"><?php echo $row['KEUA_SALDO']; ?></td>
		 			  		<td class="center">
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
	    </div>
	      <!-- /.box -->
	  </div> <!-- col-input -->
	</div>
</div>
<!-- /.content -->
<script type="text/javascript">
	function saldo(id) {
		var masuk,keluar,rumus,awal; 
		if (id == 'masuk') {
			masuk 	= document.getElementById('masuk').value;
			document.getElementById('keluar').value = 0;
			keluar  = document.getElementById('keluar').value;;
		}else if (id == 'keluar') {
			keluar  = document.getElementById('keluar').value;;
			document.getElementById('masuk').value = 0;
			masuk  = document.getElementById('masuk').value;;
		}
		awal 	= document.getElementById('saldoAwal').value;
		rumus 	= parseInt(awal)  + parseInt(masuk) - parseInt(keluar);
		document.getElementById('saldoAkhirMuncul').value = rumus;
		document.getElementById('saldoAkhir').value = rumus;
		
	}
</script>
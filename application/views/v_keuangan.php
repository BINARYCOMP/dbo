<!-- Main content -->
<div class="content">
	<div class="row">
	  <?php
	  	if ($_SESSION['level'] == 'KEUANGAN' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN' ) {
	  		?>
	  		<div class="col-md-12">
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
	                        <label class="control-label">Nama Perusahaan</label>
	                        <div class="input-group autocomplete">
	                          <!-- /btn-group -->
	                          <input id="myInput" class="form-control" type="text" name="txtPerusahaanMuncul"  placeholder="== Pilih Perusahaan ==">
	                          <input class="form-control" id="txtPerusahaan" type="hidden" name="txtPerusahaan">
	                          <div class="input-group-btn">
	                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalRekening">Search</button>
	                          </div>
	                        </div>
	                      </div>
	                      <div class="form-group">
			                  <label class=" control-label">Nomor Rekening</label>
			                  <div>
			                    <span >
			                      <input class="form-control" type="number" placeholder="Nomor Rekening" id="noRek" name="txtNorek">  
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
	  		<?php
	  	}
	  	if ($_SESSION['level'] != 'KEUANGAN' || $_SESSION['level'] != 'SUPER ADMIN' || $_SESSION['level'] != 'OWNER') {
	  		echo '<div class="col-md-12">';
	  	}else{
	  		echo '<div class="col-md-6">';
	  	}
	  ?>
<!--'<div class="col-md-6">'; (itu di atas di echo) -->		
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
			 				<?php
			 				if ($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN' ) {
			 					?>
									<th style="text-align: center" >Action </th>
			 					<?php
			 				}
			 				?>
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
		 			  		<?php
			 			  		if ($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN' ) {
				 					?>
					 			  		<td class="center">
					 			  			<a href="<?php echo base_url().'c_keuangan/delete/'.$row['KEUA_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
					 			  		</td>
					 			  	<?php
			 				}
			 				?>	
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

<div class="modal fade" id="modalRekening" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Data Perusahaan</h4>
            </div>
            <div class="modal-body">
                <table id="gujaParent" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomo Telepon</th>
                        <th>Nomor Rekening</th>
                      </tr>
                    </thead>        
                    <tbody>
                      <?php 
                      $no=1;
                      foreach ($dataPerusahaan as $row) {
                        ?>
                          <tr class="isi" style="cursor: pointer;" data-norek="<?php echo $row['PERU_NOMORREKENING']; ?>" data-perusahaan="<?php echo $row['PERU_NAME']; ?>">
                            <td><?php echo $no?></td>
                            <td><?php echo $row['PERU_NAME']?></td>
                            <td><?php echo $row['PERU_ALAMAT']?></td>
                            <td><?php echo $row['PERU_NOMORHP']?></td>                            
                            <td><?php echo $row['PERU_NOMORREKENING']?></td>
                          </tr>
                        <?php
                        $no++;
                      }
                      ?>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
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
<script type="text/javascript">
  function showPerusahaan() {
      $.ajax({
          type: "GET",
          url: "<?php echo base_url()?>c_keuangan/putRekening/",
          success: function(html) {
            $("#rekening").html(html);
          }
      });
    }
    $(document).on('click', '.isi', function (e) {
		document.getElementById("txtPerusahaan").value 	= $(this).attr('data-perusahaan');
        document.getElementById("myInput").value 		= $(this).attr('data-id');
        document.getElementById("noRek").value 			= $(this).attr('data-norek');
        $('#myModal').modal('hide');        
    });
</script>
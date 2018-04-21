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
			  <div class="col-md-6 ">
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
			            <form action="<?php echo base_url(). 'c_keuangan/update/' .$keuangan[0]['KEUA_ID']; ?>" method="POST">
			              <div class="form-group">
			                  <label class=" control-label">Tanggal</label>
			                  <div>
			                    <span >
			                      <input class="form-control" type="date" placeholder="Tanggal" name="dtmTanggal" required="true" value="<?php echo($keuangan[0]['KEUA_TANGGAL'])?>">  
			                    </span>
			                  </div>
			                  <label class=" control-label">Uraian</label>
			                  <div>
			                    <span >
			                      <textarea class="form-control" name="txtUraian" required="true" ><?php echo($keuangan[0]['KEUA_RINCIAN'])?></textarea> 
			                    </span>
			                  </div>
			                  <label class=" control-label">Debet</label>
			                  <div>
			                    <span >
			                      <input class="form-control" name="txtDebet" value="<?php echo($keuangan[0]['KEUA_MASUK'])?>">  
			                    </span>
			                  </div>
			                  <label class=" control-label">Kredit</label>
			                  <div>
			                    <span >
			                      <input class="form-control" name="txtKredit" value="<?php echo($keuangan[0]['KEUA_KELUAR'])?>">  
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
			                    <button type="submit"  name="btnSubmit" value="Simpan" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()" >Input Data</button>
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
			  
			</div>
		</div>
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.row -->
</div>
<!-- /.content-wrapper -->






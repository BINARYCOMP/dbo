<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-info">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Anak Barang</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url(). 'c_barangChildCimuning/UpdateData/' .$barangChildCimuning[0]["BACC_ID"]; ?>" method="POST">
	              	<div class="form-group">
	                  <label class=" control-label">Nama Barang Child</label>
	                  <div>
	                    <span >
	                      <input class="form-control" type="text"  name="txtnama" required="true" value="<?php echo($barangChildCimuning[0]['BACC_NAME'])?>">  
	                    </span>
	                  </div>
	                  <div class="form-group">
		                    <label class=" control-label">Satuan</label>
		                    <div>
		                        <!-- /btn-group -->
		                        <select name="txtsatuan" class="form-control">
		                          <option value="0">== Pilih Satuan ==</option>
		                          <?php  		                       
		                            foreach ($satuan as $row){

		                              if ($row['SATU_ID'] == $barangChildCimuning[0]['BACC_SATU_ID']){
		                                ?>
		                                <option value="<?php echo $row['SATU_ID'] ?>" selected><?php echo $row['SATU_NAME']?></option>
		                                <?php
		                              } else {                               
		                                ?>
		                                <option value="<?php echo $row['SATU_ID'] ?>" ><?php echo $row['SATU_NAME']?></option>
		                                <?php
		                              }
		                              
		                            }
		                          ?>
		                        </select>
		                    </div>
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

<script type="text/javascript">

//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
    $(document).on('click', '.search', function (e) {
        // alert("test");

        // parent
        document.getElementById("cmbBapa").value = $(this).attr('data-brgParent');
        $('#myModalChild').modal('hide');

    });
</script>
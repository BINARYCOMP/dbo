<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-info">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Inventaris Child</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form action="<?php echo base_url(). 'c_inventarisChild/save'; ?>" method="POST">
				 <div class="form-group">
					  <label class="control-label">Nama Inventaris Parent</label>
					  <div class="input-group">
					    <!-- /btn-group -->
					    <select name="txtParent" id="cmbParent" class="form-control">
					      <option value="0">== Pilih Inventaris Barang ==</option>
					      <?php  
					        foreach ($inventaris_parent as $row) {
			 						echo "<option value ='".$row['INPA_ID']."'> ".$row['INPA_NAME']." </option>";
					        }
					      ?>
					    </select> <br>
					    <div class="input-group-btn">
					      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalInven">Search</button>
					    </div>
					  </div>
					</div>
	              <div class="form-group">
	                  <label class=" control-label">Nama Inventaris Child</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" required="true" type="text" name="txtNama">  
	                    </span>
	                  </div>
	              </div>
	               <div class="form-group">
	                  <label class=" control-label">Jumlah</label>
	                  <div>
	                    <span id="qty">
	                      <input class="form-control" required="true" type="number" name="txtQty">  
	                    </span>
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
	        <h3 class="box-title">Data Inventaris Parent</h3>

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
							<th>Induk Inventaris</th>
							<th>nama inventaris</th>
							<th>Jumlah Inventaris</th>
							<th>Tanggal Di tambahkan</th>	
						<th style="text-align: center" >Action </th>
					</tr>
				</thead>
				<tbody>
				  <?php 
				  $no=1;
				  foreach ($inventaris_child as $row) {
				    ?>
				      <tr>
				      	<td><?php echo $no?></td>  
						<td><?php echo $row['INPA_NAME']?></td>
				        <td><?php echo $row['INCH_NAME']?></td>
						<td><?php echo $row['INCH_QTY']?></td>
						<td><?php echo $row['INCH_TIME']?></td>
				        <td>
				        	<a href="<?php echo base_url()?>c_inventarisChild/FormUpdate/<?php echo $row['INCH_ID']?>">Edit</a> |
				        	<a href="<?php echo base_url()?>c_inventarisChild/delete/<?php echo $row['INCH_ID']?>" onclick= "return confirm('Are you sure?')">Delete</a>
				        </td>
				      </tr>
				    <?php
				    $no++;
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

<!-- modal  parent -->
<div class="modal fade" id="myModalInven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Barang Parent</h4>
            </div>
            <div class="modal-body">
                <table id="invenChild" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Barang Parent</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach ($inventaris_parent as $row) {
                        ?>
                          <tr class="search" data-invenParent="<?php echo $row['INPA_ID']; ?>">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['INPA_NAME']?></td>
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

//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
    $(document).on('click', '.search', function (e) {
        // alert("test");

        // parent
        document.getElementById("cmbParent").value = $(this).attr('data-invenParent');
        $('#myModalInven').modal('hide');

    });
</script>
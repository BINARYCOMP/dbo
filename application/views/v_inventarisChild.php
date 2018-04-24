<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Inventaris Parent</h3>

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
	                  <label class=" control-label"></label>
	                  <div>
	                  	<select class="form-control" name="txtParent">
		                      <option>=== Pilih Parent ===</option>
		                      <?php
			 					foreach ($inventaris_parent as $row) {
			 						echo "<option value ='".$row['INPA_ID']."'> ".$row['INPA_NAME']." </option>";
			 					}
			 				?>
	                    </select>
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
	                      <input class="form-control" required="true" type="text" name="txtQty">  
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
						<th>nama inventaris</th>
							<th>ID inventaris</th>
							<th>Jumlah Inventaris</th>
							<th>Induk Inventaris</th>
							<th>Tanggal Di tambahkan</th>	
						<th style="text-align: center" >Action </th>
					</tr>
				</thead>
				<tbody>
				  <?php 
				  foreach ($inventaris_child as $row) {
				    ?>
				      <tr>   
				        <td><?php echo $row['INCH_NAME']?></td>
				        <td><?php echo $row['INCH_ID']?></td>
						<td><?php echo $row['INCH_QTY']?></td>
						<td><?php echo $row['INPA_NAME']?></td>
						<td><?php echo $row['INCH_TIME']?></td>
				        <td>
				        	<a href="<?php echo base_url()?>c_inventarisChild/FormUpdate/<?php echo $row['INCH_ID']?>">Edit</a> |
				        	<a href="<?php echo base_url()?>c_inventarisChild/delete/<?php echo $row['INCH_ID']?>" onclick= "return confirm('Are you sure?')">Delete</a>
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
<!-- /.content -->

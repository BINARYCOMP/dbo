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
			        <h3 class="box-title">Input Agama</h3>

			        <div class="box-tools pull-right">
			          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
			      </div>
			      <!-- /.box-header -->
			      <div class="box-body">
			        <div class="row">
			          <div class="col-md-12 ">
			            <form action="<?php echo base_url(). 'c_viewAgama/UpdateData/' .$agama[0]["AGAM_ID"]; ?>" method="POST">
			              <div class="form-group">
			                  <label class=" control-label">Agama</label>
			                  <div>
			                    <span id="qty">
			                      <input class="form-control" type="text" placeholder="Agama .." name="txtagama" required placeholder="0" value="<?php echo($agama[0]['AGAM_NAME'])?>">  
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
	<title>update</title>
</head>
<body>
	
	 	<form action="<?php echo base_url(). 'c_viewAgama/UpdateData/' .$agama[0]["AGAM_ID"]; ?>" method="post">
 		<table>
 		<tr>
 			<th>edit</th>
 		</tr>
 		<tr>
 			<td>agama</td>
 			<td><input type="text" name="txtagama" value="<?php echo($agama[0]['AGAM_NAME'])?>"></td>
 		</tr>
 		
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" name="submit" value="Simpan"></td>
 		</tr>

 		</table>

</body>
</html>
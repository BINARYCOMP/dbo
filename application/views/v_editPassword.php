<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-info">
	      <div class="box-header with-border">
	        <h3 class="box-title">Edit Password</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form name="GantiPassword" action="<?php echo base_url ()?>C_profil/GantiPassword/?>" method="post">
	            	<div>
	                <div class="form-group">
						  <label class=" control-label">New Password</label>
						  <div>
						    <span id="qty">
						     <input class="form-control" type="password"  name="newPassword" class="txtField" id="newPassword"  required>  
						    </span>
						  </div>
						</div>
					<div class="form-group">
						  <label class=" control-label">Confirm Password</label>
						  <div>
						    <span id="qty">
						     <input class="form-control" type="password"  name="ConfirmPassword" onchange="isPasswordMatch();" id="confirmPassword"  required>
						     <div id="divCheckPassword"></div>
						    </span>
						  </div>
						</div>
		            <div class="form-group">
		                <div class="row">
		                  <div class="col-md-10">
		                    <button type="reset" class="btn btn-default pull-right">Cancel</button>
		                  </div>
		                  <div class="col-md-2">
		                    <button type="submit" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-success2" onclick="validatePassword()" id="submitPassword">GantiPassword</button>
		                  </div>
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
	function isPasswordMatch() {
	    var password = $("#newPassword").val();
	    var confirmPassword = $("#confirmPassword").val();

	    if (password != confirmPassword)
	    { 
	    	$("#divCheckPassword").html("Password tidak Sama");
	    	$('#submitPassword').prop('disabled', true);
	    }else 
	    {
	    	$("#divCheckPassword").html("Password Sama");
	    	$('#submitPassword').prop('disabled', false);
	    }
	}

	$(document).ready(function () {
	    $("#confirmPassword").keyup(isPasswordMatch);
	});
</script>
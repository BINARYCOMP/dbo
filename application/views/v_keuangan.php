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
	                        <label class="control-label">Nama Vendor</label>
	                        <div class="input-group autocomplete">
	                          <!-- /btn-group -->
	                          <input id="myInput" class="form-control" required="true" type="text" name="txtPerusahaanMuncul"  placeholder="== Pilih Perusahaan ==">
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
			                      <input readonly="true" class="form-control" type="number" placeholder="Nomor Rekening" id="noRek" name="txtNorek">  
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
			                      <input class="form-control" type="number" onkeyup="saldo()" value="0" placeholder="" name="txtDebet" id="masuk">  
			                    </span>
			                  </div>
			              </div>
			              <div class="form-group">
			                  <label class=" control-label">Kredit</label>
			                  <div>
			                    <span >
			                      <input class="form-control" type="number" onkeyup="saldo()" value="0" placeholder="" name="txtKredit" id="keluar">  
			                    </span>
			                  </div>
			              </div>
			              <div class="form-group">
			                  <label class=" control-label">Pajak</label>
			                  <div>
			                    	<select name="cmbPajak" onchange="saldo()" class="form-control" id="pajak">
			                    		<option value="0.1">PPN</option>
			                    		<option value="0.015">PPH</option>
			                    		<option selected value="0">Non-Pajak</option>
			                    	</select>
			                  </div>
			              </div>
			              <div class="form-group">
			                  <label class=" control-label">Saldo</label>
			                  <div class="row">
			                  	<div class="col-md-6">
		                  			<input type="text" class="form-control" readonly="true" name="txtSaldoAwal" value=" <?php echo $saldoAkhir?>" >  
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
				<table class="table table-bordered table-hover table-striped" id="urut">
					<thead>
						<tr>
							<th>Tanggal</th>
			 				<th>Uraian</th>
			 				<th>Nama Vendor</th>
			 				<th>Nomor Rekening</th>
			 				<th>Debet</th>
			 				<th>Kredit</th>
			 				<th>Pajak</th>
			 				<th>Sub Saldo</th>
			 				<th>Saldo</th>
			 				<?php
			 				if ($_SESSION['level'] == 'SUPER ADMIN' ) {
			 					?>
									<th style="text-align: center" >Action </th>
			 					<?php
			 				}
			 				?>
						</tr>
					</thead>
					<tbody>
					 <?php  
		 			 	$saldo 	  = 0;
		 			 	foreach($keuangan as $row){
		 			 		$rumus 		= $row['KEUA_MASUK'] - $row['KEUA_KELUAR'];
							$pajak 		= $rumus * $row['KEUA_PAJAK'];
							$hasil 		= $rumus - $pajak;
							$subTotal   = $hasil;
		 			 		$saldo = $saldo + $subTotal;
		 			 		
		 			 		if ($row['KEUA_PAJAK'] == '0.1') {
		 			 			$pajak = 'PPN';
		 			 		}else if ($row['KEUA_PAJAK'] == '0.015') {
		 			 			$pajak = 'PPH';
		 			 		}else{
		 			 			$pajak = 'NON-PAJAK';
		 			 		}
		 			  ?>	
		 			  	<tr>
		 			  		<td><?php echo $row['KEUA_TANGGAL']; ?></td>
		 			  		<td><?php echo $row['KEUA_RINCIAN']; ?></td>
		 			  		<td><?php echo $row['PERU_NAME']; ?></td>
		 			  		<td><?php echo $row['PERU_NOMORREKENING']; ?></td>
		 			  		<td class="right"><?php echo $row['KEUA_MASUK']; ?></td>
		 			  		<td class="right"><?php echo $row['KEUA_KELUAR']; ?></td>
		 			  		<td class="right"><?php echo $pajak ?></td>
		 			  		<td class="right"><?=$subTotal?></td>
		 			  		<td class="right"><?=$saldo?></td>
		 			  		<?php
			 			  		if ($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN' ) {
				 					?>
					 			  		<td class="center">
					 			  			<a href="<?php echo base_url().'c_keuangan/delete/'.$row['KEUA_ID']; ?>" onclick="return confirm('Apa anda yakin ?');">Delete</a>
					 			  			|
					 			  			<a href="<?php echo base_url().'c_keuangan/update_form/'.$row['KEUA_ID']; ?>"> Edit</a>
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
                <table id="lookup" class="table table-bordered table-hover table-striped">
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
                          <tr class="isi" style="cursor: pointer;" data-id = "<?=$row['PERU_ID']?>" data-norek="<?php echo $row['PERU_NOMORREKENING']; ?>" data-perusahaan="<?php echo $row['PERU_NAME']; ?>">
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
	function saldo() {
		var masuk=0,keluar=0,rumus,awal,pajak; 
		masuk 	= document.getElementById('masuk').value;
		keluar  = document.getElementById('keluar').value;;
		awal 	= document.getElementById('saldoAwal').value;
		pajak 	= document.getElementById('pajak').value;
		rumus 	= parseInt(masuk) - parseInt(keluar);
		pajak 	= rumus * pajak;
		rumus 	= rumus - pajak;
		rumus 	= rumus + parseInt(awal);
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
		document.getElementById("txtPerusahaan").value 	= $(this).attr('data-id');
        document.getElementById("myInput").value 		= $(this).attr('data-perusahaan');
        document.getElementById("noRek").value 			= $(this).attr('data-norek');
        $('#modalRekening').modal('hide');        
    });
</script>

<script type="text/javascript">
  function autocomplete(inp, arr,id, norek) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            b.innerHTML += "<input type='hidden' value='" + norek[i] + "'>";
            b.innerHTML += "<li type='none' value='" + id[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                document.getElementById("txtPerusahaan").value = this.getElementsByTagName("li")[0].value;
                document.getElementById('noRek').value = this.getElementsByTagName("input")[1].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
        });
  }

  /*An array containing all the country names in the world:*/

  var perusahaan = [ <?php 
                  foreach ($dataPerusahaan as $row){
                           
                            echo "'".$row ['PERU_NAME']."',";
                           
                          }
                  ?> 
                  ];
  var Id = [ <?php 
                  foreach ($dataPerusahaan as $row){
                           
                            echo "'".$row ['PERU_ID']."',";
                           
                          }
                  ?> 
                  ];
  var norek = [ <?php 
                  foreach ($dataPerusahaan as $row){
                           
                            echo "'".$row ['PERU_NOMORREKENING']."',";
                           
                          }
                  ?> 
                  ];

  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("myInput"), perusahaan, Id, norek);
</script>
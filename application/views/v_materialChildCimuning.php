<!-- Main content -->
<div class="content">
	<div class="row">
	  <div class="col-md-6">
	    <div class="box box-warning">
	      <div class="box-header with-border">
	        <h3 class="box-title">Input Material Cimuning Child</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
	        <div class="row">
	          <div class="col-md-12 ">
	            <form autocomplete="off" action="<?php echo base_url(). 'c_materialChildCimuning/form'; ?>" method="POST">
	              <div class="form-group autocomplete">
	                  <label class=" control-label">Material Induk</label>
	                  <div>
	                  	<input id="myInput" class="form-control" type="text" name="txtparentMuncul"  onchange="showChild(this.value)" placeholder="== Pilih Induk Barang ==">
	                  	<input class="form-control" id="cmbParent" type="hidden" name="txtparent">
	                  </div>
	              </div>
	              <div class="form-group">
	                  <label class=" control-label">Nama Material Anak</label>
	                  <div>
	                    <span >
	                      <input class="form-control" type="text"  name="txtnama" required="true">  
	                    </span>
	                  </div>
	              </div>
	              <div class="form-group">
	              	<label class=" control-label">Pilih Satuan</label>
	                  <select name="txtsatuan" id="cmbsatuan" class="form-control">
						  <option value="0">== Pilih Satuan ==</option>
						  <?php  
						    foreach ($satuan as $row){
						      echo "<option value='".$row['SATU_ID']."'>";
						      echo $row ['SATU_NAME'];
						     echo "</option>";
						    }
						  ?>
						</select>  
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
	        <h3 class="box-title">Data Material Child Cimuning</h3>

	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	        </div>
	      </div>
	      <!-- /.box-header -->
	      <div class="box-body">
			<table class="table table-bordered table-hover table-striped" id="lookup">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
		 				<th>Nama Material Induk</th>
		 				<th>Satuan Barang</th>
		 				<th>Waktu</th>
		 				<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
		 				foreach ($cimuning_child as $row) {
		 					echo "<tr>";
		 					echo "<td>".$no."</td>";
		 					echo "<td>".$row['MCCI_NAME']."</td>";
		 					echo "<td>".$row['MPCI_NAME']."</td>";
		 					echo "<td>".$row['SATU_NAME']."</td>";
		 					echo "<td>".$row['MCCI_TIMESTAMP']."</td>";
		 					echo "<td><a href='".base_url()."c_materialChildCimuning/FormUpdate/".$row['MCCI_ID']."'>Edit</a> | <a href='".base_url()."c_materialChildCimuning/delete/".$row['MCCI_ID']."'  onclick= 'return confirm(\"Are you sure?\")'>Delete</a></td>";
		 					echo "</tr>";
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


<script type="text/javascript">
    $(function () {
        $('#cimuning').dataTable( {
          "bSort": false
        } );
        $('#finance').dataTable( {
          "bSort": false,
          lengthChange: false,
          buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );
        table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    });

    function autocomplete(inp, arr,id) {
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
		          b.innerHTML += "<li type='none' value='" + id[i] + "'>";
		          /*execute a function when someone clicks on the item value (DIV element):*/
		          b.addEventListener("click", function(e) {
		              /*insert the value for the autocomplete text field:*/
		              inp.value = this.getElementsByTagName("input")[0].value;
		              document.getElementById("cmbParent").value = this.getElementsByTagName("li")[0].value;
		              showChild(this.getElementsByTagName("li")[0].value);
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

		var Parent = [ <?php 
	                foreach ($cimuning_Parent as $row){
	                         
	                          echo "'".$row ['MPCI_NAME']."',";
	                         
	                        }
	                ?> 
	                ];
		var Id = [ <?php 
		                foreach ($cimuning_Parent as $row){
		                         
		                          echo "'".$row ['MPCI_ID']."',";
		                         
		                        }
		                ?> 
		                ];

		/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
		autocomplete(document.getElementById("myInput"), Parent, Id);
</script>
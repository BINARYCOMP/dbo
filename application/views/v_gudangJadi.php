<form method="POST" autocomplete="off">      
  <!-- Main content -->
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border autocomplete">
            <h3 class="box-title">Input Stock Jadi</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="control-label">Parent</label>
                  <div class="input-group autocomplete">
                    <!-- /btn-group -->
                    <input id="myInput" class="form-control" type="text" name="cmbParent" onchange="showChild(this.value)" placeholder="== Pilih Induk Barang ==">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Search</button>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Child</label>
                    <div class="input-group">
                      <span id="txtChild">
                        <select class="form-control">
                          <option>== Pilih Anak Barang ==</option>
                        </select> 
                      </span>
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2" onclick="modalChildJadi()">Search</button>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Kategori</label>
                  <div class="input-group">
                    <!-- /btn-group -->
                    <select name="cmbKategori" onchange="showStok();" onmousemove="showStok();" id="cmbKategori" class="form-control">
                      <option value="0">== Pilih Kategori ==</option>
                      <?php  
                        foreach ($namaKategori as $row){
                          echo "<option value='".$row['KATE_ID']."'>";
                          echo $row ['KATE_NAME'];
                         echo "</option>";
                        }
                      ?>
                    </select> <br>
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalKategori">Search</button>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Nomor Gudang</label>
                  <div >
                    <!-- /btn-group -->
                    <select name="cmbRuangan" id="cmbRuangan"  class="form-control">
                      <option value="0">== Pilih Gudang ==</option>
                      <?php  
                        foreach ($dataRuangan as $row){
                          echo "<option value='".$row['RUAN_ID']."'>";
                          echo $row ['RUAN_NUMBER'];
                         echo "</option>";
                        }
                      ?>
                    </select> 
                  </div>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="txtUraian" class="form-control" id="keterangan" rows="3" placeholder="Keterangan barang.."></textarea>
                </div>

                <div class="form-group">
                    <label class=" control-label">Masuk</label>
                    <div>
                      <input type="number" name="txtMasuk" id="brgMasuk" onkeyup="showSaldo()" onclick="showSaldo()" value="0" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Keluar</label>
                    <div class="">
                      <input type="number" name="txtKeluar" id="brgKeluar" onkeyup="showSaldo()" onclick="showSaldo()" value="0" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label class=" control-label">Stock Awal</label>
                      <div>
                        <!-- <input type="text" class="form-control" name="" value=""> -->
                        <span id="txtStok"> 
                          <input type="text" name="txtSaldoAwal" required id="saldoAwal" readonly value="0" class="form-control">  
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class=" control-label">Stock Akhir</label>
                      <div>
                        <input type="number" readonly name="txtSaldoAkhir" id="saldoAkhir" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-10">
                      <button type="reset" class="btn btn-default pull-right">Cancel</button>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-success pull-right" type="button" data-toggle="modal" data-target="#modal-success" onclick="modalKonfirmasiJadi()" >Input Data</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
      </div>
</form>


<!-- modal konfirmasiJadi -->
<div class="modal modal-success fade" id="modal-success">
  <div class="modal-dialog" id="modalKonfirmasiJadi">
    
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:800px" id="modalChildJadi">

   </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- SCRIPT -->
<!-- javascript child -->
<script>
function showChild(str) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtChild").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url()?>c_gudangJadi/searchChild?q="+str, true);
  xhttp.send();   
}
</script>
<!-- javascript saldo Awal -->
<script>
function showStok() {
  var bachId = document.getElementById('cmbChild').value;
  var bapaId = document.getElementById('cmbParent').value;
  var kateId = document.getElementById('cmbKategori').value;

  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtStok").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url()?>c_gudangJadi/searchStok?kateId="+kateId+"&bachId="+bachId+"&bapaId="+bapaId, true);
  xhttp.send();   
}
</script>

<!-- javascript saldo Akhir -->
<script type="text/javascript">
  function showSaldo(){
    var saldoAwal = parseInt(document.getElementById("saldoAwal").value);
    var brgKeluar = parseInt(document.getElementById("brgKeluar").value);
    var brgMasuk  = parseInt(document.getElementById("brgMasuk").value);
    var saldoAkhir;
    saldoAkhir = saldoAwal + brgMasuk - brgKeluar;
    document.getElementById("saldoAkhir").value = parseInt(saldoAkhir);
  }
</script>

<!-- Modal ajax -->
<script>
  function modalKonfirmasiJadi() {
    var xhttp;
    var parent,child,kategori,keterangan,masuk,keluar,akhir;
    parent      = document.getElementById('cmbParent').value;
    child       = document.getElementById('cmbChild').value;
    kategori    = document.getElementById('cmbKategori').value;
    keterangan  = document.getElementById('keterangan').value;
    masuk       = document.getElementById('brgMasuk').value;
    keluar      = document.getElementById('brgKeluar').value;
    akhir       = document.getElementById('saldoAkhir').value;
    awal        = document.getElementById('saldoAwal').value;
    ruangan     = document.getElementById('cmbRuangan').value;
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalKonfirmasiJadi").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_gudangJadi/modalKonfirmasi?parent="+parent+"&child="+child+"&kategori="+kategori+"&keterangan="+keterangan+"&masuk="+masuk+"&keluar="+keluar+"&akhir="+akhir+"&awal="+awal+"&ruangan="+ruangan, true);
    xhttp.send();   
  }

  function modalChildJadi() {
    var xhttp;
    var parent;
    parent    = document.getElementById('cmbParent').value;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalChildJadi").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_gudangJadi/modalChild?parent="+parent, true);
    xhttp.send();
  }

</script>


<!-- modal  parent -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Barang Parent</h4>
            </div>
            <div class="modal-body">
                <table id="gujaParent" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        
                      </tr>
                    </thead>        
                    <tbody>
                      <?php 
                      $no=1;
                      foreach ($namaParent as $row) {
                        ?>
                          <tr class="isi" data-brgParent="<?php echo $row['BAPA_ID']; ?>">
                            <td><?php echo $no?></td>
                            <td><?php echo $row['BAPA_NAME']?></td>
                            
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

<!-- modal  kategori -->

<div class="modal fade" id="myModalKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Barang Parent</h4>
            </div>
            <div class="modal-body">
                <table id="gujaKategori" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        
                      </tr>
                    </thead>        
                    <tbody>
                      <?php 
                      $no=1;
                      foreach ($namaKategori as $row) {
                        ?>
                          <tr class="kate" data-namaKategori="<?php echo $row['KATE_ID']; ?>">
                            <td><?php echo $no?></td>
                            <td><?php echo $row['KATE_NAME']?></td>
                            
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

<!-- script -->
<script type="text/javascript">

//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
    $(document).on('click', '.isi', function (e) {
        // alert("test");

        // parent
        document.getElementById("cmbParent").value = $(this).attr('data-brgParent');
        $('#myModal').modal('hide');
        showChild($(this).attr('data-brgParent'));
        
    });

     $(document).on('click', '.isi2', function (e) {
        // alert("test");

        // child
        document.getElementById("cmbChild").value = $(this).attr('data-brgChild');
        $('#myModal2').modal('hide');
        showStok();
        

    });

    $(document).on('click', '.kate', function (e) {
        // alert("test");

        // child
        document.getElementById("cmbKategori").value = $(this).attr('data-namaKategori');
        $('#myModalKategori').modal('hide');
        showStok();
        

    });

function autocomplete(inp, arr) {
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
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
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
                foreach ($namaParent as $row){
                         
                          echo "'".$row ['BAPA_NAME']."',";
                         
                        }
                ?> 
                ];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), Parent);


</script>

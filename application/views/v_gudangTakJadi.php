
<!-- Main content -->
<section class="content">
  <div class="row">
      <!-- isi content -->

      <?php 
      if ($_SESSION['level'] == 'ADMIN BAWANG' || $_SESSION['level'] == 'ADMIN CIMUNING' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN') {
      ?>  
        <form action="" method="POST" autocomplete="off">  
          <div class="col-md-12">
                    <div class="box box-warning">
                      <div class="box-header with-border">
                        <h3 class="box-title">Input Stock Barang Setengah Jadi</h3>

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
                                <input id="myInputTakJadi" class="form-control" type="text" onchange="showChildTakJadi(this.value)" name="cmbParentMuncul"  placeholder="== Pilih Induk Barang ==">
                                <input class="form-control" id="cmbParentTakJadi" type="text" name="cmbParent">
                                <!-- /btn-group -->
                                <!-- <select name="cmbParent" id="cmbParentTakJadi" onchange="showChildTakJadi(this.value)" class="form-control">
                                  <option value="0">== Pilih Induk Barang ==</option>
                                  <?php  
                                    /* foreach ($namaParent as $row){
                                      echo "<option value='".$row['BAPA_ID']."'>";
                                      echo $row ['BAPA_NAME'];
                                     echo "</option>";
                                    } */
                                  ?>
                                </select> -->
                                <div class="input-group-btn">
                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalTakJadi">Search</button>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Child</label>
                                <div class="input-group">
                                  <!-- /btn-group -->
                                  <span id="txtChildTakJadi">
                                    <select name="cmbChild" id="cmbChildTakJadi" onclick="modalChildTakJadi(this.value)" class="form-control">
                                      <option>== Pilih Anak Barang ==</option>
                                    </select>
                                  </span>
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalTakJadi2" onclick="modalChildTakJadi()">Search</button>
                                  </div>
                                </div>
                            </div>

                        <div class="form-group">
                          <label class="control-label">Kategori</label>
                          <div class="input-group">
                            <!-- /btn-group -->
                            <select name="cmbKategori" onchange="showStokTakJadi();" onmousemove="showStokTakJadi();" id="cmbKategoriTakJadi" class="form-control">
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
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalKategori2">Search</button>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Nomor Gudang</label>
                          
                            <!-- /btn-group -->
                            <select name="cmbRuangan" id="cmbRuanganTakJadi"  class="form-control">
                              <option value="0">== Pilih Gudang ==</option>
                              <?php  
                                foreach ($dataRuangan as $row){
                                  echo "<option value='".$row['RUAN_ID']."'>";
                                  echo $row ['RUAN_NUMBER'];
                                 echo "</option>";
                                }
                              ?>
                            </select> <br>
                        </div>

                            <div class="form-group">
                              <label>Keterangan</label>
                              <textarea name="txtUraian" id="keteranganTakJadi" class="form-control" rows="3" placeholder="Keterangan barang ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">Masuk</label>
                                <div>
                                  <input type="number" name="txtMasuk" id="brgMasukTakJadi" onkeyup="showSaldoTakJadi()" onclick="showSaldoTakJadi()" value="0" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Keluar</label>
                                <div class="">
                                  <input type="number" name="txtKeluar" id="brgKeluarTakJadi" onkeyup="showSaldoTakJadi()" onclick="showSaldoTakJadi()" value="0" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-6">
                                  <label class=" control-label">Stock Awal</label>
                                  <div>
                                    <span id="txtStokTakJadi"> 
                                      <input type="text" name="txtSaldoAwal" required id="saldoAwalTakJadi" readonly value="0"  class="form-control">  
                                    </span>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label class=" control-label">Stock Akhir</label>
                                  <div>
                                    <input type="number" disabled name="txtsaldoAkhirTakJadi" id="saldoAkhirTakJadi" class="form-control">
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
                                  <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()" >Input Data</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box -->
                  </div> <!-- col-input -->
                </div>  <!-- /Main content -->
        </form>
  
      <?php
      }
      ?>
      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Gudang Setengah Jadi</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 ">
                <table class="table" id="guta">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Induk Barang</th>
                      <th>Anak Barang</th>
                      <th>Kategori</th>
                      <th>Keterangan</th>
                      <th>Masuk</th>
                      <th>Keluar</th>
                      <th>Saldo</th>
                      <?php
                        if($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN'){
                          ?> 
                            <th> Action </th>
                          <?php
                        }
                        ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($dataGudangTakJadi as $row) {
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row['BAPA_NAME']?></td>
                          <td><?php echo $row['BACH_NAME']?></td>
                          <td>
                            <?php 
                              $kategori = $this->m_gudangJadi->getKateNameByGujaKateId($row['GUTA_KATE_ID']);
                              if (isset($kategori[0]['KATE_NAME'])) {
                                echo $kategori[0]['KATE_NAME'];
                              }else{
                                echo "-";
                              }
                            ?>
                          </td>
                          <td><?php echo $row['GUTA_URAIAN']?></td>
                          <td><?php echo $row['GUTA_MASUK']?></td>
                          <td><?php echo $row['GUTA_KELUAR']?></td>
                          <td><?php echo $row['GUTA_SALDO']?></td>
                          <?php
                            if($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN'){
                              ?> 
                                <td> <a href="#">Edit</a> | <a href="<?php echo base_url()?>c_gudangTakJadi/delete/<?php echo $row['GUTA_ID']?>">Delete</a>  </td> 
                              <?php
                            }
                          ?>
                        </tr>
                      <?php
                      $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
      </div>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<!-- modal konfirmasiJadi -->
<div class="modal modal-warning fade" id="modal-success2">
  <div class="modal-dialog" id="modalKonfirmasiTakJadi">
    
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="myModalTakJadi2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:800px" id="modalChildTakJadi">

   </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- javascript child -->
<script>
function showChildTakJadi(str) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtChildTakJadi").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/searchChild?q="+str, true);
  xhttp.send();   
}
</script>
<!-- javascript saldo Awal -->
<script>
function showStokTakJadi(str) {
  var bachId = document.getElementById('cmbChildTakJadi').value;
  var bapaId = document.getElementById('cmbParentTakJadi').value;
  var kateId = document.getElementById('cmbKategoriTakJadi').value;
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtStokTakJadi").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/searchStok?kateId="+kateId+"&bachId="+bachId+"&bapaId="+bapaId, true);
  xhttp.send();   
}
</script>

<!-- javascript saldo Akhir -->
<script type="text/javascript">
  function showSaldoTakJadi(){
    var saldoAwal = parseInt(document.getElementById("saldoAwalTakJadi").value);
    var brgKeluar = parseInt(document.getElementById("brgKeluarTakJadi").value);
    var brgMasuk  = parseInt(document.getElementById("brgMasukTakJadi").value);
    var saldoAkhirTakJadi;
    saldoAkhirTakJadi = saldoAwal + brgMasuk - brgKeluar;

    document.getElementById("saldoAkhirTakJadi").value = parseInt(saldoAkhirTakJadi);
  }
</script>

<!-- Modal ajax -->
<script>
  function modalKonfirmasiTakJadi() {
    var xhttp;

    var parent,child,kategori,keterangan,masuk,keluar,akhir,awal,ruangan;
    parent      = document.getElementById('cmbParentTakJadi').value;
    // var parent,child,kategori,keterangan,masuk,keluar,akhir;
    // parent      = document.getElementById('myInputTakJadi').value;
    child       = document.getElementById('cmbChildTakJadi').value;
    kategori    = document.getElementById('cmbKategoriTakJadi').value;
    keterangan  = document.getElementById('keteranganTakJadi').value;
    masuk       = document.getElementById('brgMasukTakJadi').value;
    keluar      = document.getElementById('brgKeluarTakJadi').value;
    akhir       = document.getElementById('saldoAkhirTakJadi').value;
    awal        = document.getElementById('saldoAwalTakJadi').value;
    ruangan     = document.getElementById('cmbRuanganTakJadi').value;
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalKonfirmasiTakJadi").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/modalKonfirmasi?parent="+parent+"&child="+child+"&kategori="+kategori+"&keterangan="+keterangan+"&masuk="+masuk+"&keluar="+keluar+"&akhir="+akhir+"&awal="+awal+"&ruangan="+ruangan, true);
    xhttp.send();   
  }

   function modalChildTakJadi() {
    var xhttp;
    var parent;
    parent    = document.getElementById('cmbParentTakJadi').value;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalChildTakJadi").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/modalChild?parent="+parent, true);
    xhttp.send();
  }
</script>

<!-- modal  parent -->

<div class="modal fade" id="myModalTakJadi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Barang Parent</h4>
            </div>
            <div class="modal-body">
                <table id="gutaParent" class="table table-bordered table-hover table-striped">
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
                          <tr class="pilih" data-brgParentTakJadi="<?php echo $row['BAPA_NAME']; ?>" data-brgParentTakJadiValue="<?php echo $row['BAPA_ID']; ?>">
                            <td><?php echo $no ?></td>
                            <td><?php echo $row['BAPA_NAME']?></td>
                            
                          </tr>
                        <?php
                        $no++;
                      }
                      ?>
                    </tbody>
                </table>  
            </div><!--  /.modal body -->
        </div> <!-- /.modal content -->
    </div> <!-- /.modal dialog  -->
</div><!--  /.end of modal -->

<!-- modal  kategori -->

<div class="modal fade" id="myModalKategori2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Barang Parent</h4>
            </div>
            <div class="modal-body">
                <table id="gutaKategori" class="table table-bordered table-hover table-striped">
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
                          <tr class="kate2" data-namaKategori="<?php echo $row['KATE_ID']; ?>">
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


<div class="modal fade" id="myModalTakJadi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Barang Child</h4>
            </div>
            <div class="modal-body">
                <table id="gutaChild" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        
                      </tr>
                    </thead>        
                    <tbody>
                      <?php 
                      $no=1;
                      foreach ($namaChild as $row) {
                        ?>
                          <tr class="kate2" data-namaKategori="<?php echo $row['BACH_ID']; ?>">
                            <td><?php echo $no?></td>
                            <td><?php echo $row['BACH_NAME']?></td>
                            
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
    $(document).on('click', '.pilih', function (e) {
        // alert("test");

        // parent
        document.getElementById("myInputTakJadi").value = $(this).attr('data-brgParentTakJadi');
        document.getElementById("cmbParentTakJadi").value = $(this).attr('data-brgParentTakJadiValue');

        $('#myModalTakJadi').modal('hide');
        showChildTakJadi($(this).attr('data-brgParentTakJadiValue'));

        

    });

     $(document).on('click', '.pilih2', function (e) {
        // alert("test");

        // child
        document.getElementById("cmbChildTakJadi").value = $(this).attr('data-brgChildTakJadi');
        $('#myModalTakJadi2').modal('hide');
        showStokTakJadi($(this).attr('data-brgChildTakJadi'));
        

    });

    $(document).on('click', '.kate2', function (e) {
        // alert("test");

        // child
        document.getElementById("cmbKategoriTakJadi").value = $(this).attr('data-namaKategori');
        $('#myModalKategori2').modal('hide');

        

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
              document.getElementById("cmbParentTakJadi").value = this.getElementsByTagName("li")[0].value;
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
                foreach ($namaParent as $row){
                         
                          echo "'".$row ['BAPA_NAME']."',";
                         
                        }
                ?> 
                ];
var Id = [ <?php 
                foreach ($namaParent as $row){
                         
                          echo "'".$row ['BAPA_ID']."',";
                         
                        }
                ?> 
                ];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInputTakJadi"), Parent, Id);


</script>
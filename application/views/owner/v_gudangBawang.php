<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Stock Bawang Report -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Bawang ]</span></h3><br>

          <div class="box-tools pull-right">
            
            <a href="<?php echo base_url('index.php/c_report/exportBarangBawang') ?>">
              <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
            </a>
            
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="stock" class="table table-bordered table-striped table-hover">
            <thead >
              <tr>
                <th scope="col" rowspan="2">N0</th>
                <th scope="col" rowspan="2">NAMA BARANG</th>
                <th scope="col" rowspan="2">SATUAN</th>
                <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
                <th scope="col" rowspan="2">JUMLAH</th>
              </tr>
              <tr>
              <?php
                foreach ($dataRuangan as $row) {
                  ?>
                      <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
                  <?php
                }
              ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
                foreach ($dataBarangParent as $row) {
                  ?>
                  <tr>
                        <th scope="row"></th>
                        <td><b><a href="<?php echo base_url()?>c_report/detailBarang/<?php echo $row['BAPA_ID']?>"><?php echo $row['BAPA_NAME'] ?></a></b></td>
                        <th></th>
                        <?php
                          foreach ($dataRuangan as $r) {
                            ?>
                                <th scope="1"></th>
                            <?php
                          }
                        ?>
                        <th scope="1"></th>
                    </tr>
                  <?php
                  $dataBarangChildById = $this->m_report->getBarangChildByBapaId($row['BAPA_ID']); 
                  foreach ($dataBarangChildById as $row) {
                    ?>
                    <tr>
                      <th scope="row" class="center"><?php echo $no ?></th>
                      <td><?php echo $row['BACH_NAME'] ?></td>
                      <td><?php echo $row['SATU_NAME'] ?></td>
                      <?php
                        foreach ($dataRuangan as $key) {
                          $total = $this->m_report->getTotalByRuangan($row['BAPA_ID'],$row['BACH_ID'],$key['RUAN_ID']);
                          ?>
                            <td scope="1">
                              <?php
                                if (isset($total)) {
                                  echo $total;
                                }else{
                                  echo "-";
                                }
                              ?>
                            </td>
                          <?php
                        }
                        $total = $this->m_report->getTotalSaldo($row['BAPA_ID'],$row['BACH_ID']);
                      ?>
                      <td class="right" ><?php echo $total['TOTAL'] ?></td>
                    </tr>
                    <?php
                    $no++;
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->


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
  xhttp.open("GET", "<?php echo base_url()?>c_gudangBawang/searchChild?q="+str, true);
  xhttp.send();   
}
</script>
<!-- javascript saldo Awal -->
<script>
function showStok() {
  var bachId = document.getElementById('cmbChild').value;
  var bapaId = document.getElementById('cmbParent').value;
  var kateId = document.getElementById('cmbKategori').value;
  var ruanId = document.getElementById('cmbRuangan').value;

  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtStok").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url()?>c_gudangBawang/searchStok?kateId="+kateId+"&bachId="+bachId+"&bapaId="+bapaId+"&ruanId="+ruanId, true);
  xhttp.send();   
}
</script>

<!-- javascript saldo Akhir -->
<script type="text/javascript">
  $(function () {
        $('#stock').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
  });
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
<!-- Modal ajax -->
<script>
  function modalKonfirmasiJadi() {
    //validation start
    if (document.getElementById('cmbRuangan').value == 0) {
      alert('Harap isi Ruangan Gudang terlebih dahulu');
      return;
    }
    //validation finish

    $('#modal-success').modal('show');


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
    xhttp.open("GET", "<?php echo base_url()?>c_gudangBawang/modalKonfirmasi?parent="+parent+"&child="+child+"&kategori="+kategori+"&keterangan="+keterangan+"&masuk="+masuk+"&keluar="+keluar+"&akhir="+akhir+"&awal="+awal+"&ruangan="+ruangan, true);
    xhttp.send();   
  }

  function modalChildJadi() {
    parent    = document.getElementById('cmbParent').value;
    $.ajax({
        type: "GET", 
        url: "<?php echo base_url()?>c_gudangBawang/modalChild?parent="+parent,
        success: function(html) {
            $("#modalChildJadi").html(html);
            $('#gubaChild').DataTable({ 
           });
        }
    });
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
                          <tr class="isi" style="cursor: pointer;" data-brgParentValue="<?php echo $row['BAPA_NAME']; ?>" data-brgParent="<?php echo $row['BAPA_ID']; ?>">
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
        document.getElementById("myInput").value = $(this).attr('data-brgParentValue');
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
</script>

<!-- Auto complete Parent -->
<script type="text/javascript">
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
  autocomplete(document.getElementById("myInput"), Parent, Id);
</script>
<!-- /.content -->
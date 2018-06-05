  <div class="content">
    <div class="row">
      <!-- Material Cimuning Report -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><span class="text-center">Laporan Material [ Gudang Cimuning ]</span></h3><br>
          <div class="box-tools pull-right">
            
            <a href="<?php echo base_url('index.php/c_report/exportMaterialCimuning') ?>">
              <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
            </a>
            
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="material_cimuning" class="table table-bordered table-striped table-hover">
            <thead >
              <tr>
                <th scope="col" rowspan="2">N0</th>
                <th scope="col" rowspan="2">NAMA MATERIAL</th>
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
                foreach ($dataMaterialCimuningParent as $row) {
                  ?>
                  <tr>
                        <th scope="row"></th>
                        <td><b><a href="<?php echo base_url()?>c_report/detailMaterialCimuning/<?php echo $row['MPCI_ID']?>"><?php echo $row['MPCI_NAME'] ?></a></b></td>
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
                  $dataBarangChildById = $this->m_report->getMaterialChildByMpciId($row['MPCI_ID']); 
                  foreach ($dataBarangChildById as $row) {
                    ?>
                    <tr>
                      <th scope="row" class="center"><?php echo $no ?></th>
                      <td><?php echo $row['MCCI_NAME'] ?></td>
                      <td><?php echo $row['SATU_NAME'] ?></td>
                      <?php
                        foreach ($dataRuangan as $key) {
                          $total = $this->m_report->getTotalMaterialCimuningByRuangan($row['MPCI_ID'],$row['MCCI_ID'],$key['RUAN_ID']);
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
                        $total = $this->m_report->getTotalSaldoMaterialCimuning($row['MPCI_ID'],$row['MCCI_ID']);
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
  </div>

<div class="modal fade" id="modal">
  <div class="modal-dialog"> 
    <!-- modal child -->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Lookup Barang Child</h4>
          </div>
          <div class="modal-body">
              <table class="table" id="cimuChild" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                    </tr>
                  </thead>
                  <tbody id="modalChild">
                  </tbody>
              </table>  
          </div>
      </div>
  </div>
</div>

<div class="modal modal-success fade" id="modalMaterialShow">
  <div class="modal-dialog" id="modalMaterial"> 
    <!-- modal material -->

  </div>
</div>

<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Material</h4>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Id Material</th>
                        <th>Nama Material</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($dataParent as $row) {
                        ?>
                          <tr style="cursor: pointer;" class="isi" data-brgParent="<?php echo $row['MPCI_ID']; ?>">
                            <!-- <td><?php echo $no ?></td> -->
                            <td><?php echo $row['MPCI_ID']?></td>
                            <td><?php echo $row['MPCI_NAME']?></td>
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
    xhttp.open("GET", "<?php echo base_url()?>c_materialCimuning/searchChild?q="+str, true);
    xhttp.send();   
  }
  function showStok() {
    var xhttp;
    var mcciId = document.getElementById('cmbChild').value;
    var mpciId = document.getElementById('cmbParent').value;
    var ruanId = document.getElementById('cmbRuangan').value;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("stok").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_materialCimuning/searchStok?mcciId="+mcciId+"&mpciId="+mpciId+"&ruanId="+ruanId, true);
    xhttp.send();   
  }
   function modalMaterial() {
    var xhttp;
    //validation start
    if (document.getElementById('cmbRuangan').value == 0) {
      alert('Harap isi Ruangan Gudang terlebih dahulu');
      return;
    }
    //validation finish

    $('#modalMaterialShow').modal('show');
    var parent,child,keterangan,masuk,keluar,kondisi,ruangan;
    // try{
      parent      = document.getElementById('cmbParent').value;
      child       = document.getElementById('cmbChild').value;
      keterangan  = document.getElementById('txtUraian').value;
      masuk       = document.getElementById('masuk').value;
      keluar      = document.getElementById('keluar').value;
      awal        = document.getElementById('saldoAwal').value;
      akhir       = document.getElementById('saldoAkhir').value;
      ruangan     = document.getElementById('cmbRuangan').value;


    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalMaterial").innerHTML = this.responseText;
      }
    };

    xhttp.open("GET","<?php echo base_url()?>c_materialCimuning/modalKonfirmasi?parent="+parent+"&child="+child+"&keterangan="+keterangan+"&masuk="+masuk+"&keluar="+keluar+"&awal="+awal+"&akhir="+akhir+"&ruangan="+ruangan,true);
    xhttp.send()
  }

// javascript saldo Akhir
  function showSaldo(){
    var saldoAwal = parseInt(document.getElementById("saldoAwal").value);
    var brgKeluar = parseInt(document.getElementById("keluar").value);
    var brgMasuk  = parseInt(document.getElementById("masuk").value);
    if (isNaN(parseInt(brgKeluar))) {
      brgKeluar = 0;
    }
    if (isNaN(parseInt(brgMasuk))) {
      brgMasuk = 0;
    }
    if (isNaN(parseInt(saldoAwal))) {
      saldoAwal = 0;
    }
    var saldoAkhir;
    saldoAkhir = saldoAwal + brgMasuk - brgKeluar;

    document.getElementById("saldoAkhir").value = saldoAkhir;
  }

//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
    $(document).on('click', '.isi', function (e) {
        document.getElementById("cmbParent").value = $(this).attr('data-brgParent');
        $('#myModal').modal('hide');
        showChild($(this).attr('data-brgParent'));
    });
    $(document).on('click', '.isi2', function (e) {
        document.getElementById("cmbChild").value = $(this).attr('data-brgChild');
        $('#modal').modal('hide');
        showStok();
    });

    $(function () {
         $("#mateCimuning").dataTable( {
          "bSort": true,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel' ]
          });
          $("#cimuChild").dataTable( {
           "bSort": true,
          });
       });
    //child jadi
    function modalChildJadi() {
      var xhttp;
      var parent;
      parent    = document.getElementById('cmbParent').value;

      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("modalChild").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "<?php echo base_url()?>c_materialCimuning/modalChildJadi?parent="+parent, true);
      xhttp.send();
    }
</script>
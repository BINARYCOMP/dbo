  <div class="content">
    <div class="row">
      <?php
        if ($_SESSION['level'] == 'ADMIN_CIMUNING' || $_SESSION['level'] == 'ADMIN_BAWANG' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN' ) {
      ?>
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Input Material Bawang</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 ">
                  <form action="<?php echo base_url()?>c_materialBawang/save" method="POST">
                    <div class="form-group">
                      <label class="control-label">Parent</label>
                      <div class="input-group">
                        <!-- /btn-group -->
                        <select class="form-control" name="cmbParent" id="cmbParent" onchange="showChild(this.value)">
                          <option value="0">=== Pilih Induk Material ===</option>
                          <?php
                            foreach ($dataParent as $row) {
                              echo "<option value ='".$row['MPBA_ID']."'> ".$row['MPBA_NAME']." </option>";
                            }
                          ?>
                        </select>
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Search</button>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Child</label>
                        <div class="input-group">
                          <!-- /btn-group -->
                          <span name="cmbChild" id="txtChild">
                            <select class="form-control">
                              <option>== Pilih Anak Material ==</option>
                            </select> 
                          </span>
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal" onclick="modalChildJadi()" >Search</button>
                          </div>
                        </div>
                    </div>

                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="txtUraian" class="form-control" id="txtUraian" rows="3" placeholder="Keterangan barang.."></textarea>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Nomor Gudang</label>
                    <div >
                      <!-- /btn-group -->
                      <select name="cmbRuangan" id="cmbRuangan" onchange="showStok()" class="form-control">
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
                        <label class=" control-label">Masuk</label>
                        <div>
                            <input class="form-control" type="number" id="masuk" onkeyup ="showSaldo(this.value)" placeholder="Material Masuk" name="txtMasuk" required >  
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label">Keluar</label>
                        <div>
                            <input class="form-control" type="number" id="keluar" onkeyup ="showSaldo(this.value)" placeholder="Material Keluar" name="txtMasuk" required >  
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                          <label class=" control-label">Saldo Awal</label>
                          <div id="stok">
                              <input class="form-control" type="number" id="saldoAwal" placeholder="Saldo Awal" name="txtSaldoAwal" required >
                          </div>
                      </div>

                      <div class="form-group col-md-6">
                          <label class=" control-label">Saldo Akhir</label>
                          <div>
                              <input class="form-control" type="number" id="saldoAkhir" placeholder="Saldo Akhir" name="txtSaldoAkhir" required >  
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-10">
                          <button type="reset" class="btn btn-default pull-right">Cancel</button>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="btn btn-info pull-right"  onclick="modalMaterial()" >Input Data</button>
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
      ?>
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Data Material Bawang</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table" id="mateBawang" class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Material Parent</th>
                  <th>Material Child</th>
                  <th>Keterangan</th>
                  <th>Gudang</th>
                  <th>masuk</th>
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
                    foreach ($datamaterial as $row) {
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row['MPBA_NAME']?></td>
                          <td>
                            <?php 
                              $child = $this->m_materialBawang->getChildBymcbaId($row['MABA_MCBA_ID']);
                              if (isset($child[0]['MCBA_NAME'])) {
                                echo $child[0]['MCBA_NAME'];
                              }else{
                                echo "-";
                              }
                            ?>
                          </td>
                          <td><?php echo $row['MABA_URAIAN']?></td>
                          <td>
                            <?php 
                              $ruangan = $this->m_materialBawang->getRuanganByRuanId($row['MABA_RUAN_ID']);
                              if (isset($ruangan[0]['RUAN_NUMBER'])) {
                                echo $ruangan[0]['RUAN_NUMBER'];
                              }else{
                                echo "-";
                              }
                            ?>
                          </td>
                          <td><?php echo $row['MABA_MASUK']?></td>
                          <td><?php echo $row['MABA_KELUAR']?></td>
                          <td><?php echo $row['MABA_SALDO']?></td>
                          <td>
                          <?php
                            if($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN'){
                          echo "<a href='#'>Edit</a>";
                          echo " | " ;
                          echo "<a href='".base_url()."c_materialBawang/delete/".$row['MABA_ID']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
                            }
                          ?>
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

<div class="modal fade" id="modal">
  <div class="modal-dialog"> 
    <!-- modal child -->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Lookup Barang Child</h4>
          </div>
          <div class="modal-body">
              <table id="gujaChild" class="table table-bordered table-hover table-striped">
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
                          <tr style="cursor: pointer;" class="isi" data-brgParent="<?php echo $row['MPBA_ID']; ?>">
                            <!-- <td><?php echo $no ?></td> -->
                            <td><?php echo $row['MPBA_ID']?></td>
                            <td><?php echo $row['MPBA_NAME']?></td>
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
    xhttp.open("GET", "<?php echo base_url()?>c_materialBawang/searchChild?q="+str, true);
    xhttp.send();   
  }
  function showStok() {
    var xhttp;
    var mcbaId = document.getElementById('cmbChild').value;
    var mpbaId = document.getElementById('cmbParent').value;
    var ruanId = document.getElementById('cmbRuangan').value;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("stok").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_materialBawang/searchStok?mcbaId="+mcbaId+"&mpbaId="+mpbaId+"&ruanId="+ruanId, true);
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

    xhttp.open("GET","<?php echo base_url()?>c_materialBawang/modalKonfirmasi?parent="+parent+"&child="+child+"&keterangan="+keterangan+"&masuk="+masuk+"&keluar="+keluar+"&awal="+awal+"&akhir="+akhir+"&ruangan="+ruangan,true);
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
         $("#mateBawang").dataTable( {
           "bSort": true,
            dom:'B <"content-header" <"col-sm-2"l> f>tipH',
            buttons: [ 'excel' ]
          });
         $("#gujaChild").dataTable( {
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
      xhttp.open("GET", "<?php echo base_url()?>c_materialBawang/modalChild?parent="+parent, true);
      xhttp.send();
    }
</script>
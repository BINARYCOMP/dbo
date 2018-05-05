<!-- Main content -->
<section class="content">
  <div class="row">
      <!-- isi content -->
      <?php 
      if ($_SESSION['level'] == 'ADMIN BAWANG' || $_SESSION['level'] == 'ADMIN CIMUNING' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN') {
        ?>

<form method="POST">      
  <!-- Main content -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Input Gudang Jadi</h3>

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
                  <div class="input-group">
                    <!-- /btn-group -->
                    <select name="cmbParent" onchange="showChild(this.value)" id="cmbParent" class="form-control">
                      <option value="0">== Pilih Induk Barang ==</option>
                      <?php  
                        foreach ($namaParent as $row){
                          echo "<option value='".$row['BAPA_ID']."'>";
                          echo $row ['BAPA_NAME'];
                         echo "</option>";
                        }
                      ?>
                    </select> <br>
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Search</button>
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
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2" onclick="modalChildJadi()">Search</button>
                      </div>
                    </div>
                </div>


                <div class="form-group">
                  <label class="control-label">Kategori</label>
                  <div class="input-group">
                    <!-- /btn-group -->
                    <select name="cmbKategori"  id="cmbKategori" class="form-control" onchange="showStok();" onmousemove="showStok();">
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
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalKategori">Search</button>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Nomor Gudang</label>
                  <div>
                    <!-- /btn-group -->
                    <select name="cmbRuangan" id="cmbRuangan" class="form-control">
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
                      <button class="btn btn-info pull-right" type="button" data-toggle="modal" data-target="#modal-success" onclick="modalKonfirmasiJadi()" >Input Data</button>
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

<?php } ?>
<!-- tabel  -->

<div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Gudang Bawang Jadi</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 ">
                <table class="table table-bordered table-hover dataTable no-footer" id="lookup">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Induk Barang</th>
                      <th>Anak Barang</th>
                      <th>Kategori</th>
                      <th>Keterangan</th>
                      <th>Ruangan</th>
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
                    foreach ($dataGudangBawang as $row) {
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row['BAPA_NAME']?></td>
                          <td><?php echo $row['BACH_NAME']?></td>
                          <td>
                            <?php 
                              $kategori = $this->m_gudangBawang->getKateNameByGubaKateId($row['GUBA_KATE_ID']);
                              if (isset($kategori[0]['KATE_NAME'])) {
                                echo $kategori[0]['KATE_NAME'];
                              }else{
                                echo "-";
                              }
                            ?>
                          </td>
                          <td><?php echo $row['GUBA_URAIAN']?></td>
                          <td>
                            <?php 
                              $kategori = $this->m_gudangBawang->getRuanNumberByGubaRuanId($row['GUBA_RUAN_ID']);
                              if (isset($kategori[0]['RUAN_NUMBER'])) {
                                echo $kategori[0]['RUAN_NUMBER'];
                              }else{
                                echo "-";
                              }
                            ?>
                          <td><?php echo $row['GUBA_MASUK']?></td>
                          <td><?php echo $row['GUBA_KELUAR']?></td>
                          <td><?php echo $row['GUBA_SALDO']?></td>
                          <?php
                            if($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN'){
                              ?> 
                                <td> <a href="#">Edit</a> | <a href="<?php echo base_url()?>c_gudangBawang/delete/<?php echo $row['GUBA_ID']?>">Delete</a>  </td> 
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

  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtStok").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url()?>c_gudangBawang/searchStok?kateId="+kateId+"&bachId="+bachId+"&bapaId="+bapaId, true);
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
    xhttp.open("GET", "<?php echo base_url()?>c_gudangBawang/modalKonfirmasi?parent="+parent+"&child="+child+"&kategori="+kategori+"&keterangan="+keterangan+"&masuk="+masuk+"&keluar="+keluar+"&akhir="+akhir+"&awal="+awal+"&ruangan="+ruangan, true);
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
    xhttp.open("GET", "<?php echo base_url()?>c_gudangBawang/modalChild?parent="+parent, true);
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

</script>
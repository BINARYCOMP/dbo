<form action="" method="POST">  
  <div class="col-md-6">
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
                      <div class="input-group">
                        <!-- /btn-group -->
                        <select name="cmbParent" id="cmbParentTakJadi" onchange="showChildTakJadi(this.value)" class="form-control">
                          <option value="0">== Pilih Induk Barang ==</option>
                          <?php  
                            foreach ($namaParent as $row){
                              echo "<option value='".$row['BAPA_ID']."'>";
                              echo $row ['BAPA_NAME'];
                             echo "</option>";
                            }
                          ?>
                        </select>
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
                            <select name="cmbChild" id="cmbChildTakJadi" onclick="showStokTakJadi(this.value)" class="form-control">
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
                    <select name="cmbRuangan" id="cmbRuangan"  class="form-control">
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
    var parent,child,kategori,keterangan,masuk,keluar,akhir;
    parent      = document.getElementById('cmbParentTakJadi').value;
    child       = document.getElementById('cmbChildTakJadi').value;
    kategori    = document.getElementById('cmbKategoriTakJadi').value;
    keterangan  = document.getElementById('keteranganTakJadi').value;
    masuk       = document.getElementById('brgMasukTakJadi').value;
    keluar      = document.getElementById('brgKeluarTakJadi').value;
    akhir       = document.getElementById('saldoAkhirTakJadi').value;
    awal        = document.getElementById('saldoAwalTakJadi').value;
    ruangan     = document.getElementById('cmbRuangan').value;
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalKonfirmasiTakJadi").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/modalKonfirmasi?parent="+parent+"&child="+child+"&kategori="+kategori+"&keterangan="+keterangan+"&masuk="+masuk+"&keluar="+keluar+"&akhir="+akhir+"&awal="+awal, true);
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
                          <tr class="pilih" data-brgParentTakJadi="<?php echo $row['BAPA_ID']; ?>">
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
        document.getElementById("cmbParentTakJadi").value = $(this).attr('data-brgParentTakJadi');
        $('#myModalTakJadi').modal('hide');
        showChildTakJadi($(this).attr('data-brgParentTakJadi'));

        

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


</script>
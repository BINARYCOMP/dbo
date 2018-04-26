<form method="POST">      
  <!-- Main content -->
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
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
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Search</button>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Child</label>
                    <div class="input-group">
                      <!-- /btn-group -->
                      <!-- <input type="text" class="form-control"> -->
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
                          <input type="text" name="txtSaldoAwal" required id="saldoAwal" readonly placeholder="0" class="form-control">  
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
function showStok(str) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtStok").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url()?>c_gudangJadi/searchStok?q="+str, true);
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

    document.getElementById("saldoAkhir").value = saldoAkhir;
  }
</script>

<!-- Modal ajax -->
<script>
  function modalKonfirmasiJadi() {
    var xhttp;
    var parent,child,keterangan,masuk,keluar,akhir;
    parent      = document.getElementById('cmbParent').value;
    child       = document.getElementById('cmbChild').value;
    keterangan  = document.getElementById('keterangan').value;
    masuk       = document.getElementById('brgMasuk').value;
    keluar      = document.getElementById('brgKeluar').value;
    akhir       = document.getElementById('saldoAkhir').value;
    awal        = document.getElementById('saldoAwal').value;
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalKonfirmasiJadi").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_gudangJadi/modalKonfirmasi?parent="+parent+"&child="+child+"&keterangan="+keterangan+"&masuk="+masuk+"&keluar="+keluar+"&akhir="+akhir+"&awal="+awal, true);
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
                        <th>Id Barang</th>
                        <th>Nama Barang</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach ($namaParent as $row) {
                        ?>
                          <tr class="isi" data-brgParent="<?php echo $row['BAPA_ID']; ?>">
                            <td><?php echo $row['BAPA_ID']?></td>
                            <td><?php echo $row['BAPA_NAME']?></td>
                          </tr>
                        <?php
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
        showStok($(this).attr('data-brgChild'));
        

    });

</script>
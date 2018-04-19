<form action="<?php echo base_url()?>c_gudangTakJadi/inputStok" method="POST">
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
                        <select name="cmbParent" onchange="showChild(this.value)" class="form-control">
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
                          <button type="button" class="btn btn-warning ">Search</button>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Child</label>
                        <div class="input-group">
                          <!-- /btn-group -->
                          <span id="txtChild">
                            <select class="form-control">
                              <option>== Pilih Anak Barang ==</option>
                            </select>
                          </span>
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-warning">Search</button>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label">Stock Awal</label>
                        <div>
                          <span id="txtStok"> 
                            <input type="text" name="txtSaldoAwal" required id="saldoAwal" readonly placeholder="0" class="form-control">  
                          </span>
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="txtUraian" class="form-control" rows="3" placeholder="Keterangan barang ..."></textarea>
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
                        <label class=" control-label">Stock Akhir</label>
                        <div>
                          <input type="number" disabled name="txtSaldoAkhir" id="saldoAkhir" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-10">
                          <button type="reset" class="btn btn-default pull-right">Cancel</button>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-warning" >Input Data</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="modal modal-warning fade" id="modal-warning">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Stock Barang Setengah Jadi</h4>
                      </div>
                      <div class="modal-body">
                        <h4>Parent </h4>
                        <h4>Child  </h4>
                        <h4>Masuk  </h4>
                        <h4>keluar </h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline">Save changes</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                the plugin. -->
              </div>
            </div>
            <!-- /.box -->
          </div> <!-- col-input -->

        </div>  <!-- /Main content -->
</form>
<hr>
<table>
  <tr>
    <th>No.</th>
    <th>Induk Barang</th>
    <th>Anak Barang</th>
    <th>Uraian</th>
    <th>Masuk</th>
    <th>Keluar</th>
    <th>Saldo</th>
  </tr>
  <?php
  $no = 1;
  foreach ($dataGudangTakJadi as $row) {
    ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $row['BAPA_NAME'] ?></td>
        <td><?php echo $row['BACH_NAME'] ?></td>
        <td><?php echo $row['GUTA_URAIAN'] ?></td>
        <td><?php echo $row['GUTA_MASUK'] ?></td>
        <td><?php echo $row['GUTA_KELUAR'] ?></td>
        <td><?php echo $row['BACH_GUTA_TOTAL'] ?></td>
      </tr>
    <?php
    $no++;
  }
  ?>
</table>





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
  xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/searchChild?q="+str, true);
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
  xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/searchStok?q="+str, true);
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

<?php echo $message ?>

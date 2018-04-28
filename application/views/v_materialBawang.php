<!-- Main content -->
<section class="content">
  <div class="row">
      <!-- isi content -->

     <form method="POST">      
  <!-- Main content -->
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Input Material</h3>

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
                  <label class="control-label">Kategori</label>
                  <div class="input-group">
                    <!-- /btn-group -->
                    <select name="cmbKategori" id="cmbKategori" class="form-control">
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
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Search</button>
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
      <!-- Main content -->
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Tabel Gudang Jadi</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 ">
                <table class="table table-bordered table-hover table-striped" id="guja">
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($dataGudangJadi as $row) {
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row['BAPA_NAME']?></td>
                          <td><?php echo $row['BACH_NAME']?></td>
                          <td><?php echo $row['KATE_NAME']?></td>
                          <td><?php echo $row['GUJA_URAIAN']?></td>
                          <td><?php echo $row['GUJA_MASUK']?></td>
                          <td><?php echo $row['GUJA_KELUAR']?></td>
                          <td><?php echo $row['GUJA_SALDO']?></td>
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

      <div class="col-md-6">
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
                          <td><?php echo $row['KATE_NAME']?></td>
                          <td><?php echo $row['GUTA_URAIAN']?></td>
                          <td><?php echo $row['GUTA_MASUK']?></td>
                          <td><?php echo $row['GUTA_KELUAR']?></td>
                          <td><?php echo $row['GUTA_SALDO']?></td>
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
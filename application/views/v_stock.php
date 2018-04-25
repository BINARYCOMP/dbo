<!-- Main content -->
<section class="content">
  <div class="row">
      <!-- isi content -->

      <?php $this->load->view('v_gudangJadi') ?>
      <?php $this->load->view('v_gudangTakJadi') ?>
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
                      <th>Keterangan</th>
                      <th>Masuk</th>
                      <th>Keluar</th>
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
                          <td><?php echo $row['GUTA_URAIAN']?></td>
                          <td><?php echo $row['GUTA_MASUK']?></td>
                          <td><?php echo $row['GUTA_KELUAR']?></td>
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
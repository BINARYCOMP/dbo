
<!-- Main content -->
<section class="content">
  <div class="row">
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
                    foreach ($dataGudangJadi as $row) {
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row['BACC_NAME']?></td>
                          <td>
                            <?php 
                              $kategori = $this->m_gudangJadi->getKateNameByGujaKateId($row['GUJA_KATE_ID']);
                              if (isset($kategori[0]['KATE_NAME'])) {
                                echo $kategori[0]['KATE_NAME'];
                              }else{
                                echo "-";
                              }
                            ?>
                          </td>
                          <td><?php echo $row['GUJA_URAIAN']?></td>
                          <td>
                            <?php 
                              $kategori = $this->m_gudangJadi->getRuanNumberByGujaRuanId($row['GUJA_RUAN_ID']);
                              if (isset($kategori[0]['RUAN_NUMBER'])) {
                                echo $kategori[0]['RUAN_NUMBER'];
                              }else{
                                echo "-";
                              }
                            ?>
                          <td><?php echo $row['GUJA_MASUK']?></td>
                          <td><?php echo $row['GUJA_KELUAR']?></td>
                          <td><?php echo $row['GUJA_SALDO']?></td>
                          <?php
                            if($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN'){
                              ?> 
                                <td> <a href="#">Edit</a> | <a href="#">Delete</a>  </td> 
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
                          <td><?php echo $row['BACC_NAME']?></td>
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
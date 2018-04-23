<!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            Detail
          <small><i class="fa fa-info"></i></small>
          <small><?php echo $_SESSION['level']?></small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <?php
            $warna[0] = 'warning';
            $warna[1] = 'info';
            $warna[2] = 'success';
            $warna[3] = 'danger';
            $warna[4] = 'default';
            $noWarna  = 0;
            foreach ($dataBarang as $row) {
              ?>
                <div class="col-md-12">
                  <div class="box box-<?php echo $warna[$noWarna] ?> box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Detail dari <?php echo $row['BACH_NAME'] ?></h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th colspan="9"><?php echo $row['BACH_NAME'] ?></th>
                          </tr>
                          <tr>
                            <th scope="col" rowspan="2">TANGGAL</th>
                            <th scope="col" rowspan="2">KETERANGAN</th>
                            <th scope="col" colspan="3">SGS</th>
                            <th scope="col" colspan="3">EX CHINA</th>
                            <th scope="col" rowspan="2">TOTAL</th>
                          </tr>
                          <tr>
                            <th scope="1">MASUK</th>
                            <th scope="1">KELUAR</th>
                            <th scope="1">SALDO</th>
                            <th scope="1">MASUK</th>
                            <th scope="1">KELUAR</th>
                            <th scope="1">SALDO</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $dataBarangChild = $this->m_report->getBarangJadiByChildId($row['BACH_ID']);
                            foreach ($dataBarangChild as $row2) {
                              ?>
                                <tr>
                                  <th scope="row"><?php echo $row2['GUJA_TIMESTAMP'] ?></th>
                                  <td><?php echo $row2['GUJA_URAIAN'] ?></td>
                                  <td><?php echo $row2['GUJA_KELUAR'] ?></td>
                                  <td><?php echo $row2['GUJA_MASUK'] ?></td>
                                  <td><?php echo $row2['BACH_GUJA_TOTAL'] ?></td>
                                  <td><?php echo $row2['GUJA_KELUAR'] ?></td>
                                  <td><?php echo $row2['GUJA_MASUK'] ?></td>
                                  <td><?php echo $row2['BACH_GUJA_TOTAL'] ?></td>
                                  <td><?php echo 'Ieu kumaha ?' ?></td>
                                </tr>
                              <?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
              <?php
              $noWarna++;
            }
          ?>
        </div>  <!-- /Main content -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
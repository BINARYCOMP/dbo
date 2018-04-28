<!-- content -->
<section class="content">

<!-- Main Content -->
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
                      <?php
                      $dataKategori = $this->m_report->getKategoriByBachId($row['BACH_ID']);
                      foreach ($dataKategori as $daka) {
                        ?>
                      <th scope="col" colspan="3"><?php echo $daka['KATE_NAME']?></th>
                      <?php
                      }
                      ?>
                    </tr>
                    <tr>
                    <?php
                      foreach ($dataKategori as $daka) {
                    ?>
                        <th scope="1">MASUK</th>
                        <th scope="1">KELUAR</th>
                        <th scope="1">SALDO</th>
                    <?php
                      }
                    ?>
                      <th scope="col" rowspan="2">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $dataBarangChild = $this->m_report->getBarangJadiByChildId($row['BACH_ID']);
                      foreach ($dataBarangChild as $row2) {
                        ?>
                          <tr>
                            <th scope="row">
                              <?php 
                                echo date("D d M Y ( h:m:s a )", strtotime($row2['GUJA_TIMESTAMP']));
                              ?>
                            </th>
                            <td><?php echo $row2['GUJA_URAIAN'] ?></td>
                            <?php
                              foreach ($dataKategori as $daka) {
                                $dataStok = $this->m_report->getStokByKateId($daka['KATE_ID'], $row['BAPA_ID']);
                            ?>
                              <td><?php echo $dataStok[0]['GUJA_MASUK'] ?></td>
                              <td><?php echo $dataStok[0]['GUJA_KELUAR'] ?></td>
                              <td><?php echo $dataStok[0]['GUJA_SALDO'] ?></td>
                            <?php
                              }
                            ?>
                            <td><?php echo $row2['BACH_GUJA_TOTAL'] ?></td>
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
  </div>  <!-- /Main Content -->

</section>
<!-- /.content -->

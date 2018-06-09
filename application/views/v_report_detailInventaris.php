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
      foreach ($dataInventaris as $row) {
        ?>
          <div class="col-md-12">
            <div class="box box-<?php echo $warna[$noWarna] ?> box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Detail dari <?php echo $row['INCH_NAME'] ?></h3>

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
                      <th colspan="9"><?php echo $row['INCH_NAME'] ?></th>
                    </tr>
                    <tr>
                      <th scope="col" rowspan="">DI INPUT OLEH</th>
                      <th scope="col" rowspan="">TANGGAL</th>
                      <th scope="col" rowspan="">KETERANGAN</th>
                      <th scope="col" colspan="">QTY</th>
                      <th scope="col" colspan="">KONDISI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $dataInventarisChild = $this->m_report->getInventarisByChildId($row['INCH_ID']);
                      foreach ($dataInventarisChild as $row2) {
                        ?>
                          <tr>
                          <td><?php echo $row2['PEGA_NAME'] ?></td>
                            <th scope="row">
                              <?php 
                                echo date("D d M Y ( h:m:s a )", strtotime($row2['INVE_TIME']));
                              ?>
                            </th>
                            <td><?php echo $row2['INVE_KETERANGAN'] ?></td>
                            <td><?php echo $row2['INCH_QTY'] ?></td>
                            <td><?php echo $row2['INVE_KEADAAN'] ?></td>
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
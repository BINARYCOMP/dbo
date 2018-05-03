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
                      <th colspan="12"><?php echo $row['BACH_NAME'] ?></th>
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
                      <th scope="col" rowspan="2">TOTAL</th>
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $dataBarangChild = $this->m_report->getBarangJadiByChildId($row['BACH_ID']);
                      $k= 0;
                      $saldo = array();
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
                            $total = array();
                            $subTotal = 0;
                            $r =0;
                            $a = 0;
                              foreach ($dataKategori as $daka) {
                                if(isset($saldo[$a])) 
                                   $saldo[$a] ;
                                else
                                   $saldo[$a] = 0;

                                $dataStok   = $this->m_report->getStokByKateId($daka['KATE_ID'], $row['BAPA_ID']);
                                $lastSaldo  = $this->m_report->getLastStok($row['BAPA_ID'], $row['BACH_ID'], $daka['KATE_ID']);
                                if ($daka['KATE_ID'] != $row2['GUJA_KATE_ID']) {
                                  ?>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>
                                      <?php 
                                        echo $saldo[$a];
                                      ?>
                                    </td>
                                  <?php
                                }else{
                                  $saldo[$a]  = $row2['GUJA_SALDO'];
                                  ?>
                                    <td><?php echo $row2['GUJA_MASUK'] ?></td>
                                    <td><?php echo $row2['GUJA_KELUAR'] ?></td>
                                    <td><?php echo $row2['GUJA_SALDO'] ?></td>
                                  <?php
                                }
                                // var_dump($saldo[2]);
                                // for ($i=0; $i < 3 ; $i++) { 
                                //   $subTotal   = $subTotal + $saldo[1]; 
                                //   $total[]    = $subTotal;
                                // }
                                $r++;
                                $a++;
                              }
                            ?>
                              <td><?php echo $total[0]; ?></td>
                          </tr>
                        <?php
                        $k++;
                        // exit();
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

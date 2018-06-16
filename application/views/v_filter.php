<?php
  $warna[0] = 'warning';
  $warna[1] = 'info';
  $warna[2] = 'success';
  $warna[3] = 'danger';
  $warna[4] = 'default';
  $noWarna  = 0;
  $jumlah = 0;
  foreach ($datanya as $row) {
    if ($noWarna > 4) {
      $noWarna = 0;
    }
    ?>
      <div class="col-md-12">
        <div class="box box-<?php echo $warna[$noWarna] ?> box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Detail dari <?php echo $row[$bach.'_NAME'] ?></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php
              if ($model1 != 0) {
                $dataKategori = $this->report->$model1($row[$bach.'_ID']); 
              }
            ?>
            <table id="detailStock<?php echo $jumlah?>" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th colspan="120"><?php echo $row[$bach.'_NAME'] ?></th>
                </tr>
                <tr>
                  <?php
                  if ($_SESSION['level'] == 'SUPER ADMIN') {
                    ?>
                    <th scope="col" <?php if(!empty($dataKategori)) echo 'rowspan="2"'?> >ACTION</th>
                    <?php
                  }
                  ?>
                  <th scope="col" <?php if(!empty($dataKategori)) echo 'rowspan="2"'?> >DI INPUT OLEH</th>
                  <th scope="col" <?php if(!empty($dataKategori)) echo 'rowspan="2"'?> >TANGGAL</th>
                  <th scope="col" <?php if(!empty($dataKategori)) echo 'rowspan="2"'?> >KETERANGAN</th>
                  <?php
                  if (isset($dataKategori)) {
                    foreach ($dataKategori as $daka) {
                      ?>
                        <th scope="col" colspan="3"><?php echo $daka['KATE_NAME']?></th>
                        <?php
                    }
                  }
                  if (empty($dataKategori)) {
                    ?>
                      <th scope="1">MASUK</th>
                      <th scope="1">KELUAR</th>
                      <th scope="1">SALDO</th>
                    <?php
                  }
                  ?>
                      <th scope="col" <?php if(!empty($dataKategori)) echo 'rowspan="2"'?> >TOTAL</th>
                </tr>
                <?php
                  if (!empty($dataKategori)) {
                    ?>
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
                    <?php
                  }
                ?>
              </thead>
              <tbody>
                <?php
                  $dataBarangChild = $this->report->$model2($row[$bach.'_ID'],$awal,$akhir,$bulan,$tahun);
                  $k= 0;
                  $saldo2 = 0;
                  $saldo = array();
                  $count = count($dataBarangChild);
                  foreach ($dataBarangChild as $row2) {
                    ?>
                      <tr>
                        <?php
                        if ($_SESSION['level'] == 'SUPER ADMIN') {
                            ?>
                              <td class="center">
                                <a  onclick="return confirm('Anda yakin akan menghapus data pada hari dan tanggal <?php echo C_filter::format(date("D d M Y h:i:s", strtotime($row2[$variable.'_TIMESTAMP'])))?>')" href="<?php echo base_url().$controller.'/delete/'.$row2[$variable.'_ID']?>">Delete</a>
                              </td>
                            <?php
                        }
                        ?>
                        <td><?php echo $row2['PEGA_NAME'] ?></td>
                        <th scope="row">
                          <?php 
                            echo C_filter::format(date("D d M Y h:i:s", strtotime($row2[$variable.'_TIMESTAMP'])));
                          ?>
                        </th>
                        <td><?php echo $row2[$variable.'_URAIAN'] ?></td>
                        <?php
                        if (!empty($dataKategori)) {
                          $subTotal = 0;
                        }
                        $saldo2  = $saldo2 + $row2[$variable.'_MASUK'] - $row2[$variable.'_KELUAR'];
                        if (empty($dataKategori)) {
                          ?>
                            <td><?php echo $row2[$variable.'_MASUK'] ?></td>
                            <td><?php echo $row2[$variable.'_KELUAR'] ?></td>
                            <td><?php echo $saldo2 ?></td>
                          <?php
                          $subTotal = $saldo2;
                        }
                        $r =0;
                        $a = 0;
                        if (isset($dataKategori)) {
                          foreach ($dataKategori as $daka) {
                            if(isset($saldo[$a])) 
                               $saldo[$a] ;
                            else
                               $saldo[$a] = 0;

                            $dataStok   = $this->report->getStokByKateId($daka['KATE_ID'], $row[$d_parent.'_ID']);
                            $lastSaldo  = $this->report->getLastStok($row[$d_parent.'_ID'], $row[$bach.'_ID'], $daka['KATE_ID']);
                            if ($daka['KATE_ID'] != $row2[$variable.'_KATE_ID']) {
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
                              $saldo[$a]  = $saldo[$a] + $row2[$variable.'_MASUK'] - $row2[$variable.'_KELUAR'];
                              ?>
                                <td><?php echo $row2[$variable.'_MASUK'] ?></td>
                                <td><?php echo $row2[$variable.'_KELUAR'] ?></td>
                                <td><?=$saldo[$a]?></td>
                              <?php
                            }
                            $subTotal = $subTotal + $saldo[$a];
                            $r++;
                            $a++;
                          }
                        }
                        ?>
                          <td><?php echo $subTotal; ?></td>
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
    $jumlah++;
  }
?>
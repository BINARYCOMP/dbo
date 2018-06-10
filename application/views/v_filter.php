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
            <h3 class="box-title"> Detail dari <?php echo $row[$bach.'_NAME'] ?></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php $dataKategori = $this->report->$model1($row[$bach.'_ID']); ?>
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
                  foreach ($dataKategori as $daka) {
                    ?>
                      <th scope="col" colspan="3"><?php echo $daka['KATE_NAME']?></th>
                      <?php
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
                  $datanyaChild = $this->report->$model2($row[$bach.'_ID'] ,$awal, $akhir, $bulan, $tahun);
                  $k= 0;
                  $saldo = array();
                  $count = count($datanyaChild);
                  foreach ($datanyaChild as $row2) {
                    ?>
                      <tr>
                        <?php
                        if ($_SESSION['level'] == 'SUPER ADMIN') {
                          if (($k+1) == $count) {
                            ?>
                              <td class="center">
                                <a  onclick="return confirm('Anda yakin akan menghapus data pada hari dan tanggal <?php echo C_filter::format(date("D d M Y h:i:s", strtotime($row2['GUBA_TIMESTAMP'])))?>')" href="<?php echo base_url()?>c_gudangBawang/delete/<?php echo $row2['GUBA_ID']?>">Delete</a>
                              </td>
                            <?php
                          }else{
                            ?>
                              <td></td>
                            <?php
                          }
                        }
                        ?>
                        <td><?php echo $row2['PEGA_NAME'] ?></td>
                        <th scope="row">
                          <?php 
                            echo C_filter::format(date("D d M Y h:i:s", strtotime($row2['GUBA_TIMESTAMP'])));
                          ?>
                        </th>
                        <td><?php echo $row2['GUBA_URAIAN'] ?></td>
                        <?php
                        $subTotal = 0;
                        if (empty($dataKategori)) {
                          ?>
                            <td><?php echo $row2['GUBA_MASUK'] ?></td>
                            <td><?php echo $row2['GUBA_KELUAR'] ?></td>
                            <td><?php echo $row2['GUBA_SALDO'] ?></td>
                          <?php
                          $subTotal = $subTotal + $row2['GUBA_SALDO'];
                        }
                        $r =0;
                        $a = 0;
                        foreach ($dataKategori as $daka) {
                          if(isset($saldo[$a])) 
                             $saldo[$a] ;
                          else
                             $saldo[$a] = 0;

                          $dataStok   = $this->report->getStokByKateId($daka['KATE_ID'], $row['BAPA_ID']);
                          $lastSaldo  = $this->report->getLastStok($row['BAPA_ID'], $row[$bach.'_ID'], $daka['KATE_ID']);
                          if ($daka['KATE_ID'] != $row2['GUBA_KATE_ID']) {
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
                            $saldo[$a]  = $row2['GUBA_SALDO'];
                            ?>
                              <td><?php echo $row2['GUBA_MASUK'] ?></td>
                              <td><?php echo $row2['GUBA_KELUAR'] ?></td>
                              <td><?php echo $row2['GUBA_SALDO'] ?></td>
                            <?php
                          }
                          $subTotal = $subTotal + $saldo[$a];
                          $r++;
                          $a++;
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
<!-- content -->
<section class="content">
<form action="<?php echo base_url()?>c_report/filterBarangCimuningSetengahJadi/<?php echo $id ?>" method="POST">
    <select name="bulan">
      <option value="0">=== Pilih Bulan ====</option>
      <option value="1">Januari</option>
      <option value="2">Februari</option>
      <option value="3">Maret</option>
      <option value="4">April</option>
      <option value="5">Mei</option>
      <option value="6">Juni</option>
      <option value="7">Juli</option>
      <option value="8">Agustus</option>
      <option value="9">September</option>
      <option value="10">Oktober</option>
      <option value="11">November</option>
      <option value="12">Desember</option>
    </select>
    <select name="tahun">
      <option value="0">=== Pilih Tahun ====</option>
      <?php
        $tahun_sekarang = date('Y');
        $tahun_dulu     = date('Y')-10;
        for ($i=$tahun_dulu; $i <= $tahun_sekarang ; $i++) { 
          ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
          <?php
        }
      ?>
    </select>
    <input type="Submit" name="btnFilter" value="Filter">
  </form>
<!-- Main Content -->
  <div class="row">

    <?php
      $warna[0] = 'warning';
      $warna[1] = 'info';
      $warna[2] = 'success';
      $warna[3] = 'danger';
      $warna[4] = 'default';
      $noWarna  = 0;
      $jumlah = 0;
      
        if ($noWarna > 4) {
          $noWarna = 0;
        }
        ?>
          <div class="col-md-12">
            <div class="box box-<?php echo $warna[$noWarna] ?> box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Detail dari <?php echo $dataBarang[0]['BACC_NAME'] ?></h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <?php $dataKategori = $this->m_report->getKategoriSetengahJadiByBaccId($dataBarang[0]['BACC_ID']); ?>
                <table id="detailStock<?php echo $jumlah?>" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th colspan="120"><?php echo $dataBarang[0]['BACC_NAME'] ?></th>
                    </tr>
                    <tr>
                      <?php
                      if ($_SESSION['level'] == 'SUPER ADMIN' || $_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' ) {
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
                      $dataBarangChild = $this->m_report->getBarangDetailSetengahJadiCimuningByBaccId($dataBarang[0]['BACC_ID']);
                      $k= 0;
                      $saldo = array();
                      $count = count($dataBarangChild);
                      foreach ($dataBarangChild as $row2) {
                        ?>
                          <tr>
                            <?php
                            if ($_SESSION['level'] == 'SUPER ADMIN' || $_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' ) {
                              if (($k+1) == $count) {
                                ?>
                                  <td class="center">
                                    <a 
                                    onclick="return confirm('Anda yakin akan menghapus data pada hari dan tanggal <?php echo date("D d M Y ( h:m:s a )", strtotime($row2['GUTA_TIMESTAMP']))?>')" 
                                      href="<?php echo base_url()?>c_gudang_tak_jadi/delete/<?php echo $row2['GUTA_ID']?>">Delete</a>
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
                                echo date("D d M Y ( h:m:s a )", strtotime($row2['GUTA_TIMESTAMP']));
                              ?>
                            </th>
                            <td><?php echo $row2['GUTA_URAIAN'] ?></td>
                            <?php
                            $subTotal = 0;
                            if (empty($dataKategori)) {
                              ?>
                                <td><?php echo $row2['GUTA_MASUK'] ?></td>
                                <td><?php echo $row2['GUTA_KELUAR'] ?></td>
                                <td><?php echo $row2['GUTA_SALDO'] ?></td>
                              <?php
                              $subTotal = $subTotal + $row2['GUTA_SALDO'];
                            }
                            $r =0;
                            $a = 0;
                            foreach ($dataKategori as $daka) {
                              if(isset($saldo[$a])) 
                                 $saldo[$a] ;
                              else
                                 $saldo[$a] = 0;

                              $dataStok   = $this->m_report->getStokByKateId($daka['KATE_ID'], $dataBarang[0]['BACC_ID']);
                              $lastSaldo  = $this->m_report->getLastStok($dataBarang[0]['BACC_ID'], $dataBarang[0]['BACC_ID'], $daka['KATE_ID']);
                              if ($daka['KATE_ID'] != $row2['GUTA_KATE_ID']) {
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
                                $saldo[$a]  = $row2['GUTA_SALDO'];
                                ?>
                                  <td><?php echo $row2['GUTA_MASUK'] ?></td>
                                  <td><?php echo $row2['GUTA_KELUAR'] ?></td>
                                  <td><?php echo $row2['GUTA_SALDO'] ?></td>
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
    ?>
  </div>  <!-- /Main Content -->

</section>
<!-- /.content -->
<script type="text/javascript">
    $(function () {
      var jumlah = <?php echo count($dataBarang) ?> ;
      var nantinya = "#detailStock";
      for (var i = 0 ; i <= jumlah; i++) {
        $(nantinya+i).dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel' ]
        } );
      }
        $('#finance').dataTable( {
          "bSort": false,
          lengthChange: false,
          buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );
        // table.buttons().container()
        // .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    });
</script>
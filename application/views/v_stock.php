
<!-- Main content -->
<section class="content">
  <div class="row">
      <div class="col-md-12">
        <!-- Stock Bawang Report -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Bawang ]</span></h3><br>

            <div class="box-tools pull-right">
              
              <a href="<?php echo base_url('index.php/c_report/exportBarangBawang') ?>">
                <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
              </a>
              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="stock" class="table table-bordered table-striped table-hover">
              <thead >
                <tr>
                  <th scope="col" >N0</th>
                  <th scope="col" >NAMA BARANG</th>
                  <th scope="col" >KATEGORI</th>
                  <th scope="col" >JUMLAH</th>
                  <th scope="col" >HARGA</th>
                  <th scope="col" >TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                  foreach ($dataBarangParent as $row) {
                    ?>
                    <tr>
                        <th scope="row"></th>
                        <td><b><a href="<?php echo base_url()?>c_report/detailBarang/<?php echo $row['BAPA_ID']?>"><?php echo $row['BAPA_NAME'] ?></a></b></td>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    $dataBarangChildById = $this->m_report->getBarangChildByBapaId($row['BAPA_ID']); 
                    foreach ($dataBarangChildById as $row) {
                      $dataBarangperKategori = $this->m_report->getBarangChildPerKategoriByBachId($row['BACH_ID']);
                      if (!empty($dataBarangperKategori)) {
                        foreach ($dataBarangperKategori as $key) {
                          ?>
                          <tr>
                            <th scope="row" class="center"><?php echo $no ?></th>
                            <td><?php echo $row['BACH_NAME'] ?></td>
                            <td><?=$key['KATE_NAME']?></td>
                            <?php
                              $total = $this->m_report->getTotalSaldo($row['BAPA_ID'],$row['BACH_ID']);
                            ?>
                            <td class="right" ><?php echo $total['TOTAL'] ?></td>
                            <td class="right" ><?php echo $row['BACH_HARGA'] ?></td>
                            <?php
                              $hasil = $total['TOTAL'] * $row['BACH_HARGA'];
                            ?>
                            <td class="right" ><?php echo $hasil ?></td>
                          </tr>
                          <?php
                        }
                      }else{
                        ?>
                        <tr>
                          <th scope="row" class="center"><?php echo $no ?></th>
                          <td><?php echo $row['BACH_NAME'] ?></td>
                          <td>-</td>
                          <?php
                            $total = $this->m_report->getTotalSaldo($row['BAPA_ID'],$row['BACH_ID']);
                          ?>
                          <td class="right" ><?php echo $total['TOTAL'] ?></td>
                          <td class="right" ><?php echo $row['BACH_HARGA'] ?></td>
                          <?php
                            $hasil = $total['TOTAL'] * $row['BACH_HARGA'];
                          ?>
                          <td class="right" ><?php echo $hasil ?></td>
                        </tr>
                        <?php
                      }
                      $no++;
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <!-- Stock Cimuning Jadi Report -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Jadi Cimuning ]</span></h3><br>
            <div class="box-tools pull-right">
              
              <a href="<?php echo base_url('index.php/c_report/exportBarangCimuning') ?>">
                <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
              </a>
              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="stock_cimuning_jadi" class="table table-bordered table-striped table-hover">
              <thead >
                <tr>
                  <th scope="col" >N0</th>
                  <th scope="col" >NAMA BARANG</th>
                  <th scope="col" >KATEGORI</th>
                  <th scope="col" >JUMLAH</th>
                  <th scope="col" >HARGA</th>
                  <th scope="col" >TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($dataBarangJadiCimuning as $row) {
                  $dataBarangJadiPerKategori = $this->m_report->getBarangJadiCimuningPerKategoriByBaccId($row['BACC_ID']);
                  if (!empty($dataBarangJadiPerKategori)) {
                    foreach ($dataBarangJadiPerKategori as $row) {
                      ?>
                      <tr>
                        <th scope="row" class="center"><?php echo $no ?></th>
                        <td><b><a href="<?php echo base_url()?>c_report/detailBarangCimuning/<?php echo $row['BACC_ID']?>"><?php echo $row['BACC_NAME'] ?></a></b></td>
                        <td><?php echo $row['KATE_NAME'] ?></td>
                        <?php
                          $total = $this->m_report->getTotalSaldoCimuning($row['BACC_ID']);
                        ?>
                        <td class="right" ><?php echo $total['TOTAL'] ?></td>
                        <td class="right" ><?php echo $row['BACC_HARGA'] ?></td>
                        <?php
                          $hasil = $total['TOTAL'] * $row['BACC_HARGA'];
                        ?>
                        <td class="right" ><?php echo $hasil ?></td>
                      </tr>
                      <?php
                    }
                  }else{
                    ?>
                      <tr>
                        <th scope="row" class="center"><?php echo $no ?></th>
                        <td><b><a href="<?php echo base_url()?>c_report/detailBarangCimuning/<?php echo $row['BACC_ID']?>"><?php echo $row['BACC_NAME'] ?></a></b></td>
                        <td>-</td>
                        <?php
                          $total = $this->m_report->getTotalSaldoCimuning($row['BACC_ID']);
                        ?>
                        <td class="right" ><?php echo $total['TOTAL'] ?></td>
                        <td class="right" ><?php echo $row['BACC_HARGA'] ?></td>
                        <?php
                          $hasil = $total['TOTAL'] * $row['BACC_HARGA'];
                        ?>
                        <td class="right" ><?php echo $hasil ?></td>
                      </tr>
                      <?php
                  }
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <!-- Stock Cimuning Setengah Jadi Report -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Setengah Jadi Cimuning ]</span></h3><br>
            <div class="box-tools pull-right">
              
              <a href="<?php echo base_url('index.php/c_report/exportBarangCimuning') ?>">
                <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
              </a>
              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="stock_cimuning_setengah_jadi" class="table table-bordered table-striped table-hover">
              <thead >
                <tr>
                  <th scope="col" >N0</th>
                  <th scope="col" >NAMA BARANG</th>
                  <th scope="col" >KATEGORI</th>
                  <th scope="col" >JUMLAH</th>
                  <th scope="col" >HARGA</th>
                  <th scope="col" >TOTAL</th>
                </tr>
              </thead>
             <tbody>
                <?php
                $no = 1;
                foreach ($dataBarangJadiCimuning as $row) {
                  $dataBarangTakJadiPerKategori = $this->m_report->getBarangTakJadiCimuningPerKategoriByBaccId($row['BACC_ID']);
                  if (!empty($dataBarangTakJadiPerKategori)) {
                    foreach ($dataBarangTakJadiPerKategori as $row) {
                      ?>
                      <tr>
                        <th scope="row" class="center"><?php echo $no ?></th>
                        <td><b><a href="<?php echo base_url()?>c_report/detailBarangCimuning/<?php echo $row['BACC_ID']?>"><?php echo $row['BACC_NAME'] ?></a></b></td>
                        <td><?php echo $row['KATE_NAME'] ?></td>
                        <?php
                          $total = $this->m_report->getTotalSaldoSetengahJadiCimuning($row['BACC_ID']);
                        ?>
                        <td class="right" ><?php echo $total['TOTAL'] ?></td>
                        <td class="right" ><?php echo $row['BACC_HARGA'] ?></td>
                        <?php
                          $hasil = $total['TOTAL'] * $row['BACC_HARGA'];
                        ?>
                        <td class="right" ><?php echo $hasil ?></td>
                      </tr>
                      <?php
                    }
                  }else{
                    ?>
                      <tr>
                        <th scope="row" class="center"><?php echo $no ?></th>
                        <td><b><a href="<?php echo base_url()?>c_report/detailBarangCimuning/<?php echo $row['BACC_ID']?>"><?php echo $row['BACC_NAME'] ?></a></b></td>
                        <td>-</td>
                        <?php
                          $total = $this->m_report->getTotalSaldoSetengahJadiCimuning($row['BACC_ID']);
                        ?>
                        <td class="right" ><?php echo $total['TOTAL'] ?></td>
                        <td class="right" ><?php echo $row['BACC_HARGA'] ?></td>
                        <?php
                          $hasil = $total['TOTAL'] * $row['BACC_HARGA'];
                        ?>
                        <td class="right" ><?php echo $hasil ?></td>
                      </tr>
                      <?php
                  }
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
<script type="text/javascript">
    $(function () {
        $('#stock').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        $('#stock_cimuning_jadi').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        $('#stock_cimuning_setengah_jadi').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        $('#material_bawang').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        $('#inventaris_bawang').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf', 'excel' ]
        } );
        $('#inventaris_cimuning').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf', 'excel' ]
        } );
        $('#finance').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    });
</script>
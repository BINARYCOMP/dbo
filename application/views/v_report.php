<!-- Main content -->
<section class="content">
  <!-- Stock Bawang Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Bawang ]</span></h3><br>
      <a href="<?php echo base_url('index.php/c_report/exportBarangBawang') ?>">Export ke Excel</a><br>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="stock" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col" rowspan="2">N0</th>
            <th scope="col" rowspan="2">NAMA BARANG</th>
            <th scope="col" rowspan="2">SATUAN</th>
            <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
            <th scope="col" rowspan="2">JUMLAH</th>
          </tr>
          <tr>
          <?php
            foreach ($dataRuangan as $row) {
              ?>
                  <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
              <?php
            }
          ?>
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
                    <?php
                      foreach ($dataRuangan as $r) {
                        ?>
                            <th scope="1"></th>
                        <?php
                      }
                    ?>
                    <th scope="1"></th>
                </tr>
              <?php
              $dataBarangChildById = $this->m_report->getBarangChildByBapaId($row['BAPA_ID']); 
              foreach ($dataBarangChildById as $row) {
                ?>
                <tr>
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <td><?php echo $row['BACH_NAME'] ?></td>
                  <td><?php echo $row['SATU_NAME'] ?></td>
                  <?php
                    foreach ($dataRuangan as $key) {
                      $total = $this->m_report->getTotalByRuangan($row['BAPA_ID'],$row['BACH_ID'],$key['RUAN_ID']);
                      ?>
                        <td scope="1">
                          <?php
                            if (isset($total[0]['TOTAL_RUANGAN'])) {
                              echo $total[0]['TOTAL_RUANGAN'];
                            }else{
                              echo "-";
                            }
                          ?>
                        </td>
                      <?php
                    }
                    $total = $this->m_report->getTotalSaldo($row['BAPA_ID'],$row['BACH_ID']);
                  ?>
                  <td class="right" ><?php echo $total['TOTAL'] ?></td>
                </tr>
                <?php
                $no++;
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Stock Cimuning Jadi Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Jadi Cimuning ]</span></h3><br>
      <a href="<?php echo base_url('index.php/c_report/exportBarangCimuning') ?>">Export ke Excel</a><br>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="stock_cimuning_jadi" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col" rowspan="2">N0</th>
            <th scope="col" rowspan="2">NAMA BARANG</th>
            <th scope="col" rowspan="2">SATUAN</th>
            <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
            <th scope="col" rowspan="2">JUMLAH</th>
          </tr>
          <tr>
          <?php
            foreach ($dataRuangan as $row) {
              ?>
                  <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
              <?php
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($dataBarangJadiCimuning as $row) {
          ?>
            <tr>
              <th scope="row" class="center"><?php echo $no ?></th>
              <td><b><a href="<?php echo base_url()?>c_report/detailBarangCimuning/<?php echo $row['BACC_ID']?>"><?php echo $row['BACC_NAME'] ?></a></b></td>
              <td><?php echo $row['SATU_NAME'] ?></td>
              <?php
                foreach ($dataRuangan as $key) {
                  $total = $this->m_report->getTotalCimuningByRuangan($row['BACC_ID'],$key['RUAN_ID']);
                  ?>
                    <td scope="1">
                      <?php
                        if (isset($total[0]['TOTAL_RUANGAN'])) {
                          echo $total[0]['TOTAL_RUANGAN'];
                        }else{
                          echo "-";
                        }
                      ?>
                    </td>
                  <?php
                }
                $total = $this->m_report->getTotalSaldoCimuning($row['BACC_ID']);
              ?>
              <td class="right" ><?php echo $total['TOTAL'] ?></td>
            </tr>
            <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Material Bawang Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Material [ Gudang Bawang ]</span></h3><br>
      <a href="<?php echo base_url('index.php/c_report/exportMaterialBawang') ?>">Export ke Excel</a><br>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="material_bawang" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col" rowspan="2">N0</th>
            <th scope="col" rowspan="2">NAMA MATERIAL</th>
            <th scope="col" rowspan="2">SATUAN</th>
            <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
            <th scope="col" rowspan="2">JUMLAH</th>
          </tr>
          <tr>
          <?php
            foreach ($dataRuangan as $row) {
              ?>
                  <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
              <?php
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
            foreach ($dataMaterialBawangParent as $row) {
              ?>
              <tr>
                    <th scope="row"></th>
                    <td><b><a href="<?php echo base_url()?>c_report/detailMaterial/<?php echo $row['MPBA_ID']?>"><?php echo $row['MPBA_NAME'] ?></a></b></td>
                    <th></th>
                    <?php
                      foreach ($dataRuangan as $r) {
                        ?>
                            <th scope="1"></th>
                        <?php
                      }
                    ?>
                    <th scope="1"></th>
                </tr>
              <?php
              $dataBarangChildById = $this->m_report->getMaterialChildByMpbaId($row['MPBA_ID']); 
              foreach ($dataBarangChildById as $row) {
                ?>
                <tr>
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <td><?php echo $row['MCBA_NAME'] ?></td>
                  <td><?php echo $row['SATU_NAME'] ?></td>
                  <?php
                    foreach ($dataRuangan as $key) {
                      $total = $this->m_report->getTotalMaterialBawangByRuangan($row['MPBA_ID'],$row['MCBA_ID'],$key['RUAN_ID']);
                      ?>
                        <td scope="1">
                          <?php
                            if (isset($total[0]['TOTAL_RUANGAN'])) {
                              echo $total[0]['TOTAL_RUANGAN'];
                            }else{
                              echo "-";
                            }
                          ?>
                        </td>
                      <?php
                    }
                    $total = $this->m_report->getTotalSaldoMaterialBawang($row['MPBA_ID'],$row['MCBA_ID']);
                  ?>
                  <td class="right" ><?php echo $total['TOTAL'] ?></td>
                </tr>
                <?php
                $no++;
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>



  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Keuangan</span></h3><br>
      <a href="<?php echo base_url('index.php/c_report/exportKeuangan') ?>">Export ke Excel</a><br>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="lookup" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Saldo</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
              foreach ($dataKeuangan as $row) {
                ?>
                  <tr>
                    <td class="center"><?php echo $no ?></td>
                    <td class="center"><?php echo $row['KEUA_TANGGAL'] ?></td>
                    <td><?php echo $row['KEUA_RINCIAN'] ?></td>
                    <td class="right"><?php echo $row['KEUA_MASUK'] ?></td>
                    <td class="right"><?php echo $row['KEUA_KELUAR'] ?></td>
                    <td class="right"><?php echo $row['KEUA_SALDO'] ?></td>
                  </tr>
                <?php                    
                $no++;
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>


  <!-- Inventaris Bawang Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Inventaris Bawang </span></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="finance" class="table table-bordered table-hover">
        <thead >
          <tr>
            <th scope="col">N0</th>
            <th scope="col">NAMA BARANG</th>
            <th scope="col">QTY</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
          </tr>
          </thead>
          <tbody>
        <?php
        $no = 1;
          foreach ($dataInventarisParent as $row) {
            $getTotal = $this->m_report->getTotalQtyByInpaId($row['INPA_ID']);
            ?>
            <tr class="success">
              <th scope="row" class="center"><?php echo $no ?></th>
              <th><b><?php echo $row['INPA_NAME'] ?></b></th>
              <th class="right"><?php echo $getTotal[0]['Total']?></th>
              <td></td>
              <td></td>
            </tr>
            <?php
            $dataBarangChildById = $this->m_report->getInventarisChildByInpaId($row['INPA_ID']); 
            foreach ($dataBarangChildById as $row) {
              ?>
              <tr>
                <th scope="row"></th>
                <td ><?php echo $row['INCH_NAME'] ?></td>
                <td class="right"><?php echo $row['INCH_QTY'] ?></td>
                <td><?php echo $row['INVE_KEADAAN'] ?></td>
                <td><?php echo $row['INVE_KETERANGAN'] ?></td>
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

  <!-- Inventaris Cimuning Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Inventaris Cimuning </span></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="inventaris_bawang" class="table table-bordered table-hover">
        <thead >
          <tr>
            <th scope="col">N0</th>
            <th scope="col">NAMA BARANG</th>
            <th scope="col">QTY</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
          </tr>
          </thead>
          <tbody>
        <?php
        $no = 1;
          foreach ($dataInventarisParentCimuning as $row) {
            $getTotal = $this->m_report->getTotalQtyCimuningByInpaId($row['INPA_ID']);
            ?>
            <tr class="success">
              <th scope="row" class="center"><?php echo $no ?></th>
              <th><b><?php echo $row['INPA_NAME'] ?></b></th>
              <th class="right"><?php echo $getTotal[0]['Total']?></th>
              <td></td>
              <td></td>
            </tr>
            <?php
            $dataBarangChildCimuningById = $this->m_report->getInventarisChildCimuningByInpaId($row['INPA_ID']); 
            foreach ($dataBarangChildCimuningById as $row) {
              ?>
              <tr>
                <th scope="row"></th>
                <td ><?php echo $row['INCH_NAME'] ?></td>
                <td class="right"><?php echo $row['INCH_QTY'] ?></td>
                <td><?php echo $row['INVE_KEADAAN'] ?></td>
                <td><?php echo $row['INVE_KETERANGAN'] ?></td>
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
</section>

<script type="text/javascript">
    $(function () {
        $('#stock').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel' ]
        } );
        $('#stock_cimuning_jadi').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel' ]
        } );
        $('#material_bawang').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel' ]
        } );
        $('#inventaris_bawang').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel' ]
        } );
        $('#finance').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel' ]
        } );
        table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    });
</script>
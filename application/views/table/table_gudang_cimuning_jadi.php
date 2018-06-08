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
                      if (isset($total)) {
                        echo $total;
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
        $('#finance').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    });
</script>
<!-- Main content -->
<section class="content">

  <!-- Inventaris Cimuning Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Inventaris Cimuning </span></h3>

      <div class="box-tools pull-right">
        
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        
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
            <th>Action</th>
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
              <td></td>
            </tr>
            <?php
            $dataBarangChildCimuningById = $this->m_report->getInventarisChildCimuningByInpaId($row['INPA_ID']); 
            foreach ($dataBarangChildCimuningById as $row) {
              ?>
              <tr>
                <th scope="row"></th>
                <td ><?php echo $row['INCH_NAME'] ?></td>
                <td class="right"><?php echo $row['INVE_QTY'] ?></td>
                <td><?php echo $row['INVE_KEADAAN'] ?></td>
                <td><?php echo $row['INVE_KETERANGAN'] ?></td>
                <td>
                  <a href="">Edit</a>
                  |
                  <a onclick="return confirm('Apa anda ingin menghapus data <?php echo $row['INCH_NAME'] ?> ? ')" href="<?php echo base_url()?>c_inventaris/delete/<?php echo $row['INVE_ID'] ?>">Delete</a>
                </td>
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
          buttons: [ 'pdf' ]
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
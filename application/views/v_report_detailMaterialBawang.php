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
      $jumlah = 0;
      foreach ($dataBarang as $row) {
        if ($noWarna > 4) {
          $noWarna = 0;
        }
        ?>
          <div class="col-md-12">
            <div class="box box-<?php echo $warna[$noWarna] ?> box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Detail dari <?php echo $row['MCBA_NAME'] ?></h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="detailStock<?php echo $jumlah?>" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th colspan="120"><?php echo $row['MCBA_NAME'] ?></th>
                    </tr>
                    <tr>
                      <th scope="col">TANGGAL</th>
                      <th scope="col">KETERANGAN</th>
                      <th scope="1">MASUK</th>
                      <th scope="1">KELUAR</th>
                      <th scope="1">SALDO</th>
                      <th scope="col">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $dataBarangChild = $this->m_report->getMaterialBawangByMcbaId($row['MCBA_ID']);
                      $saldo = array();
                      $subTotal = 0;
                      foreach ($dataBarangChild as $row2) {
                        ?>
                          <tr>
                            <th scope="row">
                              <?php 
                                echo date("D d M Y ( h:m:s a )", strtotime($row2['MABA_TIMESTAMP']));
                              ?>
                            </th>
                            <td><?php echo $row2['MABA_URAIAN'] ?></td>
                            <td><?php echo $row2['MABA_MASUK'] ?></td>
                            <td><?php echo $row2['MABA_KELUAR'] ?></td>
                            <td><?php echo $row2['MABA_SALDO'] ?></td>
                            <?php 
                              $subTotal = $subTotal + $row2['MABA_SALDO'];
                            ?>
                              <td><?php echo $subTotal; ?></td>
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
        $jumlah++;
      }
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
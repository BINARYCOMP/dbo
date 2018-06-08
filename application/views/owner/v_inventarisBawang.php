  <div class="content">
    <div class="row">
      <!-- Inventaris Bawang Report -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><span class="text-center">Laporan Inventaris Bawang </span></h3>

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
              </tr>
              </thead>
              <tbody>
            <?php
            $no = 1;
              foreach ($dataInventarisParentBawang as $row) {
                $getTotal = $this->m_report->getTotalQtyBawangByInpaId($row['INPA_ID']);
                ?>
                <tr class="success">
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <th><b><?php echo $row['INPA_NAME'] ?></b></th>
                  <th class="right"><?php echo $getTotal[0]['Total']?></th>
                  <td></td>
                  <td></td>
                </tr>
                <?php
                $dataBarangChildBawangById = $this->m_report->getInventarisChildBawangByInpaId($row['INPA_ID']); 
                foreach ($dataBarangChildBawangById as $row) {
                  ?>
                  <tr>
                    <th scope="row"></th>
                    <td ><?php echo $row['INCH_NAME'] ?></td>
                    <td class="right"><?php echo $row['INVE_QTY'] ?></td>
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
    </div>
  </div>

<!-- SCRIPT -->
<script type="text/javascript">
    $( function (){
      $('#inventaris_bawang').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        });
    });
</script>
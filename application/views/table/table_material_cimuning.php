<!-- Material Cimuning Report -->
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"><span class="text-center">Laporan Material [ Gudang Cimuning ]</span></h3><br>
    <div class="box-tools pull-right">
      
      <a href="<?php echo base_url('index.php/c_report/exportMaterialCimuning') ?>">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
      </a>
      
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="material_cimuning" class="table table-bordered table-striped table-hover">
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
          foreach ($dataMaterialCimuningParent as $row) {
            ?>
            <tr>
                  <th scope="row"></th>
                  <td><b><a href="<?php echo base_url()?>c_report/detailMaterialCimuning/<?php echo $row['MPCI_ID']?>"><?php echo $row['MPCI_NAME'] ?></a></b></td>
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
            $dataBarangChildById = $this->m_report->getMaterialChildByMpciId($row['MPCI_ID']); 
            foreach ($dataBarangChildById as $row) {
              ?>
              <tr>
                <th scope="row" class="center"><?php echo $no ?></th>
                <td><?php echo $row['MCCI_NAME'] ?></td>
                <td><?php echo $row['SATU_NAME'] ?></td>
                <?php
                  foreach ($dataRuangan as $key) {
                    $total = $this->m_report->getTotalMaterialCimuningByRuangan($row['MPCI_ID'],$row['MCCI_ID'],$key['RUAN_ID']);
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
                  $total = $this->m_report->getTotalSaldoMaterialCimuning($row['MPCI_ID'],$row['MCCI_ID']);
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
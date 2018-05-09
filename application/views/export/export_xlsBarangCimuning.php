
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Jadi Cimuning ]</span></h3><br>
      
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="stock_cimuning_jadi" class="table table-bordered table-striped table-hover" border="1" width="100%">
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
            foreach ($dataBarangParentCimuning as $row) {
              ?>
              <tr style="color:#ffffff; background-color: #0984e3;">
                    <th scope="row"></th>
                    <td><b><a href="<?php echo base_url()?>c_report/detailBarangCimuning/<?php echo $row['BACP_ID']?>"><?php echo $row['BACP_NAME'] ?></a></b></td>
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
              $dataBarangChildById = $this->m_report->getBarangChildCimuningByBacpId($row['BACP_ID']); 
              foreach ($dataBarangChildById as $row) {
                ?>
                <tr>
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <td><?php echo $row['BACC_NAME'] ?></td>
                  <td><?php echo $row['SATU_NAME'] ?></td>
                  <?php
                    foreach ($dataRuangan as $key) {
                      $total = $this->m_report->getTotalCimuningByRuangan($row['BACP_ID'],$row['BACC_ID'],$key['RUAN_ID']);
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
                    $total = $this->m_report->getTotalSaldoCimuning($row['BACP_ID'],$row['BACC_ID']);
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
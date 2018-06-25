<div class="col-md-12">
  <table id="inven" class="table table-bordered table-hover">
    <thead >
      <tr>
        <th scope="col">N0</th>
        <?php
        if ($_SESSION['level'] == 'SUPER ADMIN') {
          ?>
            <th scope="col">Action</th>
          <?php
        }
        ?>
        <th scope="col">Tanggal</th>
        <th scope="col">DI INPUT OLEH</th>
        <th scope="col">NAMA BARANG</th>
        <th scope="col">QTY</th>
        <th>Kondisi</th>
        <th>Keterangan</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
          foreach ($datanya as $row) {
            $getTotal = $this->report->$model1($row['INPA_ID'],$awal, $akhir, $bulan, $tahun,$keterangan);
            ?>
            <tr class="success">
              <th scope="row" class="center"><?php echo $no ?></th>
              <?php
              if ($_SESSION['level'] == 'SUPER ADMIN') {
                ?>
                  <th></th>
                <?php
              }
              ?>
              <th></th>
              <th></th>
              <th><b><?php echo $row['INPA_NAME'] ?></b></th>
              <th class="right"><?php echo $getTotal[0]['Total']?></th>
              <td></td>
              <td></td>
            </tr>
            <?php
            $dataBarangChildGudangById = $this->report->$model2($row['INPA_ID'], $keterangan, $awal, $akhir, $bulan, $tahun,$keterangan); 
            foreach ($dataBarangChildGudangById as $row) {
              ?>
              <tr>
                <th scope="row"></th>
                <?php
                  if ($_SESSION['level'] == 'SUPER ADMIN') {
                    ?>
                    <td scope="row">
                      <a onclick="return confirm('Apa anda yakin ?')" href="<?=base_url()?>">
                        Delete
                      </a>
                      |
                      <a href="<?=base_url().$controller?>/form_update/<?=$row['INVE_ID']?>">
                        Edit
                      </a>
                    </td>
                    <?php
                  }
                  ?>
                  <th scope="row">
                    <?php
                      echo C_filter::format(date("D d M Y ", strtotime($row['INVE_TANGGAL'])));
                    ?>
                  </th>
                <th scope="row"><?= $row['PEGA_NAME']?></th>
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
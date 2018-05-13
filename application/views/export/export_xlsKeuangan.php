<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Keuangan</span></h3><br>


    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="lookup" class="table table-bordered table-striped table-hover" border="1" width="100%">
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
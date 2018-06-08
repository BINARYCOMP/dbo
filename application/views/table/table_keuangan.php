<!-- Keuagan -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Keuangan</span></h3><br>
      <div class="box-tools pull-right">
        
        <a href="<?php echo base_url('index.php/c_report/exportKeuangan') ?>">
          <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        </a>
        
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
<table id="keua" class="table table-bordered table-striped table-hover">
  <thead>
      <tr>
        <th>Tanggal</th>
        <th>Di Input Oleh</th>
        <th>Uraian</th>
        <th>Nama Vendor</th>
        <th>Nomor Rekening</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Pajak</th>
        <th>Saldo</th>
        <?php
        if ($_SESSION['level'] == 'SUPER ADMIN' ) {
          ?>
            <th style="text-align: center" >Action </th>
          <?php
        }
        ?>
      </tr>
    </thead>
    <tbody>
     <?php  
      $saldo    = 0;
      foreach($dataKeuangan as $row){
        if ($row['KEUA_MASUK'] != 0) {
          $subTotal = $row['KEUA_MASUK'];
          $pajak    = $subTotal * $row['KEUA_PAJAK'];
          $subTotal = $subTotal - $pajak;
        }else{
          $subTotal = $row['KEUA_MASUK'] - $row['KEUA_KELUAR'] ;
          $pajak    = $subTotal * $row['KEUA_PAJAK'];
          $subTotal = $subTotal - $pajak;
        }
        $saldo = $saldo + $subTotal;
        
        if ($row['KEUA_PAJAK'] == '0.1') {
          $pajak = 'PPN';
        }else if ($row['KEUA_PAJAK'] == '0.015') {
          $pajak = 'PPH';
        }else{
          $pajak = 'NON-PAJAK';
        }
      ?>  
        <tr>
          <td><?php echo $row['KEUA_TANGGAL']; ?></td>
          <td><?php echo $row['PEGA_NAME']; ?></td>
          <td><?php echo $row['KEUA_RINCIAN']; ?></td>
          <td><?php echo $row['PERU_NAME']; ?></td>
          <td><?php echo $row['PERU_NOMORREKENING']; ?></td>
          <td class="right"><?php echo $row['KEUA_MASUK']; ?></td>
          <td class="right"><?php echo $row['KEUA_KELUAR']; ?></td>
          <td class="right"><?php echo $pajak ?></td>
          <td class="right"><?=$saldo?></td>
          <?php
            if ($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN' ) {
            ?>
                <td class="center">
                  <a href="<?php echo base_url().'c_keuangan/delete/'.$row['KEUA_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
              <?php
        }
        ?>  
        </tr>
     <?php 
        }
      ?>
    </tbody>
  </table>
</table>
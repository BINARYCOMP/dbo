<!-- modal child -->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lookup Barang Child</h4>
    </div>
    <div class="modal-body">
        <table id="gujaChild" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Total Barang</th>
                <th>Satuan</th>
              </tr>
            </thead>
            <tbody>
              <?php
<<<<<<< HEAD

=======
              $no=1;
>>>>>>> d8157d6bf7db9ba467a27f2435bbb1c853f4935e
              if (is_array($namaChild) || is_object($namaChild)){
                $no=1;
                foreach ($namaChild as $row) {
                  ?>
                    <tr class="isi2" data-brgChild="<?php echo $row['BACH_ID']; ?>">
<<<<<<< HEAD
                      <td> <?php echo $no ?> </td>
                      <td> <?php echo $row['BACH_ID']?> </td>
                      <td> <?php echo $row['BACH_NAME']?> </td>
                      <td> <?php echo $row['BACH_GUJA_TOTAL']?> </td>
                      <td> <?php echo $row['BAPA_NAME']?> </td>
=======
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['BACH_NAME']?></td>
                      <td><?php echo $row['BACH_GUJA_TOTAL']?></td>
                      <td><?php echo $row['BAPA_NAME']?></td>
>>>>>>> d8157d6bf7db9ba467a27f2435bbb1c853f4935e
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
 
<script type="text/javascript">
$(function () {
  $("#gujaChild").dataTable();
   });
</script>
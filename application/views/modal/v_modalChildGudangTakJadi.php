<!-- modal child -->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lookup Barang Child</h4>
    </div>
    <div class="modal-body">
        <table id="gutaChild" class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Total Barang</th>
                <th>Satuan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (is_array($namaChild) || is_object($namaChild)){
                foreach ($namaChild as $row) {
                  ?>
                    <tr class="pilih2" data-brgChildTakJadi="<?php echo $row['BACH_ID']; ?>">
                      <!-- <td><?php echo $no ?></td> -->
                      <td><?php echo $row['BACH_ID']?></td>
                      <td><?php echo $row['BACH_NAME']?></td>
                      <td><?php echo $row['BACH_GUJA_TOTAL']?></td>
                      <td><?php echo $row['BACH_SATU_ID']?></td>
                    </tr>
                  <?php
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
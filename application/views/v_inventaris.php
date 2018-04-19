<form action="<?php echo base_url()?>c_inventaris/save" method="POST">
  <a href="#"> List Inventaris </a><br>
      Nama Induk Inventaris
      <select name="cmbParent" onchange="showChild(this.value)" onclick="showChild(this.value)">
        <option>=== Pilih Induk Inventaris ===</option>
        <?php
          foreach ($dataParent as $row) {
            echo "<option value ='".$row['INPA_ID']."'> ".$row['INPA_NAME']." </option>";
          }
        ?>
      </select> <br>
  <a href="#"> List Anak Inventaris </a><br>
      Nama Anak Inventaris
      <span name="cmbChild" id="txtChild">
        <select>
          <option>== Pilih Anak Inventaris ==</option>
          <?php
            foreach ($dataChild as $row) {
              echo "<option value ='".$row['INCH_ID']."'> ".$row['INCH_NAME']." </option>";
            }
          ?>
        </select> 
      </span><br>
      Qty 
      <span id="qty">
        <input type="number" name="txtQty" required placeholder="0">  
      </span>
      <br>
      Kondisi
      <input type="radio" name="rbtKondisi" value="Baik"> Baik
      <input type="radio" name="rbtKondisi" value="Rusak"> Rusak  <br>
      Keterangan <textarea name="txtKeterangan"></textarea><br>
  <input type="submit" value="Simpan">
</form>
<hr>

<table>
  <tr>
    <th>No.</th>
    <th>Nama Barang</th>
    <th>Qty</th>
    <th>Kondisi</th>
    <th>Keterangan</th>
  </tr>
  <?php
  $no = 1;
  foreach ($dataInventaris as $row) {
      ?>
        <tr>
          <td><?php echo $no ?></td>
          <td colspan="3"><?php echo $row['INPA_NAME']?></td>
        </tr>
      <?php
      $getChildbyInpaId = $this->m_inventaris->getChildbyInpaId($row['INPA_ID']);
      foreach ($getChildbyInpaId as $rowChild) {
      ?>
        <tr>
          <td></td>
          <td><?php echo $rowChild['INCH_NAME'] ?></td>
          <td><?php echo $rowChild['INCH_QTY'] ?></td>
      <?php
      }
      ?>
          <td><?php echo $row['INVE_KEADAAN'] ?></td>
          <td><?php echo $row['INVE_KETERANGAN'] ?></td>
        </tr>
      <?php
    $no++;
    }
  ?>
</table>




<!-- SCRIPT -->
<!-- javascript child -->
<script>
  function showChild(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtChild").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_inventaris/searchChild?q="+str, true);
    xhttp.send();   
  }
  function showQty(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("qty").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_inventaris/searchQty?q="+str, true);
    xhttp.send();   
  }
</script>
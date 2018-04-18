<form action="<?php echo base_url()?>c_gudangJadi/inputStok" method="POST">
  <a href="#"> List Inventaris </a><br>
      Nama Induk Inventaris
      <select name="cmbParent" onchange="showChild(this.value)" onclick="showChild(this.value)">
        <option value="0">== Pilih Induk Inventaris ==</option>
        <?php  
          foreach ($namaParent as $row){
            echo "<option value='".$row['BAPA_ID']."'>";
            echo $row ['BAPA_NAME'];
           echo "</option>";
          }
           ?>
      </select> <br>
  <a href="#"> List Anak Inventaris </a><br>
      Nama Anak Inventaris
      <span id="txtChild">
        <select>
          <option>== Pilih Anak Inventaris ==</option>
        </select> 
      </span><br>
      Qty <input type="number" name="txtQty" required placeholder="0">  
      <br>
      Keterangan <textarea name="txtKeterangan"></textarea><br>
      Kondisi
      <input type="radio" name="rbtBaik" value="Baik"> Baik
      <input type="radio" name="rbtBaik" value="Rusak"> Rusak  <br>
  <input type="submit" value="Simpan">
</form>
<hr>

<table>
  <tr>
    <th>No.</th>
    <th>Induk Inventaris</th>
    <th>Anak Inventaris</th>
    <th>Uraian</th>
    <th>Masuk</th>
    <th>Keluar</th>
    <th>Saldo</th>
  </tr>
  <?php
  $no = 1;
  foreach ($dataInventaris as $row) {
    ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $row['BAPA_NAME'] ?></td>
        <td><?php echo $row['BACH_NAME'] ?></td>
        <td><?php echo $row['GUJA_URAIAN'] ?></td>
        <td><?php echo $row['GUJA_MASUK'] ?></td>
        <td><?php echo $row['GUJA_KELUAR'] ?></td>
        <td><?php echo $row['BACH_GUJA_TOTAL'] ?></td>
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
  xhttp.open("GET", "<?php echo base_url()?>c_gudangJadi/searchChild?q="+str, true);
  xhttp.send();   
}
</script>
<!-- javascript saldo Awal -->
<script>
function showStok(str) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtStok").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url()?>c_gudangJadi/searchStok?q="+str, true);
  xhttp.send();   
}
</script>

<!-- javascript saldo Akhir -->
<script type="text/javascript">
  function showSaldo(){
    var saldoAwal = parseInt(document.getElementById("saldoAwal").value);
    var brgKeluar = parseInt(document.getElementById("brgKeluar").value);
    var brgMasuk  = parseInt(document.getElementById("brgMasuk").value);
    var saldoAkhir;
    saldoAkhir = saldoAwal + brgMasuk - brgKeluar;

    document.getElementById("saldoAkhir").value = saldoAkhir;
  }
</script>

<?php echo $message ?>
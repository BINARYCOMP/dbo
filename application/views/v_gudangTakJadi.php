<form action="<?php echo base_url()?>c_gudangTakJadi/inputStok" method="POST">
  <a href="#"> List Barang </a><br>
      Nama Barang Parent
      <select name="cmbParent" onchange="showChild(this.value)">
        <option value="0">== Pilih Induk Barang ==</option>
        <?php  
          foreach ($namaParent as $row){
            echo "<option value='".$row['BAPA_ID']."'>";
            echo $row ['BAPA_NAME'];
           echo "</option>";
          }
        ?>
      </select> <br>
  <a href="#"> List Anak Barang </a><br>
      Nama Barang Child
      <span id="txtChild">
        <select>
          <option>== Pilih Anak Barang ==</option>
        </select>
      </span><br>
      Saldo Awal <br>
      <span id="txtStok"> 
        <input type="text" name="txtSaldoAwal" required id="saldoAwal" readonly placeholder="0">  
      </span><br><br>
      Uraian <textarea name="txtUraian"></textarea><br>
      Masuk <input type="number" name="txtMasuk" id="brgMasuk" onkeyup="showSaldo()" onclick="showSaldo()" value="0"><br>
      Keluar <input type="number" name="txtKeluar" id="brgKeluar" onkeyup="showSaldo()" onclick="showSaldo()" value="0"><br>
      Saldo Akhir <input type="number" disabled name="txtSaldoAkhir" id="saldoAkhir"><br>
  <input type="submit" value="Simpan">
</form>
<hr>
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
  xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/searchChild?q="+str, true);
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
  xhttp.open("GET", "<?php echo base_url()?>c_gudangTakJadi/searchStok?q="+str, true);
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

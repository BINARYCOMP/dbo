<form action="<?php echo base_url()?>c_gudangJadi/inputStok" method="POST">
  <button> List Barang </button> <br>
  <input type="hidden" value="1" name="txtParent">
  Nama Barang <input type="text" disabled name="txtNamaBarang"> <br>
  <button> List Anak Barang </button><br>
  <input type="hidden" value="1" name="txtChild">
  Nama Anak Barang <input type="text" disabled name="txtNamaBarang"><br>
  Saldo Awal <input type="number" disabled ><br>
  <input type="hidden" value="100" name="txtSaldoAwal"><br>
  Masuk <input type="number" name="txtMasuk"><br>
  Keluar <input type="number" name="txtKeluar"><br>
  Saldo Akhir <input type="number" disabled ><br>
  <input type="submit" value="Simpan">
</form>
<hr>
<?php echo $message ?>

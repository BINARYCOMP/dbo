<form action="<?php echo base_url()?>c_keuangan/simpan">
	Tanggal <input type="date" name="dtmTanggal"> <br>
	Uraian	<textarea name="txtUraian" required="true"></textarea><br>
	Debet	<input type="number" name="txtDebet"><br>
	Kredit	<input type="number" name="txtKredit"><br>
	Saldo	<input type="number" disabled="true" name=""><br>
	<input type="hidden" disabled="true" name="txtSaldo">
	<input type="submit" name="btnSubmit" value="Simpan">
</form>
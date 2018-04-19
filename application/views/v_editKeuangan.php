<form action="<?php echo base_url(). 'c_keuangan/update/' .$keuangan[0]['KEUA_ID']; ?>" method="post">

	Tanggal <input type="date" name="dtmTanggal" value="<?php echo($keuangan[0]['KEUA_TANGGAL'])?>"> <br>
	Uraian	<textarea name="txtUraian" required="true" value="<?php echo($keuangan[0]['KEUA_RINCIAN'])?>"></textarea><br>
	Debet	<input type="number" name="txtDebet" value="<?php echo($keuangan[0]['KEUA_MASUK'])?>"><br>
	Kredit	<input type="number" name="txtKredit" value="<?php echo($keuangan[0]['KEUA_KELUAR'])?>"><br>
	Saldo	<input type="number" disabled="true" name="" value="<?php echo($keuangan[0]['KEUA_SALDO'])?>"><br>
	<input type="hidden" disabled="true" name="txtSaldo">
	<input type="submit" name="btnSubmit" value="Simpan">
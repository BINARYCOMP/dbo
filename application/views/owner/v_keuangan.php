<!-- Main content -->
<div class="content">
	<div class="row">
	
	</div>
</div>
<!-- /.content -->
<script type="text/javascript">
	function saldo(id) {
		var masuk,keluar,rumus,awal; 
		if (id == 'masuk') {
			masuk 	= document.getElementById('masuk').value;
			document.getElementById('keluar').value = 0;
			keluar  = document.getElementById('keluar').value;;
		}else if (id == 'keluar') {
			keluar  = document.getElementById('keluar').value;;
			document.getElementById('masuk').value = 0;
			masuk  = document.getElementById('masuk').value;;
		}
		awal 	= document.getElementById('saldoAwal').value;
		rumus 	= parseInt(awal)  + parseInt(masuk) - parseInt(keluar);
		document.getElementById('saldoAkhirMuncul').value = rumus;
		document.getElementById('saldoAkhir').value = rumus;
		
	}
</script>
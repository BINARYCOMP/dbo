<!-- Main content -->
<div class="content">
	<div class="row">
	<!-- Keuagan -->
	  <div class="box box-default">
	    <div class="box-header with-border">
	      <h3 class="box-title"><span class="text-center">Laporan Keuangan</span></h3><br>
	      <div class="box-tools pull-right">
	        
	        <a href="<?php echo base_url('index.php/c_report/exportKeuangan') ?>">
	          <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
	        </a>
	        
	        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	      </div>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <div class="col-md-12">
	        <div class="box box-primary box-solid collapsed-box">
	          <div class="box-header with-border">
	            <h3 class="box-title">Filter Data</h3>

	            <div class="box-tools pull-right">
	              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
	              </button>
	            </div>
	            <!-- /.box-tools -->
	          </div>
	          <!-- /.box-header -->
	          <div class="box-body" style="display: none">
	            <div class="col-md-4">
	              <div class="form-group col-md-6">
	                  <label class=" control-label">Tanggal Awal</label>
	                  <div>
	                  <select class="form-control" name="cmbHariPertama" id="cmbHariPertama3">
	                    <option value="0">=== Pilih Tanggal ===</option>
	                    <?php
	                      for ($i=1; $i < 31; $i++) { 
	                        echo "<option value = '$i'>$i</option>";
	                      }
	                    ?>
	                  </select>
	                  </div>
	              </div>
	              <div class="form-group col-md-6">
	                  <label class=" control-label">Tanggal Akhir</label>
	                  <div>
	                  <select class="form-control" name="cmbHariKedua" id="cmbHariKedua3">
	                    <option value="31">=== Pilih Tanggal ===</option>
	                    <?php
	                      for ($i=1; $i < 31; $i++) { 
	                        echo "<option value = '$i'>$i</option>";
	                      }
	                    ?>
	                  </select>
	                  </div>
	              </div>
	            </div>
	            <div class="form-group col-md-4">
	                <label class=" control-label">Bulan</label>
	                <div>
	                  <select name="cmbBulan" id="cmbBulan3" class="form-control">
	                    <option value=<?=date('m')?>>=== Pilih Bulan ====</option>
	                    <option value="1">Januari</option>
	                    <option value="2">Februari</option>
	                    <option value="3">Maret</option>
	                    <option value="4">April</option>
	                    <option value="5">Mei</option>
	                    <option value="6">Juni</option>
	                    <option value="7">Juli</option>
	                    <option value="8">Agustus</option>
	                    <option value="9">September</option>
	                    <option value="10">Oktober</option>
	                    <option value="11">November</option>
	                    <option value="12">Desember</option>
	                  </select>
	                </div>
	            </div>
	            <div class="form-group col-md-4">
	                <label class=" control-label">Tahun</label>
	                <div>
	                <select class="form-control" name="cmbTahun" id="cmbTahun3">
	                  <option value="<?php echo date('Y'); ?>">=== Pilih Tahun ===</option>
	                  <?php
	                    $tahun_sekarang = date('Y');
	                    $tahun_dulu     = date('Y')-10;
	                    for ($i=$tahun_dulu; $i <= $tahun_sekarang; $i++) { 
	                      echo "<option value = '$i'>$i</option>";
	                    }
	                  ?>
	                </select>
	                </div>
	            </div>
	          </div>
	          <div class="box-footer">
	            <button class="btn btn-primary pull-right" onclick="filterTanggal3()">Filter</button>
	          </div>
	          <!-- /.box-body -->
	        </div>
	        <!-- /.box -->
	      </div>
	      <div class="col-md-12">
	        <div id="table_keseluruhan_keuangan">
	          <table id="lookup" class="table table-bordered table-striped table-hover">
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
	                      if ($_SESSION['level'] == 'SUPER ADMIN' ) {
	                      ?>
	                          <td class="center">
	                            <a href="<?php echo base_url().'c_keuangan/delete/'.$row['KEUA_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
	                            |
	                            <a href="<?php echo base_url().'c_keuangan/update_form/'.$row['KEUA_ID']; ?>"> Edit</a>
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
	        </div>
	      </div>
	    </div>
	  </div>
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
<!-- Main content -->
<section class="content">
  <!-- Stock Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Stock Report</span></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped table-hover">
        <thead >
        <tr>
          <th scope="col" rowspan="2">N0</th>
          <th scope="col" rowspan="2">NAMA BARANG</th>
          <th scope="col" rowspan="2">SATUAN</th>
          <th scope="col" colspan="5">GUDANG</th>
          <th scope="col" rowspan="2">JUMLAH</th>
        </tr>
        <tr>
          <th scope="1">2</th>
          <th scope="1">3</th>
          <th scope="1">7</th>
          <th scope="1">8</th>
          <th scope="1">9</th>
        </tr>
        </thead>
        <tbody>
  		<?php
  		$no = 1;
  			foreach ($dataBarangParent as $row) {
  				?>
  				<tr>
                <th scope="row"></th>
                <td colspan="8"><b><a href="<?php echo base_url()?>c_report/detailBarang/<?php echo $row['BAPA_ID']?>"><?php echo $row['BAPA_NAME'] ?></a></b></td>
            </tr>
  				<?php
  				$dataBarangChildById = $this->m_report->getBarangChildByBapaId($row['BAPA_ID']); 
  				foreach ($dataBarangChildById as $row) {
  					?>
        		<tr>
        			<th scope="row"><?php echo $no ?></th>
	        		<td><?php echo $row['BACH_NAME'] ?></td>
	        		<td><?php echo $row['SATU_NAME'] ?></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	                <td></td>
	        		<td><?php echo $row['BACH_GUJA_TOTAL'] ?></td>
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



  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Finance Report</span></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="lookup" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Saldo</th>
          </tr>
          </thead>
          <tbody>
            <?php
              foreach ($dataKeuangan as $row) {
                ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row['KEUA_TANGGAL'] ?></td>
                    <td><?php echo $row['KEUA_RINCIAN'] ?></td>
                    <td><?php echo $row['KEUA_MASUK'] ?></td>
                    <td><?php echo $row['KEUA_KELUAR'] ?></td>
                    <td><?php echo $row['KEUA_SALDO'] ?></td>
                  </tr>
                <?php                    
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>


    <!-- Inventaris Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Inventaris Report</span></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-edit"></i> Edit</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-pdf-o"></i> PDF</button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="finance" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col">N0</th>
            <th scope="col">NAMA BARANG</th>
            <th scope="col">QTY</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
          </tr>
          </thead>
          <tbody>
        <?php
        $no = 1;
          foreach ($dataInventarisParent as $row) {
            ?>
            <tr>
                  <th scope="row"></th>
                  <td colspan="8"><b><a href="<?php echo base_url()?>c_report/detailInventaris/<?php echo $row['INPA_ID']?>"><?php echo $row['INPA_NAME'] ?></a></b></td>
              </tr>
            <?php
            $dataBarangChildById = $this->m_report->getInventarisChildByInpaId($row['INPA_ID']); 
            foreach ($dataBarangChildById as $row) {
              ?>
              <tr>
                <th scope="row"><?php echo $no ?></th>
                <td><?php echo $row['INCH_NAME'] ?></td>
                <td><?php echo $row['INCH_QTY'] ?></td>
                <td><?php echo $row['INVE_KEADAAN'] ?></td>
                <td><?php echo $row['INVE_KETERANGAN'] ?></td>
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
</section>
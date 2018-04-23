<!-- Full Width Column -->
  <div class="content-wrapper">
    <div>
      <!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
		      <?php if(isset($title)) echo $title ?>
		      <small><i class="fa fa-info"></i></small>
		      <small><?php echo $_SESSION['level'] ?></small>
		    </h1>
		</section>
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
            <table id="example1" class="table table-bordered table-hover">
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
			                <td colspan="8"><b><a href="#"><?php echo $row['BAPA_NAME'] ?></a></b></td>
			            </tr>
        				<?php
        				$dataBarangChildById = $this->m_report->getBarangChildByBapaId($row['BAPA_ID']); 
        				foreach ($dataBarangChildById as $row) {
        					?>
			        		<tr>
			        			<th scope="row"><?php echo $no ?></th>
				        		<td><?php echo $row['BACH_NAME'] ?></td>
				        		<td><?php echo $row['SATU_NAME'] ?></td>
				                <td>6.234</td>
				                <td>1.980</td>
				                <td>2.0908</td>
				                <td>3.757</td>
				                <td>5.532</td>
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

          <!-- /.box-body -->
          <div class="box-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>

        </div>
        <!-- /.box -->

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
            <table id="example1" class="table table-bordered table-hover">
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
              <tr>
                <td>1</td>
                <td>12/01/2018</td>
                <td>Pembelian Bahan Material</td>
                <td>Rp. 60.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.000.000</td>
              </tr>
              <tr>
                <td>2</td>
                <td>22/04/2018</td>
                <td>Pembelian Bahan Utama baju</td>
                <td>Rp. 20.000</td>
                <td>Rp. 70.000</td>
                <td>Rp. 1.300.000</td>
              </tr>
              <tr>
                <td>3</td>
                <td>14/06/2018</td>
                <td>Pembelian Bahan Utama Sepatu</td>
                <td>Rp. 29.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.900.000</td>
              </tr>
              <tr>
                <td>4</td>
                <td>04/06/2018</td>
                <td>Pembelian Servis Peralatan</td>
                <td>Rp. 78.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.700.000</td>
              </tr>
              <tr>
                <td>5</td>
                <td>10/07/2018</td>
                <td>Pembelian Mesin Produksi</td>
                <td>Rp. 58.000</td>
                <td>Rp. 20.000</td>
                <td>Rp. 1.100.000</td>
              </tr>
              <tr>
                <td>6</td>
                <td>12/01/2018</td>
                <td>Pembelian Bahan Material</td>
                <td>Rp. 60.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.000.000</td>
              </tr>
              <tr>
                <td>7</td>
                <td>22/04/2018</td>
                <td>Pembelian Bahan Utama baju</td>
                <td>Rp. 20.000</td>
                <td>Rp. 70.000</td>
                <td>Rp. 1.300.000</td>
              </tr>
              <tr>
                <td>8</td>
                <td>14/06/2018</td>
                <td>Pembelian Bahan Utama Sepatu</td>
                <td>Rp. 29.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.900.000</td>
              </tr>
              <tr>
                <td>9</td>
                <td>04/06/2018</td>
                <td>Pembelian Servis Peralatan</td>
                <td>Rp. 78.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.700.000</td>
              </tr>
              <tr>
                <td>10</td>
                <td>10/07/2018</td>
                <td>Pembelian Mesin Produksi</td>
                <td>Rp. 58.000</td>
                <td>Rp. 20.000</td>
                <td>Rp. 1.100.000</td>
              </tr>
              <tr>
                <td>11</td>
                <td>12/01/2018</td>
                <td>Pembelian Bahan Material</td>
                <td>Rp. 60.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.000.000</td>
              </tr>
              <tr>
                <td>12</td>
                <td>22/04/2018</td>
                <td>Pembelian Bahan Utama baju</td>
                <td>Rp. 20.000</td>
                <td>Rp. 70.000</td>
                <td>Rp. 1.300.000</td>
              </tr>
              <tr>
                <td>13</td>
                <td>14/06/2018</td>
                <td>Pembelian Bahan Utama Sepatu</td>
                <td>Rp. 29.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.900.000</td>
              </tr>
              <tr>
                <td>14</td>
                <td>04/06/2018</td>
                <td>Pembelian Servis Peralatan</td>
                <td>Rp. 78.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.700.000</td>
              </tr>
              <tr>
                <td>15</td>
                <td>10/07/2018</td>
                <td>Pembelian Mesin Produksi</td>
                <td>Rp. 58.000</td>
                <td>Rp. 20.000</td>
                <td>Rp. 1.100.000</td>
              </tr>
              <tr>
                <td>16</td>
                <td>12/01/2018</td>
                <td>Pembelian Bahan Material</td>
                <td>Rp. 60.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.000.000</td>
              </tr>
              <tr>
                <td>17</td>
                <td>22/04/2018</td>
                <td>Pembelian Bahan Utama baju</td>
                <td>Rp. 20.000</td>
                <td>Rp. 70.000</td>
                <td>Rp. 1.300.000</td>
              </tr>
              <tr>
                <td>18</td>
                <td>14/06/2018</td>
                <td>Pembelian Bahan Utama Sepatu</td>
                <td>Rp. 29.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.900.000</td>
              </tr>
              <tr>
                <td>19</td>
                <td>04/06/2018</td>
                <td>Pembelian Servis Peralatan</td>
                <td>Rp. 78.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.700.000</td>
              </tr>
              <tr>
                <td>20</td>
                <td>10/07/2018</td>
                <td>Pembelian Mesin Produksi</td>
                <td>Rp. 58.000</td>
                <td>Rp. 20.000</td>
                <td>Rp. 1.100.000</td>
              </tr>
            </tbody>
          </table>
        </div>

          <!-- /.box-body -->
          <div class="box-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
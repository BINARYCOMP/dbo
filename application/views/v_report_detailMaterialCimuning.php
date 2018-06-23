<!-- content -->
<section class="content">
  
<!-- Main Content -->
  <div class="row">
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
                <select class="form-control" name="cmbHariPertama" id="cmbHariPertama">
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
                <select class="form-control" name="cmbHariKedua" id="cmbHariKedua">
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
                <select name="cmbBulan" id="cmbBulan" class="form-control">
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
              <select class="form-control" name="cmbTahun" id="cmbTahun">
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
          <button class="btn btn-primary pull-right" onclick="filterTanggal()">Filter</button>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div id="table_keseluruhan">
      <?php
        $warna[0] = 'warning';
        $warna[1] = 'info';
        $warna[2] = 'success';
        $warna[3] = 'danger';
        $warna[4] = 'default';
        $noWarna  = 0;
        $jumlah = 0;
        foreach ($dataBarang as $row) {
          if ($noWarna > 4) {
            $noWarna = 0;
          }
          ?>
            <div class="col-md-12">
              <div class="box box-<?php echo $warna[$noWarna] ?> box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail dari <?php echo $row['MCCI_NAME'] ?></h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="detailStock<?php echo $jumlah?>" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th colspan="120"><?php echo $row['MCCI_NAME'] ?></th>
                      </tr>
                      <tr>
                        <?php
                        if ($_SESSION['level'] == 'SUPER ADMIN') {
                          ?>
                            <th scope="col">ACTION</th>
                          <?php
                        }
                        ?>
                        <th scope="col">DI INPUT OLEH</th>
                        <th scope="col">TANGGAL</th>
                        <th scope="col">KETERANGAN</th>
                        <th scope="1">MASUK</th>
                        <th scope="1">KELUAR</th>
                        <th scope="1">SALDO</th>
                        <th scope="col">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $dataBarangChild = $this->m_report->getMaterialCimuningByMcciId($row['MCCI_ID']);
                        $saldo = '0';
                        $subTotal = 0;
                        $k= 0;
                        $count = count($dataBarangChild);
                        foreach ($dataBarangChild as $row2) {
                          $saldo = $saldo + $row2['MACI_MASUK'] - $row2['MACI_KELUAR'];
                          ?>
                            <tr>
                              <?php
                              if ($_SESSION['level'] == 'SUPER ADMIN') {
                                  ?>
                                    <td class="center">
                                      <a 
                                      onclick="return confirm('Anda yakin akan menghapus data pada hari dan tanggal <?php echo C_report::format(date("D d M Y h:i:s", strtotime($row2['MACI_TANGGAL'])))?>')"
                                        href="<?php echo base_url()?>c_materialCimuning/delete/<?php echo $row2['MACI_ID']?>">Delete</a>
                                        |
                                        <a href="<?=base_url()?>c_materialCimuning/form_update/<?=$row2['MACI_ID']?>">Edit</a>
                                    </td>
                                  <?php
                              }
                              ?>
                              <td><?php echo $row2['PEGA_NAME'] ?></td>
                              <th scope="row">
                                <?php 
                                  echo C_report::format(date("D d M Y h:i:s", strtotime($row2['MACI_TANGGAL'])));
                                ?>
                              </th>
                              <td><?php echo $row2['MACI_URAIAN'] ?></td>
                              <td><?php echo $row2['MACI_MASUK'] ?></td>
                              <td><?php echo $row2['MACI_KELUAR'] ?></td>
                              <td><?=$saldo?></td>
                              <?php 
                                $subTotal = $saldo;
                              ?>
                                <td><?php echo $subTotal; ?></td>
                            </tr>
                          <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          <?php
          $noWarna++;
          $jumlah++;
        }
      ?>
    </div>
  </div>  <!-- /Main Content -->

</section>
<!-- /.content -->
<script type="text/javascript">
    $(function () {
      var jumlah = <?php echo count($dataBarang) ?> ;
      var nantinya = "#detailStock";
      for (var i = 0 ; i <= jumlah; i++) {
        $(nantinya+i).dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'excel' ]
        } );
      }
        $('#finance').dataTable( {
          "bSort": false,
          lengthChange: false,
          buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );
        // table.buttons().container()
        // .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    });
</script>
<script type="text/javascript">
  function filterTanggal() {
      var hariPertama = document.getElementById('cmbHariPertama').value;
      var hariKedua   = document.getElementById('cmbHariKedua').value;
      var bulan       = document.getElementById('cmbBulan').value;
      var tahun       = document.getElementById('cmbTahun').value;
      $.ajax({
          type: "POST", 
          data: {
            awal : hariPertama, 
            akhir: hariKedua,
            bulan: bulan,
            tahun: tahun
          },
          url: "<?php echo base_url()?>c_filter/material_cimuning/<?=$id?>",
          success: function(html) {
              $("#table_keseluruhan").html(html);
              var jumlah = <?php echo count($dataBarang) ?> ;
              var nantinya = "#detailStock";
              for (var i = 0 ; i <= jumlah; i++) {
                $(nantinya+i).dataTable( {
                  "bSort": false,
                  dom:'B <"content-header" <"col-sm-2"l> f>tipH',
                  buttons: [ 'excel' ]
                } );
              }
                $('#finance').dataTable( {
                  "bSort": false,
                  lengthChange: false,
                  buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
                } );
          }
      });
    }
</script>
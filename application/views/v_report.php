<!-- Main content -->
<section class="content">
  <!-- Stock Bawang Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Bawang ]</span></h3><br>

      <div class="box-tools pull-right">
        
        <a href="<?php echo base_url('index.php/c_report/exportBarangBawang') ?>">
          <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        </a>
        
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="stock" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col" rowspan="2">N0</th>
            <th scope="col" rowspan="2">NAMA BARANG</th>
            <th scope="col" rowspan="2">SATUAN</th>
            <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
            <th scope="col" rowspan="2">JUMLAH</th>
          </tr>
          <tr>
          <?php
            foreach ($dataRuangan as $row) {
              ?>
                  <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
              <?php
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
            foreach ($dataBarangParent as $row) {
              ?>
              <tr>
                    <th scope="row"></th>
                    <td><b><a href="<?php echo base_url()?>c_report/detailBarang/<?php echo $row['BAPA_ID']?>"><?php echo $row['BAPA_NAME'] ?></a></b></td>
                    <th></th>
                    <?php
                      foreach ($dataRuangan as $r) {
                        ?>
                            <th scope="1"></th>
                        <?php
                      }
                    ?>
                    <th scope="1"></th>
                </tr>
              <?php
              $dataBarangChildById = $this->m_report->getBarangChildByBapaId($row['BAPA_ID']); 
              foreach ($dataBarangChildById as $row) {
                ?>
                <tr>
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <td><?php echo $row['BACH_NAME'] ?></td>
                  <td><?php echo $row['SATU_NAME'] ?></td>
                  <?php
                    foreach ($dataRuangan as $key) {
                      $total = $this->m_report->getTotalByRuangan($row['BAPA_ID'],$row['BACH_ID'],$key['RUAN_ID']);
                      ?>
                        <td scope="1">
                          <?php
                            if (isset($total)) {
                              echo $total;
                            }else{
                              echo "-";
                            }
                          ?>
                        </td>
                      <?php
                    }
                    $total = $this->m_report->getTotalSaldo($row['BAPA_ID'],$row['BACH_ID']);
                  ?>
                  <td class="right" ><?php echo $total['TOTAL'] ?></td>
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

  <!-- Stock Cimuning Jadi Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Jadi Cimuning ]</span></h3><br>
      <div class="box-tools pull-right">
        
        <a href="<?php echo base_url('index.php/c_report/exportBarangCimuning') ?>">
          <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        </a>
        
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="stock_cimuning_jadi" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col" rowspan="2">N0</th>
            <th scope="col" rowspan="2">NAMA BARANG</th>
            <th scope="col" rowspan="2">SATUAN</th>
            <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
            <th scope="col" rowspan="2">JUMLAH</th>
          </tr>
          <tr>
          <?php
            foreach ($dataRuangan as $row) {
              ?>
                  <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
              <?php
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($dataBarangJadiCimuning as $row) {
          ?>
            <tr>
              <th scope="row" class="center"><?php echo $no ?></th>
              <td><b><a href="<?php echo base_url()?>c_report/detailBarangCimuning/<?php echo $row['BACC_ID']?>"><?php echo $row['BACC_NAME'] ?></a></b></td>
              <td><?php echo $row['SATU_NAME'] ?></td>
              <?php
                foreach ($dataRuangan as $key) {
                  $total = $this->m_report->getTotalCimuningByRuangan($row['BACC_ID'],$key['RUAN_ID']);
                  ?>
                    <td scope="1">
                      <?php
                        if (isset($total)) {
                          echo $total;
                        }else{
                          echo "-";
                        }
                      ?>
                    </td>
                  <?php
                }
                $total = $this->m_report->getTotalSaldoCimuning($row['BACC_ID']);
              ?>
              <td class="right" ><?php echo $total['TOTAL'] ?></td>
            </tr>
            <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Stock Cimuning Setengah Jadi Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Barang [ Gudang Setengah Jadi Cimuning ]</span></h3><br>
      <div class="box-tools pull-right">
        
        <a href="<?php echo base_url('index.php/c_report/exportBarangCimuning') ?>">
          <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        </a>
        
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="stock_cimuning_setengah_jadi" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col" rowspan="2">N0</th>
            <th scope="col" rowspan="2">NAMA BARANG</th>
            <th scope="col" rowspan="2">SATUAN</th>
            <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
            <th scope="col" rowspan="2">JUMLAH</th>
          </tr>
          <tr>
          <?php
            foreach ($dataRuangan as $row) {
              ?>
                  <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
              <?php
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($dataBarangJadiCimuning as $row) {
          ?>
            <tr>
              <th scope="row" class="center"><?php echo $no ?></th>
              <td><b><a href="<?php echo base_url()?>c_report/detailBarangCimuningSetengahJadi/<?php echo $row['BACC_ID']?>"><?php echo $row['BACC_NAME'] ?></a></b></td>
              <td><?php echo $row['SATU_NAME'] ?></td>
              <?php
                foreach ($dataRuangan as $key) {
                  $total = $this->m_report->getTotalSetengahJadiCimuningByRuangan($row['BACC_ID'],$key['RUAN_ID']);
                  ?>
                    <td scope="1">
                      <?php
                        if (isset($total)) {
                          echo $total;
                        }else{
                          echo "-";
                        }
                      ?>
                    </td>
                  <?php
                }
                $total = $this->m_report->getTotalSaldoSetengahJadiCimuning($row['BACC_ID']);
              ?>
              <td class="right" ><?php echo $total['TOTAL'] ?></td>
            </tr>
            <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Material Bawang Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Material [ Gudang Bawang ]</span></h3><br>
      <div class="box-tools pull-right">
        
        <a href="<?php echo base_url('index.php/c_report/exportMaterialBawang') ?>">
          <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        </a>
        
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="material_bawang" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col" rowspan="2">N0</th>
            <th scope="col" rowspan="2">NAMA MATERIAL</th>
            <th scope="col" rowspan="2">SATUAN</th>
            <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
            <th scope="col" rowspan="2">JUMLAH</th>
          </tr>
          <tr>
          <?php
            foreach ($dataRuangan as $row) {
              ?>
                  <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
              <?php
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
            foreach ($dataMaterialBawangParent as $row) {
              ?>
              <tr>
                    <th scope="row"></th>
                    <td><b><a href="<?php echo base_url()?>c_report/detailMaterial/<?php echo $row['MPBA_ID']?>"><?php echo $row['MPBA_NAME'] ?></a></b></td>
                    <th></th>
                    <?php
                      foreach ($dataRuangan as $r) {
                        ?>
                            <th scope="1"></th>
                        <?php
                      }
                    ?>
                    <th scope="1"></th>
                </tr>
              <?php
              $dataBarangChildById = $this->m_report->getMaterialChildByMpbaId($row['MPBA_ID']); 
              foreach ($dataBarangChildById as $row) {
                ?>
                <tr>
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <td><?php echo $row['MCBA_NAME'] ?></td>
                  <td><?php echo $row['SATU_NAME'] ?></td>
                  <?php
                    foreach ($dataRuangan as $key) {
                      $total = $this->m_report->getTotalMaterialBawangByRuangan($row['MPBA_ID'],$row['MCBA_ID'],$key['RUAN_ID']);
                      ?>
                        <td scope="1">
                          <?php
                            if (isset($total)) {
                              echo $total;
                            }else{
                              echo "-";
                            }
                          ?>
                        </td>
                      <?php
                    }
                    $total = $this->m_report->getTotalSaldoMaterialBawang($row['MPBA_ID'],$row['MCBA_ID']);
                  ?>
                  <td class="right" ><?php echo $total['TOTAL'] ?></td>
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

  <!-- Material Cimuning Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Material [ Gudang Cimuning ]</span></h3><br>
      <div class="box-tools pull-right">
        
        <a href="<?php echo base_url('index.php/c_report/exportMaterialCimuning') ?>">
          <button type="button" class="btn btn-box-tool" data-widget=" "><i class="fa fa-file-excel-o"></i> Excel</button>
        </a>
        
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="material_cimuning" class="table table-bordered table-striped table-hover">
        <thead >
          <tr>
            <th scope="col" rowspan="2">N0</th>
            <th scope="col" rowspan="2">NAMA MATERIAL</th>
            <th scope="col" rowspan="2">SATUAN</th>
            <th scope="col" colspan="<?php echo count($dataRuangan) ?>">GUDANG</th>
            <th scope="col" rowspan="2">JUMLAH</th>
          </tr>
          <tr>
          <?php
            foreach ($dataRuangan as $row) {
              ?>
                  <th scope="1"><?php echo $row['RUAN_NUMBER']?></th>
              <?php
            }
          ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
            foreach ($dataMaterialCimuningParent as $row) {
              ?>
              <tr>
                    <th scope="row"></th>
                    <td><b><a href="<?php echo base_url()?>c_report/detailMaterialCimuning/<?php echo $row['MPCI_ID']?>"><?php echo $row['MPCI_NAME'] ?></a></b></td>
                    <th></th>
                    <?php
                      foreach ($dataRuangan as $r) {
                        ?>
                            <th scope="1"></th>
                        <?php
                      }
                    ?>
                    <th scope="1"></th>
                </tr>
              <?php
              $dataBarangChildById = $this->m_report->getMaterialChildByMpciId($row['MPCI_ID']); 
              foreach ($dataBarangChildById as $row) {
                ?>
                <tr>
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <td><?php echo $row['MCCI_NAME'] ?></td>
                  <td><?php echo $row['SATU_NAME'] ?></td>
                  <?php
                    foreach ($dataRuangan as $key) {
                      $total = $this->m_report->getTotalMaterialCimuningByRuangan($row['MPCI_ID'],$row['MCCI_ID'],$key['RUAN_ID']);
                      ?>
                        <td scope="1">
                          <?php
                            if (isset($total)) {
                              echo $total;
                            }else{
                              echo "-";
                            }
                          ?>
                        </td>
                      <?php
                    }
                    $total = $this->m_report->getTotalSaldoMaterialCimuning($row['MPCI_ID'],$row['MCCI_ID']);
                  ?>
                  <td class="right" ><?php echo $total['TOTAL'] ?></td>
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
                      if ($_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN' ) {
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


  <!-- Inventaris Bawang Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Inventaris Bawang </span></h3>

      <div class="box-tools pull-right">        
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
            <button class="btn btn-primary pull-right" onclick="filterTanggal('bawang')">Filter</button>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div id="table_keseluruhan_bawang">
        <div class="col-md-12">
          <table id="inventaris_bawang" class="table table-bordered table-hover">
            <thead >
              <tr>
                <th scope="col">N0</th>
                <?php
                  if ($_SESSION['level'] == 'SUPER ADMIN') {
                    ?>  
                      <th scope="col">Action</th>
                    <?php
                  }
                ?>
                <th scope="col">Tanggal</th>
                <th scope="col">DI INPUT OLEH</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">QTY</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
              </tr>
              </thead>
              <tbody>
            <?php
            $no = 1;
              foreach ($dataInventarisParentBawang as $row) {
                $getTotal = $this->m_report->getTotalQtyBawangByInpaId($row['INPA_ID']);
                ?>
                <tr class="success">
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <?php
                    if ($_SESSION['level'] == 'SUPER ADMIN') {
                      ?>  
                        <th></th>
                      <?php
                    }
                  ?>
                  <th></th>
                  <th></th>
                  <th><b><?php echo $row['INPA_NAME'] ?></b></th>
                  <th class="right"><?php echo $getTotal[0]['Total']?></th>
                  <td></td>
                  <td></td>
                </tr>
                <?php
                $dataBarangChildBawangById = $this->m_report->getInventarisChildBawangByInpaId($row['INPA_ID']); 
                foreach ($dataBarangChildBawangById as $row) {
                  ?>
                  <tr>
                    <th scope="row"></th>
                    <?php
                      if ($_SESSION['level'] == 'SUPER ADMIN') {
                        ?>  
                        <td scope="row">
                          <a onclick="return confirm('Apa anda yakin ?')" href="<?=base_url()?>c_inventaris_bawang/delete/<?=$row['INVE_ID']?>">
                            Delete
                          </a>
                          |
                          <a href="<?=base_url()?>c_inventaris_Bawang/form_update/<?=$row['INVE_ID']?>">
                            Edit
                          </a>
                        </td>
                        <?php
                      }
                    ?>
                    <th scope="row">
                      <?php
                        echo C_report::format(date("D d M Y ", strtotime($row['INVE_TANGGAL'])));
                      ?>
                    </th>
                    <th scope="row"><?= $row['PEGA_NAME']?></th>
                    <td ><?php echo $row['INCH_NAME'] ?></td>
                    <td class="right"><?php echo $row['INVE_QTY'] ?></td>
                    <td><?php echo $row['INVE_KEADAAN'] ?></td>
                    <td><?php echo $row['INVE_KETERANGAN'] ?></td>
                  </tr>
                  <?php
                }
                $no++;
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- ./Inventaris Bawang Report -->
  

  <!-- Inventaris Cimuning Report -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="text-center">Laporan Inventaris Cimuning </span></h3>

      <div class="box-tools pull-right">        
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
                  <select class="form-control" name="cmbHariPertama" id="cmbHariPertama2">
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
                  <select class="form-control" name="cmbHariKedua" id="cmbHariKedua2">
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
                  <select name="cmbBulan" id="cmbBulan2" class="form-control">
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
                <select class="form-control" name="cmbTahun" id="cmbTahun2">
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
            <button class="btn btn-primary pull-right" onclick="filterTanggal2('cimuning')">Filter</button>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div id="table_keseluruhan_cimuning">
        <div class="col-md-12">
          <table id="inventaris_cimuning" class="table table-bordered table-hover">
            <thead >
              <tr>
                <th scope="col">N0</th>
                <?php
                  if ($_SESSION['level'] == 'SUPER ADMIN') {
                    ?>  
                      <th scope="col">Action</th>
                    <?php
                  }
                ?>
                <th scope="col">Tanggal</th>
                <th scope="col">DI INPUT OLEH</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">QTY</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
              </tr>
              </thead>
              <tbody>
            <?php
            $no = 1;
              foreach ($dataInventarisParentCimuning as $row) {
                $getTotal = $this->m_report->getTotalQtyCimuningByInpaId($row['INPA_ID']);
                ?>
                <tr class="success">
                  <th scope="row" class="center"><?php echo $no ?></th>
                  <?php
                  if ($_SESSION['level'] == 'SUPER ADMIN') {
                      ?>  
                        <th></th>
                      <?php
                    }
                  ?>
                  <th></th>
                  <th></th>
                  <th><b><?php echo $row['INPA_NAME'] ?></b></th>
                  <th class="right"><?php echo $getTotal[0]['Total']?></th>
                  <td></td>
                  <td></td>
                </tr>
                <?php
                $dataBarangChildCimuningById = $this->m_report->getInventarisChildCimuningByInpaId($row['INPA_ID']); 
                foreach ($dataBarangChildCimuningById as $row) {
                  ?>
                  <tr>
                    <th scope="row"></th>
                    <?php
                      if ($_SESSION['level'] == 'SUPER ADMIN') {
                        ?>  
                          <td scope="row">
                            <a onclick="return confirm('Apa anda yakin ?')" href="<?=base_url()?>c_inventaris/delete/<?=$row['INVE_ID']?>">
                              Delete
                            </a>
                            |
                            <a href="<?=base_url()?>c_inventaris/form_update/<?=$row['INVE_ID']?>">
                              Edit
                            </a>
                          </td>
                        <?php
                      }
                    ?>
                    <th scope="row">
                      <?php
                        echo C_report::format(date("D d M Y ", strtotime($row['INVE_TANGGAL'])));
                      ?>
                    </th>
                    <th scope="row"><?= $row['PEGA_NAME']?></th>
                    <td ><?php echo $row['INCH_NAME'] ?></td>
                    <td class="right"><?php echo $row['INVE_QTY'] ?></td>
                    <td><?php echo $row['INVE_KEADAAN'] ?></td>
                    <td><?php echo $row['INVE_KETERANGAN'] ?></td>
                  </tr>
                  <?php
                }
                $no++;
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
    $(function () {
        $('#stock').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        $('#stock_cimuning_jadi').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        $('#stock_cimuning_setengah_jadi').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        $('#material_bawang').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
        $('#inventaris_bawang').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf', 'excel' ]
        } );
        $('#inventaris_cimuning').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf', 'excel' ]
        } );
        $('#finance').dataTable( {
          "bSort": false,
          dom:'B <"content-header" <"col-sm-2"l> f>tipH',
          buttons: [ 'pdf' ]
        } );
    });
</script>
<script type="text/javascript">
  function filterTanggal(id) {
      var hariPertama = document.getElementById('cmbHariPertama').value;
      var hariKedua   = document.getElementById('cmbHariKedua').value;
      var bulan       = document.getElementById('cmbBulan').value;
      var tahun       = document.getElementById('cmbTahun').value;
      var keterangan  = id;
      $.ajax({
          type: "POST", 
          data: {
            awal : hariPertama, 
            akhir: hariKedua,
            bulan: bulan,
            tahun: tahun,
            keterangan: id
          },
          url: "<?php echo base_url()?>c_filter/inventaris/",
          success: function(html) {
              var target      = '#table_keseluruhan_'+id;
              $(target).html(html);
                $('#inven').dataTable( {
                  "bSort": false,
                  dom:'B <"content-header" <"col-sm-2"l> f>tipH',
                  buttons: [ 'excel' ]
                } );
          }
      });
    }
</script>
<script type="text/javascript">
  function filterTanggal2(id) {
      var hariPertama = document.getElementById('cmbHariPertama2').value;
      var hariKedua   = document.getElementById('cmbHariKedua2').value;
      var bulan       = document.getElementById('cmbBulan2').value;
      var tahun       = document.getElementById('cmbTahun2').value;
      var keterangan  = id;
      $.ajax({
          type: "POST", 
          data: {
            awal : hariPertama, 
            akhir: hariKedua,
            bulan: bulan,
            tahun: tahun,
            keterangan: id
          },
          url: "<?php echo base_url()?>c_filter/inventaris/",
          success: function(html) {
              var target      = '#table_keseluruhan_'+id;
              $(target).html(html);
                $('#inven').dataTable( {
                  "bSort": false,
                  dom:'B <"content-header" <"col-sm-2"l> f>tipH',
                  buttons: [ 'excel' ]
                } );
          }
      });
    }
</script>

<script type="text/javascript">
  function filterTanggal3() {
      var hariPertama = document.getElementById('cmbHariPertama3').value;
      var hariKedua   = document.getElementById('cmbHariKedua3').value;
      var bulan       = document.getElementById('cmbBulan3').value;
      var tahun       = document.getElementById('cmbTahun3').value;
      $.ajax({
          type: "POST", 
          data: {
            awal : hariPertama, 
            akhir: hariKedua,
            bulan: bulan,
            tahun: tahun,
          },
          url: "<?php echo base_url()?>c_filter/keuangan/",
          success: function(html) {
              var target      = '#table_keseluruhan_keuangan';
              $(target).html(html);
                $('#keua').dataTable( {
                  "bSort": false,
                  dom:'B <"content-header" <"col-sm-2"l> f>tipH',
                  buttons: [ 'excel' ]
                } );
          }
      });
    }
</script>
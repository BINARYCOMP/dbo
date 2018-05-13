<?php
/**
 *
 */
class C_gudangTakJadi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_gudangTakJadi');
  }
  public function index()
  {
    if (isset($_GET['message'])) {
      $message = $_GET['message'];
      if ($message == 1) {
        $message = "Data Berhasil Disimpan";
      }else{
        $message = "Data Gagal Disimpan";
      }
    }else{
      $message ="";
    }

      $namaParent          = $this->m_gudangTakJadi->getParentName();
      $dataGudangTakJadi   = $this->m_gudangTakJadi->getDataGudang();
      $dataRuangan      = $this->m_gudangTakJadi->getRuangan();
      $namaKategori        = $this->m_gudangTakJadi->getKategoriName();
      $data = array(
        'namaKategori'    => $namaKategori,
        'namaParent'      => $namaParent,
        'dataGudangTakJadi'  => $dataGudangTakJadi,
        'dataRuangan'     => $dataRuangan,
        'content'         => 'v_gudangTakJadi',
        'message'         => $message,
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  public function inputStok()
  {
    $parent     = $_POST['cmbParent'];
    $child      = $_POST['cmbChild'];
    $kategori   = $_POST['cmbKategori'];
    $uraian     = $_POST['txtUraian'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $cmbRuangan = $_POST['cmbRuangan'];
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUTA_KATE_ID'  => $kategori,
      'GUTA_KELUAR'   => $keluar ,
      'GUTA_URAIAN'   => $uraian ,
      'GUTA_MASUK'    => $masuk ,
      'GUTA_BAPA_ID'  => $parent ,
      'GUTA_BACH_ID'  => $child ,
      'GUTA_SALDO'    => $saldoAkhir,
      'GUTA_RUAN_ID'  => $cmbRuangan
    );
    $simpanBarang = $this->m_gudangTakJadi->simpanBarang($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."c_stok?message=1' </script>";
  }
      public function delete($id)
  {
    $this->db->delete('gudang_tak_jadi', array('GUTA_ID' => $id));
    redirect('c_stok');
  }


  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_gudangTakJadi->getChildName($str);
    ?>
      <select required name="cmbChild" id="cmbChildTakJadi" onchange="showStok();" onmousemove ="showStok();" class="form-control">
        <?php
          if ($str == 0) {
            ?>
              <option value='0' selected>== Pilih Anak Barang ==</option>
            <?php
          }else{
            ?>
              <option value='0'>== Pilih Anak Barang ==</option>
            <?php
          }
          foreach ($namaChild as $row){
            echo "<option value='".$row['BACH_ID']."'>";
            echo $row ['BACH_NAME'];
           echo "</option>";
          }
        ?>
      </select>
    <?php
  }

  // cari stok
  public function searchStok()
  {
    $bapa_id = $_GET['bapaId'];
    $bach_id = $_GET['bachId'];
    $kate_id = $_GET['kateId'];
    if ($kate_id != 0) {
      $stokAwal = $this->m_gudangTakJadi->getFirstStock($bach_id,$bapa_id,$kate_id);
    }else{
      $stokAwal = $this->m_gudangTakJadi->getFirstStockWithoutKategori($bach_id,$bapa_id);
    }

    if ($bapa_id == 0 || $bach_id == 0) {
      ?>
        <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwalTakJadi" required readonly value="0"> 
      <?php
    }else{
      if (empty($stokAwal[0]['GUTA_SALDO'])) {
        ?>
          <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwalTakJadi" required readonly value="0"> 
        <?php
      }else{
        ?>
          <input type="text" class="form-control"  name="txtSaldoAwal" id="saldoAwalTakJadi" required readonly value="<?php echo $stokAwal[0]['GUTA_SALDO']?>">
        <?php
      }
    }
  }
  public function modalKonfirmasi()
  {
    $cmbParent     = $_GET['parent'];
    $cmbChild      = $_GET['child'];
    $cmbKategori   = $_GET['kategori'];
    $txtUraian     = $_GET['keterangan'];
    $txtMasuk      = $_GET['masuk'];
    $txtKeluar     = $_GET['keluar'];
    $txtSaldoAwal  = $_GET['awal'];
    $cmbRuangan    = $_GET['ruangan'];
    $saldoAkhir    = $txtSaldoAwal + $txtMasuk - $txtKeluar;

    $namaParentDariModel      = $this->m_gudangTakJadi->getParentByBapaId($cmbParent);
    $namaChildDariModel       = $this->m_gudangTakJadi->getChildByBachId($cmbChild);
    $namaKategoriDariModel    = $this->m_gudangTakJadi->getKategoriByKateId($cmbKategori);
    $namaRuanganDariModel     = $this->m_gudangTakJadi->getRuanganByRuanId($cmbRuangan);

    $namaParentUntukDitampilkan      = $namaParentDariModel[0]['BAPA_NAME'];
    $namaChildUntukDitampilkan       = $namaChildDariModel[0]['BACH_NAME'] ;
    $namaKategoriUntukDitampilkan    = $namaKategoriDariModel[0]['KATE_NAME'] = 0;
    $nomorGudangUntukDitampilkan     = $namaRuanganDariModel[0]['RUAN_NUMBER'];

    ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Input Barang Setengah Jadi</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>
              <th>Induk Barang</th>
              <th>Anak Barang</th>
              <th>Kategori</th>
              <th>Ruangan</th>
              <th>Barang Masuk</th>
              <th>Barang Keluar</th>
              <th>Saldo Akhir</th>
            </tr>
            <tr>
              <td><?php echo $namaParentUntukDitampilkan ?></td>
              <td><?php echo $namaChildUntukDitampilkan?></td>
              <td><?php echo $namaKategoriUntukDitampilkan ?></td>
              <td><?php echo $nomorGudangUntukDitampilkan ?></td>
              <td><?php echo $txtMasuk ?></td>
              <td><?php echo $txtKeluar ?></td>
              <td><?php echo $saldoAkhir ?> </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <form action="<?php echo base_url()?>c_gudangTakJadi/inputStok" method="POST">
            <input type="hidden" name="cmbParent" value="<?php echo $cmbParent?>">
            <input type="hidden" name="cmbChild" value="<?php echo $cmbChild?>">
            <input type="hidden" name="cmbKategori" value="<?php echo $cmbKategori?>">
            <input type="hidden" name="txtMasuk" value="<?php echo $txtMasuk?>">
            <input type="hidden" name="txtKeluar" value="<?php echo $txtKeluar?>">
            <input type="hidden" name="txtUraian" value="<?php echo $txtUraian?>">
            <input type="hidden" name="txtSaldoAwal" value="<?php echo $txtSaldoAwal?>">
            <input type="hidden" name="cmbRuangan" value="<?php echo $cmbRuangan?>">
            <input type="submit" class="btn btn-outline" value="Simpan">
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    <?php
  }

  public function modalChild()
   {
     $cmbParent = $_GET['parent'];
     $namaChild = $this->m_gudangTakJadi->getChildByBapaId($cmbParent);
    ?>
    <!-- modal child -->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Lookup Barang Child</h4>
          </div>
          <div class="modal-body">
              <table id="gutaChild" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (is_array($namaChild) || is_object($namaChild)){
                      $no=1;
                      foreach ($namaChild as $row) {
                        ?>
                          <tr class="pilih2" data-brgChildTakJadi="<?php echo $row['BACH_ID']; ?>">
                            <!-- <td><?php echo $no ?></td> -->
                            <td><?php echo $no ?></td>
                            <td><?php echo $row['BACH_NAME']?></td>
                            <td><?php echo $row['SATU_NAME']?></td>
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
    <?php
  } 
}
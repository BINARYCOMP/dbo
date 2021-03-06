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
    $this->load->model('m_report');
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

      $dataBarangJadiCimuning       = $this->m_report->getBarangJadiCimuning();
      $namaBarang       = $this->m_gudangTakJadi->getBarangName();
      $datagudangTakJadi   = $this->m_gudangTakJadi->getDataGudang();
      $dataRuangan      = $this->m_gudangTakJadi->getRuangan();
      $namaKategori     = $this->m_gudangTakJadi->getKategoriName();
      $data = array(
        'dataBarangJadiCimuning'      => $dataBarangJadiCimuning,
        'namaKategori'    => $namaKategori,
        'namaBarang'      => $namaBarang,
        'datagudangTakJadi'  => $datagudangTakJadi,
        'dataRuangan'     => $dataRuangan,
        'title'           => 'Input barang tak jadi Gudang Cimuning ',
        'content'         => 'v_gudangTakJadi',
        'message'         => $message,
      );
      $this->load->view('tampilan/v_combine',$data);
  }

  public function form_update($id)
  {
    $dataBarangJadiCimuning       = $this->m_report->getBarangJadiCimuning();
    $namaBarang       = $this->m_gudangTakJadi->getBarangName();
    $datagudangTakJadi   = $this->m_gudangTakJadi->getDataGudangByGutaId($id);
    $dataRuangan      = $this->m_gudangTakJadi->getRuangan();
    $namaKategori     = $this->m_gudangTakJadi->getKategoriName();
    $data = array(
      'dataBarangJadiCimuning'      => $dataBarangJadiCimuning,
      'namaKategori'    => $namaKategori,
      'namaBarang'      => $namaBarang,
      'guta'            => $datagudangTakJadi,
      'dataRuangan'     => $dataRuangan,
      'title'           => 'Input barang tak jadi Gudang Cimuning ',
      'content'         => 'v_gudangTakJadiEdit',
    );
    $this->load->view('tampilan/v_combine',$data);
  }
  public function modalKonfirmasiEdit($id)
  {
    $cmbParent     = $_GET['parent'];
    // $cmbChild      = $_GET['child'];
    $cmbKategori   = $_GET['kategori'];
    $txtUraian     = $_GET['keterangan'];
    $txtMasuk      = $_GET['masuk'];
    $txtKeluar     = $_GET['keluar'];
    $cmbRuangan    = $_GET['ruangan'];
    $tanggal       = $_GET['tanggal'];


    $namaParentDariModel      = $this->m_gudangTakJadi->getParentByBACCId($cmbParent);
    // $namaChildDariModel       = $this->m_gudangTakJadi->getChildByBachId($cmbChild);
    $namaKategoriDariModel    = $this->m_gudangTakJadi->getKategoriByKateId($cmbKategori);
    $namaRuanganDariModel     = $this->m_gudangTakJadi->getRuanganByRuanId($cmbRuangan);
    $namaParentUntukDitampilkan      = 0;
    // $namaChildUntukDitampilkan       = 0;
    $namaKategoriUntukDitampilkan    = 0;
    $nomorGudangUntukDitampilkan     = 0;
    if (!empty($namaParentDariModel[0]['BACC_NAME'])) {
      $namaParentUntukDitampilkan      = $namaParentDariModel[0]['BACC_NAME'];
    }
    // if (!empty($namaChildDariModel[0]['BACH_NAME'])) {
    //   $namaChildUntukDitampilkan       = $namaChildDariModel[0]['BACH_NAME'] ;
    // } 
    if (!empty($namaKategoriDariModel[0]['KATE_NAME'])) {
       $namaKategoriUntukDitampilkan    = $namaKategoriDariModel[0]['KATE_NAME'];
    } 
    if (!empty($namaRuanganDariModel[0]['RUAN_NUMBER'])) {
      $nomorGudangUntukDitampilkan     = $namaRuanganDariModel[0]['RUAN_NUMBER'];
    } 
    ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Input Barang Jadi</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>
              <th>Tanggal</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Ruangan</th>
              <th>Barang Masuk</th>
              <th>Barang Keluar</th>
            </tr>
            <tr>
              <td><?php echo $tanggal ?></td>
              <td><?php echo $namaParentUntukDitampilkan ?></td>
              <td><?php echo $namaKategoriUntukDitampilkan ?></td>
              <td><?php echo $nomorGudangUntukDitampilkan ?></td>
              <td><?php echo $txtMasuk ?></td>
              <td><?php echo $txtKeluar ?></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <form action="<?php echo base_url()?>c_gudangTakJadi/update/<?=$id?>" method="POST">
            <input type="hidden" name="cmbParent" value="<?php echo $cmbParent?>">
            <input type="hidden" name="input_tanggal" value="<?php echo $tanggal?>">
            <input type="hidden" name="cmbKategori" value="<?php echo $cmbKategori?>">
            <input type="hidden" name="txtMasuk" value="<?php echo $txtMasuk?>">
            <input type="hidden" name="txtKeluar" value="<?php echo $txtKeluar?>">
            <input type="hidden" name="txtUraian" value="<?php echo $txtUraian?>">
            <input type="hidden" name="cmbRuangan" value="<?php echo $cmbRuangan?>">
            <input type="submit" class="btn btn-outline" value="Simpan">
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    <?php
  }
  public function update($id)
  {
    $parent     = $_POST['cmbParent'];
    $kategori   = $_POST['cmbKategori'];
    $uraian     = $_POST['txtUraian'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $cmbRuangan = $_POST['cmbRuangan'];
    $tanggal    = $_POST['input_tanggal'];

    $data = array(
      'GUTA_KATE_ID'  => $kategori,
      'GUTA_KELUAR'   => $keluar ,
      'GUTA_URAIAN'   => $uraian ,
      'GUTA_MASUK'    => $masuk ,
      'GUTA_BACC_ID'  => $parent ,
      'GUTA_RUAN_ID'  => $cmbRuangan,
      'GUTA_USER_ID'  => $_SESSION['USER_ID'],
      'GUTA_TANGGAL'  => $tanggal
    );
    $this->db->where('GUTA_ID', $id);
    $this->db->update('gudang_tak_jadi', $data);
    echo "<script> window.location='".base_url()."c_report' </script>";
  }
  public function view_setengah_jadi()
  {
      $dataBarangJadiCimuning       = $this->m_report->getBarangJadiCimuning();
      $dataRuangan            = $this->m_report->getRuangan();
      $namaBarang           = $this->m_gudangTakJadi->getBarangName();
      $datagudangTakJadi    = $this->m_gudangTakJadi->getDataGudang();
      $dataRuangan          = $this->m_gudangTakJadi->getRuangan();
      $namaKategori         = $this->m_gudangTakJadi->getKategoriName();
      $data = array(
        'dataBarangJadiCimuning'      => $dataBarangJadiCimuning,
        'dataRuangan'           => $dataRuangan,
        'namaKategori'      => $namaKategori,
        'namaBarang'        => $namaBarang,
        'datagudangTakJadi' => $datagudangTakJadi,
        'dataRuangan'       => $dataRuangan,
        'title'             => 'Lihat Barang Setengah Jadi ',
        'content'           => 'owner/v_gudangTakJadi',
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  public function inputStok()
  {
    $parent     = $_POST['cmbParent'];
    // $child      = $_POST['cmbChild'];
    $kategori   = $_POST['cmbKategori'];
    $uraian     = $_POST['txtUraian'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $cmbRuangan     = $_POST['cmbRuangan'];
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUTA_KATE_ID'  => $kategori,
      'GUTA_KELUAR'   => $keluar ,
      'GUTA_URAIAN'   => $uraian ,
      'GUTA_MASUK'    => $masuk ,
      'GUTA_BACC_ID'  => $parent ,
      // 'GUTA_BACH_ID'  => $child ,
      'GUTA_SALDO'    => $saldoAkhir,
      'GUTA_RUAN_ID'  => $cmbRuangan,
      'GUTA_USER_ID'  => $_SESSION['USER_ID'],
      'GUTA_TANGGAL'  => date('Y-m-d')
    );
    $simpanBarang = $this->m_gudangTakJadi->simpanBarang($data, $saldoAkhir);
    echo "<script> window.location='".base_url()."c_gudangTakJadi?message=1' </script>";
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_gudangTakJadi->getChildName($str);
    ?>
      <select required name="cmbChild" id="cmbChild" onchange="showStok();" onmousemove ="showStok();" class="form-control">
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
    $BACC_id = $_GET['BACCId'];
    $kate_id = $_GET['kateId'];
    $ruan_id = $_GET['ruanId'];
    

    if ($kate_id != 0) {
      if ($ruan_id != 0) {
        $stokAwal = $this->m_gudangTakJadi->getFirstStock($BACC_id,$kate_id,$ruan_id);
      }else{
        $stokAwal = $this->m_gudangTakJadi->getFirstStockWithoutRuangan($BACC_id,$kate_id);
      }
    }else{
      if ($ruan_id != 0) {
        $stokAwal = $this->m_gudangTakJadi->getFirstStockWithoutKategori($BACC_id, $ruan_id);
      }else{
        $stokAwal = $this->m_gudangTakJadi->getFirstStockWithoutRuanganAndKategori( $BACC_id);
      }
    }
    if ($BACC_id == 0 ) {
      ?>
        <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwal" required readonly value="0"> 
      <?php
    }else{
      if (empty($stokAwal[0]['GUTA_SALDO'])) {
        ?>
          <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwal" required readonly value="0"> 
        <?php
      }else{
        ?>
          <input type="text" class="form-control"  name="txtSaldoAwal" id="saldoAwal" required readonly value="<?php echo $stokAwal[0]['GUTA_SALDO']?>">
        <?php
      }
    }
  }
  public function modalKonfirmasi()
  {
    $cmbParent     = $_GET['parent'];
    // $cmbChild      = $_GET['child'];
    $cmbKategori   = $_GET['kategori'];
    $txtUraian     = $_GET['keterangan'];
    $txtMasuk      = $_GET['masuk'];
    $txtKeluar     = $_GET['keluar'];
    $txtSaldoAwal  = $_GET['awal'];
    $cmbRuangan    = $_GET['ruangan'];
    $saldoAkhir    = $txtSaldoAwal + $txtMasuk - $txtKeluar;


    $namaParentDariModel      = $this->m_gudangTakJadi->getParentByBACCId($cmbParent);
    // $namaChildDariModel       = $this->m_gudangTakJadi->getChildByBachId($cmbChild);
    $namaKategoriDariModel    = $this->m_gudangTakJadi->getKategoriByKateId($cmbKategori);
    $namaRuanganDariModel     = $this->m_gudangTakJadi->getRuanganByRuanId($cmbRuangan);
    $namaParentUntukDitampilkan      = 0;
    // $namaChildUntukDitampilkan       = 0;
    $namaKategoriUntukDitampilkan    = 0;
    $nomorGudangUntukDitampilkan     = 0;
    if (!empty($namaParentDariModel[0]['BACC_NAME'])) {
      $namaParentUntukDitampilkan      = $namaParentDariModel[0]['BACC_NAME'];
    }
    // if (!empty($namaChildDariModel[0]['BACH_NAME'])) {
    //   $namaChildUntukDitampilkan       = $namaChildDariModel[0]['BACH_NAME'] ;
    // } 
    if (!empty($namaKategoriDariModel[0]['KATE_NAME'])) {
       $namaKategoriUntukDitampilkan    = $namaKategoriDariModel[0]['KATE_NAME'];
    } 
    if (!empty($namaRuanganDariModel[0]['RUAN_NUMBER'])) {
      $nomorGudangUntukDitampilkan     = $namaRuanganDariModel[0]['RUAN_NUMBER'];
    } 
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
              <th>Nama Barang</th>
              <!-- <th>Anak Barang</th> -->
              <th>Kategori</th>
              <th>Ruangan</th>
              <th>Barang Masuk</th>
              <th>Barang Keluar</th>
              <th>Saldo Akhir</th>
            </tr>
            <tr>
              <td><?php echo $namaParentUntukDitampilkan ?></td>
              <!-- <td><?php echo $namaChildUntukDitampilkan?></td> -->
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
            <!-- <input type="hidden" name="cmbChild" value="<?php echo $cmbChild?>"> -->
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
     $namaChild = $this->m_gudangTakJadi->getChildByBACCId($cmbParent);
     $data = array(
      'cmbParent' => $cmbParent ,
      'namaChild' => $namaChild 
    );
     $this->load->view('modal/v_modalChildgudangTakJadi', $data);
  }
  public function delete($id)
  {
    $this->db->delete('gudang_tak_jadi', array('GUTA_ID' => $id));
    redirect('C_managerial','refresh');
  }
}

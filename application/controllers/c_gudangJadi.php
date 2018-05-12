<?php
/**
 *
 */
class C_gudangJadi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_gudangJadi');
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

      $namaParent       = $this->m_gudangJadi->getParentName();
      $dataGudangJadi   = $this->m_gudangJadi->getDataGudang();
      $dataRuangan      = $this->m_gudangJadi->getRuangan();
      $namaKategori     = $this->m_gudangJadi->getKategoriName();
      $data = array(
        'namaKategori'    => $namaKategori,
        'namaParent'      => $namaParent,
        'dataGudangJadi'  => $dataGudangJadi,
        'dataRuangan'     => $dataRuangan,
        'content'         => 'v_gudangJadi',
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
    $cmbRuangan     = $_POST['cmbRuangan'];
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUJA_KATE_ID'  => $kategori,
      'GUJA_KELUAR'   => $keluar ,
      'GUJA_URAIAN'   => $uraian ,
      'GUJA_MASUK'    => $masuk ,
      'GUJA_BAPA_ID'  => $parent ,
      'GUJA_BACH_ID'  => $child ,
      'GUJA_SALDO'    => $saldoAkhir,
      'GUJA_RUAN_ID'  => $cmbRuangan
    );
    $simpanBarang = $this->m_gudangJadi->simpanBarang($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."c_stok?message=1' </script>";
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_gudangJadi->getChildName($str);
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
    $bapa_id = $_GET['bapaId'];
    $bach_id = $_GET['bachId'];
    $kate_id = $_GET['kateId'];
    $ruan_id = $_GET['ruanId'];

    if ($kate_id != 0) {
      if ($ruan_id != 0) {
        $stokAwal = $this->m_gudangJadi->getFirstStock($bach_id,$bapa_id,$kate_id,$ruan_id);
      }else{
        $stokAwal = $this->m_gudangJadi->getFirstStockWithoutRuangan($bach_id,$bapa_id,$kate_id);
      }
    }else{
      if ($ruan_id != 0) {
        $stokAwal = $this->m_gudangJadi->getFirstStockWithoutKategori($bach_id,$bapa_id, $ruan_id);
      }else{
        $stokAwal = $this->m_gudangJadi->getFirstStockWithoutRuanganAndKategori($bach_id,$bapa_id);
      }
    }

    if ($bapa_id == 0 || $bach_id == 0) {
      ?>
        <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwal" required readonly value="0"> 
      <?php
    }else{
      if (empty($stokAwal[0]['GUJA_SALDO'])) {
        ?>
          <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwal" required readonly value="0"> 
        <?php
      }else{
        ?>
          <input type="text" class="form-control"  name="txtSaldoAwal" id="saldoAwal" required readonly value="<?php echo $stokAwal[0]['GUJA_SALDO']?>">
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


    $namaParentDariModel      = $this->m_gudangJadi->getParentByBapaId($cmbParent);
    $namaChildDariModel       = $this->m_gudangJadi->getChildByBachId($cmbChild);
    $namaKategoriDariModel    = $this->m_gudangJadi->getKategoriByKateId($cmbKategori);
    $namaRuanganDariModel     = $this->m_gudangJadi->getRuanganByRuanId($cmbRuangan);
    $namaParentUntukDitampilkan      = 0;
    $namaChildUntukDitampilkan       = 0;
    $namaKategoriUntukDitampilkan    = 0;
    $nomorGudangUntukDitampilkan     = 0;
    if (!empty($namaParentDariModel[0]['BAPA_NAME'])) {
      $namaParentUntukDitampilkan      = $namaParentDariModel[0]['BAPA_NAME'];
    }
    if (!empty($namaChildDariModel[0]['BACH_NAME'])) {
      $namaChildUntukDitampilkan       = $namaChildDariModel[0]['BACH_NAME'] ;
    } 
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
          <form action="<?php echo base_url()?>c_gudangJadi/inputStok" method="POST">
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
     $namaChild = $this->m_gudangJadi->getChildByBapaId($cmbParent);
     $data = array(
      'cmbParent' => $cmbParent ,
      'namaChild' => $namaChild 
    );
     $this->load->view('modal/v_modalChildGudangJadi', $data);
  } 
}
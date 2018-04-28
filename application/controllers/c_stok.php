<?php
/**
 *
 */
class C_stok extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_gudangJadi');
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

      $namaParent           = $this->m_gudangJadi->getParentName();
      $dataGudangJadi       = $this->m_gudangJadi->getDataGudang();
      $dataGudangTakJadi    = $this->m_gudangTakJadi->getDataGudang();
      $data = array(
        'namaParent'        => $namaParent,
        'dataGudangJadi'    => $dataGudangJadi,
        'dataGudangTakJadi' => $dataGudangTakJadi,
        'content'           => 'v_stock',
        'message'           => $message,
        'title'             => 'Input Stok',
        'menu'              => 'Stok'
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  public function inputStok()
  {
    $parent     = $_POST['cmbParent'];
    $child      = $_POST['cmbChild'];
    $uraian     = $_POST['txtUraian'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUJA_KELUAR'   => $keluar ,
      'GUJA_URAIAN'   => $uraian ,
      'GUJA_MASUK'    => $masuk ,
      'GUJA_BAPA_ID'  => $parent ,
      'GUJA_BACH_ID'  => $child ,
    );
    $simpanBarang = $this->m_gudangJadi->simpanBarang($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."c_gudangJadi?message=1' </script>";
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_gudangJadi->getChildName($str);
    ?>
      <select required name="cmbChild" onchange="showStok(this.value);" onmousemove ="showStok(this.value);">
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
    $str = $_GET['q'];
    $stokAwal = $this->m_gudangJadi->getFirstStock($str);
    if ($str == 0) {
      ?>
        <input type="text" name="txtSaldoAwal" id="saldoAwal" required readonly placeholder="0"> 
      <?php
    }else{
      ?>
        <input type="text" name="txtSaldoAwal" id="saldoAwal" required readonly value="<?php echo $stokAwal[0]['BACH_GUJA_TOTAL'] ?>"> 
      <?php
    }
  }
}

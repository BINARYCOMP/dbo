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

      $namaParent = $this->m_gudangTakJadi->getParentName();
      $data = array(
        'namaParent'  => $namaParent,
        'content'     => 'v_gudangTakJadi',
        'message'     => $message,
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  public function inputStok()
  {
    $parent     = $_POST['cmbParent'];
    $child      = $_POST['cmbChild'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUTA_KELUAR'   => $keluar ,
      'GUTA_MASUK'    => $masuk ,
      'GUTA_BAPA_ID'  => $parent ,
      'GUTA_BACH_ID'  => $child ,
    );
    $simpanBarang = $this->m_gudangTakJadi->simpanBarang($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."c_gudangTakJadi?message=1' </script>";
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_gudangTakJadi->getChildName($str);
    ?>
      <select name="cmbChild" onchange="showStok(this.value);">
        <?php  
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
    $stokAwal = $this->m_gudangTakJadi->getFirstStock($str);
    ?>
      <input type="text" name="txtSaldoAwal" id="saldoAwal" readonly value="<?php echo $stokAwal[0]['BACH_GUTA_TOTAL'] ?>"> 
    <?php
  }
}

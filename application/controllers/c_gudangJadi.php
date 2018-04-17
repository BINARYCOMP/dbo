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

      $namaParent = $this->m_gudangJadi->getParentName();
      $data = array(
        'namaParent'  => $namaParent,
        'content'     => 'v_gudangJadi',
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
      'GUJA_KELUAR'   => $keluar ,
      'GUJA_MASUK'    => $masuk ,
      'GUJA_BAPA_ID'  => $parent ,
      'GUJA_BACH_ID'  => $child ,
    );
    $simpanBarang = $this->m_gudangJadi->simpanBarang($data, $saldoAkhir, $child);
    //echo "<script> window.location='".base_url()."c_gudangJadi?message=1' </script>";
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_gudangJadi->getChildName($str);
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
    $stokAwal = $this->m_gudangJadi->getFirstStock($str);
    ?>
      <input type="text" name="txtSaldoAwal" id="saldoAwal" readonly value="<?php echo $stokAwal[0]['BACH_GUJA_TOTAL'] ?>"> 
    <?php
  }
}

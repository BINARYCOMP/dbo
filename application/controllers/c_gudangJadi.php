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
      $data = array(
        'content' => 'v_gudangJadi',
        'message' => $message,
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  public function inputStok()
  {
    $parent     = $_POST['txtParent'];
    $child      = $_POST['txtChild'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUJA_KELUAR'   => $keluar ,
      'GUJA_MASUK'    => $masuk ,
      'GUJA_TOTAL'    => $saldoAkhir ,
      'GUJA_BAPA_ID'  => $parent ,
      'GUJA_BACH_ID'  => $child ,
    );
    $simpanBarang = $this->m_gudangJadi->simpanBarang($data);
    echo "<script> window.location='".base_url()."c_gudangJadi?message=1' </script>";
  }
}

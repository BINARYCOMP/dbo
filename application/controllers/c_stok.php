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
      $namaKategori         = $this->m_gudangJadi->getKategoriName();
      $dataGudangJadi       = $this->m_gudangJadi->getDataGudang();
      $dataGudangTakJadi    = $this->m_gudangTakJadi->getDataGudang();
      $data = array(
        'namaParent'        => $namaParent,
        'namaKategori'      => $namaKategori,
        'dataGudangJadi'    => $dataGudangJadi,
        'dataGudangTakJadi' => $dataGudangTakJadi,
        'content'           => 'v_stock',
        'message'           => $message,
        'title'             => 'Input Stok',
        'menu'              => 'Stok'
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  
}

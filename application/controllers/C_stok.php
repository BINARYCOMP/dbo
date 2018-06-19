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
    $this->load->model('m_gudangBawang');
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

      $dataBarangParent     = $this->m_report->getBarangParent();
      $dataBarangJadiCimuning       = $this->m_report->getBarangJadiCimuning();
      $namaParent           = $this->m_gudangJadi->getBarangName();
      $namaKategori         = $this->m_gudangJadi->getKategoriName();
      $dataGudangJadi       = $this->m_gudangJadi->getDataGudang();
      $dataRuangan          = $this->m_gudangJadi->getRuangan();
      $dataGudangTakJadi    = $this->m_gudangTakJadi->getDataGudang();
      $dataGudangBawang   = $this->m_gudangBawang->getDataGudang();
      $data = array(
        'dataBarangParent'          => $dataBarangParent,
        'dataBarangJadiCimuning'      => $dataBarangJadiCimuning,
        'namaParent'        => $namaParent,
        'namaKategori'      => $namaKategori,
        'dataGudangJadi'    => $dataGudangJadi,
        'dataGudangTakJadi' => $dataGudangTakJadi,
        'dataGudangBawang'  => $dataGudangBawang,
        'dataRuangan'       => $dataRuangan,
        'content'           => 'v_stock',
        'message'           => $message,
        'title'             => 'View Gudang',
        'menu'              => 'Gudang'
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  
}

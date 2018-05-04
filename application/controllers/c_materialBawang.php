<?php
/**
 *
 */
class C_MaterialBawang extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_materialBawang');
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

      $namaParent       = $this->m_materialBawang->getParentName();
      $dataGudangJadi   = $this->m_gudangJadi->getDataGudang();
      $namaKategori     = $this->m_gudangJadi->getKategoriName();
      $data = array(
        'namaKategori'    => $namaKategori,
        'namaParent'      => $namaParent,
        'dataGudangJadi'  => $dataGudangJadi,
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
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUJA_KATE_ID'  => $kategori,
      'GUJA_KELUAR'   => $keluar ,
      'GUJA_URAIAN'   => $uraian ,
      'GUJA_MASUK'    => $masuk ,
      'GUJA_BAPA_ID'  => $parent ,
      'GUJA_BACH_ID'  => $child ,
      'GUJA_SALDO'    => $saldoAkhir
    );
    $simpanBarang = $this->m_gudangJadi->simpanBarang($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."c_stok?message=1' </script>";
  }
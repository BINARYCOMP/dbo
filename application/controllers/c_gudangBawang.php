<?php
/**
 * 
 */
class C_gudangBawang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_gudangBawang');
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

		$namaParent       	= $this->m_gudangBawang->getParentName();
		$namaKategori     	= $this->m_gudangBawang->getKategoriName();
		$dataGudangBawang   = $this->m_gudangBawang->getDataGudang();
		$data = array(
			'namaKategori'    	=> $namaKategori,
			'namaParent'      	=> $namaParent,
			'dataGudangBawang'  => $dataGudangBawang,
			'content'         	=> 'v_GudangBawang',
			'message'         	=> $message,
		);
		$this->load->view('tampilan/v_combine',$data);
	}
}
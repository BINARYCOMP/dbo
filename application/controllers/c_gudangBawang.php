<?php
/**
 * 
 */
class C_gudangBawang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$namaParent       	= $this->m_GudangBawang->getParentName();
		$namaKategori     	= $this->m_GudangBawang->getKategoriName();
		$dataGudangBawang   = $this->m_GudangBawang->getDataGudang();
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
<?php
/**
* 
*/
class C_pegawai extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pegawai');
	}

	public function index()
	{
	$agamaId=$this->m_pegawai->getAgama();
	$pegawai=$this->m_pegawai->view();
		$data = array(
			'pegawai'	=>$pegawai,
			'agamaId' 	=>$agamaId,
			'content'	=>'v_pegawai',
			'title' 	=>'Pegawai',
      		'menu'      =>'Input Pegawai'
		);
		$this->load->view('tampilan/v_combine', $data);

	}
	public function form()
	{
		$PEGA_NAME		= $_POST['iName'];
		$PEGA_EMAIL		= $_POST['iEmail'];
		$PEGA_ALAMAT 	= $_POST['iAlamat'];
		$PEGA_NO_TLP 	= $_POST['iNoTelpon'];
		$PEGA_JENKEL 	= $_POST['iJenisKelamin'];
		$PEGA_AGAM_ID 	= $_POST['iAgamaId'];

		$data = array(
			'PEGA_NAME' 	=>$PEGA_NAME ,
			'PEGA_EMAIL'	=>$PEGA_EMAIL ,
			'PEGA_ALAMAT'	=>$PEGA_ALAMAT ,
			'PEGA_NO_TLP'	=>$PEGA_NO_TLP ,
			'PEGA_JENKEL'	=>$PEGA_JENKEL ,
			'PEGA_AGAM_ID'	=>$PEGA_AGAM_ID
			);
		$pegawai=$this->m_pegawai->Insert($data);
		 redirect('c_pegawai');
	}
	public function FormUpdate($pegawai){
		$agamaId=$this->m_pegawai->getAgama();
		$pegawai=$this->m_pegawai->Update($pegawai);
		$data = array(
			'pegawai' 	=>$pegawai,
			'agamaId'  	=>$agamaId,
			'title'		=>'Pegawai',
			'content' 	=>'v_editPegawai',
      		'menu'      =>'Input Pegawai'
			);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id){
		$PEGA_NAME		= $_POST['iName'];
		$PEGA_EMAIL		= $_POST['iEmail'];
		$PEGA_ALAMAT 	= $_POST['iAlamat'];
		$PEGA_NO_TLP 	= $_POST['iNoTelpon'];
		$PEGA_JENKEL 	= $_POST['ijeniskelamin'];
		$PEGA_AGAM_ID 	= $_POST['iAgamaId'];
		$data = array(
			'PEGA_NAME' 	=>$PEGA_NAME ,
			'PEGA_EMAIL'	=>$PEGA_EMAIL ,
			'PEGA_ALAMAT'	=>$PEGA_ALAMAT ,
			'PEGA_NO_TLP'	=>$PEGA_NO_TLP ,
			'PEGA_JENKEL'	=>$PEGA_JENKEL ,
			'PEGA_AGAM_ID'	=>$PEGA_AGAM_ID
			);
		$pegawai=$this->m_pegawai->UpdateData($id, $data);
		redirect('C_pegawai');

	}
	public function delete($id)
	{
		$this->db->delete('pegawai', array('PEGA_ID' => $id));
		redirect('C_pegawai');
	}
}
?>
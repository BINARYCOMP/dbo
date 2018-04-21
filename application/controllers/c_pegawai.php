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
	$pegawai=$this->m_pegawai->view();
		$data = array(
			'pegawai' =>$pegawai,
			'content'=>'v_pegawai',
			'title' => 'pegawai'
		);
		$this->load->view('tampilan/v_combine', $data);

	}
	public function form()
	{
		$pegawai1 = $_POST['pegawai1'];
		$pegawai2 = $_POST['pegawai2'];
		$pegawai3 = $_POST['pegawai3'];
		$pegawai4 = $_POST['pegawai4'];
		$pegawai5 = $_POST['pegawai5'];
		$pegawai6 = $_POST['pegawai6'];

		$data = array(
			'PEGA_NAME' =>$pegawai1 ,
			'PEGA_EMAIL'=>$pegawai2 ,
			'PEGA_ALAMAT'=>$pegawai3 ,
			'PEGA_NO_TLP'=>$pegawai4 ,
			'PEGA_JENKEL'=>$pegawai5 ,
			'PEGA_AGAM_ID'=>$pegawai6
			);
		$pegawai=$this->m_pegawai->Insert($data);
		 redirect('c_pegawai');
	}
	public function FormUpdate($pegawai){
		$pegawai=$this->m_pegawai->Update($pegawai);
		$data = array(
			'pegawai' =>$pegawai,
			'content' => 'v_editPegawai'
			);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id){
		$pegawai1 = $_POST['pegawai1'];
		$pegawai2 = $_POST['pegawai2'];
		$pegawai3 = $_POST['pegawai3'];
		$pegawai4 = $_POST['pegawai4'];
		$pegawai5 = $_POST['pegawai5'];
		$pegawai6 = $_POST['pegawai6'];
		$data = array(
			'PEGA_NAME' =>$pegawai1 ,
			'PEGA_EMAIL'=>$pegawai2 ,
			'PEGA_ALAMAT'=>$pegawai3 ,
			'PEGA_NO_TLP'=>$pegawai4 ,
			'PEGA_JENKEL'=>$pegawai5 ,
			'PEGA_AGAM_ID'=>$pegawai6 
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
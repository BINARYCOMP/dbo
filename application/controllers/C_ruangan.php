<?php
/**
 * 
 */
class C_ruangan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_ruangan');
	}

	public function index()
	{
		$ruangan 	= 	$this->m_ruangan->view();
		$data = array(
			'ruangan'	=> $ruangan,
			'content'	=>'v_ruangan',
			'title' 	=>'Ruangan',
      		'menu'      =>'Input Ruangan'
		);
		$this->load->view('tampilan/v_combine', $data);
	}

	public function form()
	{
		$RUAN_NUMBER 	= $_POST['iName'];

		$data = array(
			'RUAN_NUMBER' 	=>$RUAN_NUMBER ,
			);
		$ruangan=$this->m_ruangan->Insert($data);
		 redirect('c_ruangan', 'refresh');
	}
	public function FormUpdate($ruangan){
		$ruangan=$this->m_ruangan->Update($ruangan);
		$data = array(
			'ruangan' 	=>$ruangan,
			'title'		=>'Ruangan',
			'content' 	=>'v_editRuangan',
      		'menu'      =>'Input Ruangan'
			);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id){
		$RUAN_NUMBER 	= $_POST['iName'];

		$data = array(
			'RUAN_NUMBER' 	=>$RUAN_NUMBER ,
			);
		$ruangan=$this->m_ruangan->UpdateData($id, $data);
		redirect('C_ruangan','refresh');

	}
	public function delete($id)
	{
		$this->db->delete('ruangan', array('RUAN_ID' => $id));
		redirect('c_ruangan', 'refresh');
	}
}
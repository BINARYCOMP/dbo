<?php
/**
* 
*/
class C_viewAgama extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_viewAgama');
	}

	public function index()
	{
	$agama=$this->m_viewAgama->view();
		$data = array(
			'agama' =>$agama,
			'content'=>'v_ViewAgama',
			'title' => 'Agama',
     	 	'menu'            => 'Input Agama'
		);
		$this->load->view('tampilan/v_combine', $data);

	}
	public function form()
	{
		$agama = $_POST['txtagama'];


		$data = array(
			'AGAM_NAME' =>$agama , 
			);
		$agama=$this->m_viewAgama->Insert($data);
		 redirect('c_viewAgama');
	}
	public function FormUpdate($agama){
		$agama=$this->m_viewAgama->Update($agama);
		$data = array(
			'agama' =>$agama,
			'content' => 'v_editAgama',
			'title' => 'Agama',
     	 	'menu'            => 'Input Agama'
			);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id){
		$agama = $_POST['txtagama'];

		$data = array(
			'AGAM_NAME' =>$agama  
			);
		$agama=$this->m_viewAgama->UpdateData($id, $data);
		redirect('C_viewAgama');

	}
	public function delete($id)
	{
		$this->db->delete('agama', array('AGAM_ID' => $id));
		redirect('C_viewAgama');
	}
}
?>
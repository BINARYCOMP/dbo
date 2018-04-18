<?php
/**
* 
*/
class C_form1 extends CI_Controller
{
	function __construct(){
			parent::__construct();
			$this->load->model('m_form1');
		}
	public function index()
	{
		
		$dataLevel=$this->m_form1->getLevel();
		$dataUser=$this->m_form1->getUser();
		$data = array(
			'dataLevel' =>$dataLevel,
			'dataUser' =>$dataUser );

		$this->load->view('v_form1', $data);

	
	}
	public function FormRegister()
	{
		$idpegawai = $_POST['txtidpegawai'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		$level = $_POST['level'];

		$data = array(
			'USER_DAPE_ID' =>$idpegawai ,
			'USER_NAME' =>$username ,
			'USER_PASSWORD' =>$password ,
			'USER_LEVE_ID' =>$level   
			);
		$dataLevel=$this->m_form1->Insert($data);
		redirect('c_form1','refresh');
		
	}
	public function FormUpdate($id){
		$dataLevel=$this->m_form1->getLevel();
		$dataUser=$this->m_form1->viewData($id);
	
		$data = array(
			'dataLevel' =>$dataLevel,
			'id'=>$id,
			'dataUser'=>$dataUser );

		$this->load->view('v_form2',$data);
	}
	public function UpdateData($id){
		$idpegawai = $_POST['txtidpegawai'];
		$username = $_POST['txtusername'];
		$password = md5($_POST['txtpassword']);
		$level = $_POST['level'];

		$data = array(
			
			'USER_DAPE_ID' =>$idpegawai ,
			'USER_NAME' =>$username ,
			'USER_PASSWORD' =>$password ,
			'USER_LEVE_ID' =>$level   
			);
		$dataLevel=$this->m_form1->UpdateData($data,$id);
		redirect('c_form1','refresh');
	}
	public function Delete($id){
		var_dump($id);
		$dataDelete=$this->m_form1->Delete($id);
		redirect('c_form1','refresh');
	}
}
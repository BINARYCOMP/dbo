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
		
		$dataLevel		=$this->m_form1->getLevel();
		$dataUser		=$this->m_form1->getUser();
		$dataPegawai 	= $this->m_form1->getPegawai();
		$data = array(
			'title'			=> 'Register',
			'content'		=> 'v_form1',
			'menu'         	=> 'Input User',
			'dataLevel' 	=> $dataLevel,
			'dataUser' 		=> $dataUser,
			'dataPegawai'	=> $dataPegawai,
		);

		$this->load->view('tampilan/v_combine', $data);

	
	}
	public function FormRegister()
	{
		$idpegawai=$_POST['cmbNamaPega'];
		$username = $_POST['txtusername'];
		$password = md5($_POST['txtpassword']);
		$level = $_POST['level'];

		$data = array(
			'USER_DAPE_ID'=>$idpegawai,
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
		$dataPegawai 	= $this->m_form1->getPegawai();
		$data = array(
			'title'=>'Edit User',
			'content'=>'v_form2',
			'dataLevel' =>$dataLevel,
			'id'=>$id,
			'dataUser'=>$dataUser,
			'menu'         => 'Input User',
			'dataPegawai'	=> $dataPegawai, 
		);

		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id){
		
		
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
		$dataDelete=$this->m_form1->Delete($id);
		redirect('c_form1','refresh');
	}
}
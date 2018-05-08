<?php
/**
* 
*/
class C_barangParentCimuning extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barangParentCimuning');
	}

	public function index()
	{

		$barangParentCimuning=$this->m_barangParentCimuning->view();
		$data = array(
			'title'			=>'Induk Barang Cimuning',
			'content' 		=> 'v_barangParentCimuning',
			'barang_parent' =>$barangParentCimuning,
			'menu'         	=> 'Barang Parent'
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function form()
	{
		$nama = $_POST['txtnama'];


		$data = array(
			'BACP_NAME' =>$nama
			);
		$parent=$this->m_barangParentCimuning->Insert($data);
		 redirect('C_barangParentCimuning');
	}
	public function FormUpdate($id){
		$parent=$this->m_barangParentCimuning->Update($id);
		$data = array(
			'content'=>'v_editbarangParentCimuning',
			'title'=>'Edit Induk Barang',
			'barangParentCimuning' =>$parent,
			'menu'         => 'Barang Parent'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id)
	{
		$nama = $_POST['txtnama'];


		$data = array(
			'BACP_NAME' =>$nama ,
			);
		$parent=$this->m_barangParentCimuning->UpdateData($id, $data);
		redirect('C_barangParentCimuning');

	}
	public function delete($id)
	{
		$this->db->delete('barang_parent', array('BACP_ID' => $id));
		redirect('C_barangParentCimuning');
	}
}
?>
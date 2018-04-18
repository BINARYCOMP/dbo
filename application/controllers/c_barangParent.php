<?php
/**
* 
*/
class C_barangParent extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barangParent');
	}

	public function index()
	{
		$barangParent=$this->m_barangParent->view();
		$data = array(
			'content' => 'v_barangParent',
			'barang_parent' =>$barangParent
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function form()
	{
		$nama = $_POST['txtnama'];


		$data = array(
			'BAPA_NAME' =>$nama
			);
		$parent=$this->m_barangParent->Insert($data);
		 redirect('C_barangParent');
	}
	public function FormUpdate($id){
		$parent=$this->m_barangParent->Update($id);
		$data = array(
			'barangParent' =>$parent);
		$this->load->view('v_editBarangParent',$data);
	}
	public function UpdateData($id)
	{
		$nama = $_POST['txtnama'];


		$data = array(
			'BAPA_NAME' =>$nama ,
			);
		$parent=$this->m_barangParent->UpdateData($id, $data);
		redirect('C_barangParent');

	}
	public function delete($id)
	{
		$this->db->delete('barang_parent', array('BAPA_ID' => $id));
		redirect('C_barangParent');
	}
}
?>
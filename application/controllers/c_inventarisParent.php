<?php
/**
 * 
 */
class C_InventarisParent extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_inventarisParent');
	}
	public function index()
	{
		$inventarisParent=$this->m_inventarisParent->view();
		$data = array(
			'content' => 'v_inventarisParent',
			'inventarisParent' =>$inventarisParent
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function save()
	{
		$nama = $_POST['txtnama'];

		$data = array(
			'INPA_NAME' =>$nama
			);
		$parent=$this->m_inventarisParent->Insert($data);
		 redirect('C_inventarisParent');
	}
	public function FormUpdate($id){
		$parent=$this->m_inventarisParent->viewBy($id);
		$data = array(
			'content' => 'v_editInventarisParent',
			'inventarisParent' =>$parent,
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id)
	{
		$nama = $_POST['txtnama'];

		$data = array(
			'INPA_NAME' =>$nama 
			);

		$this->m_inventarisParent->UpdateData($id, $data);
		redirect('C_inventarisParent');

	}
	public function delete($id)
	{
		$this->db->delete('inventaris_parent', array('INPA_ID' => $id));
		redirect('C_inventarisParent');
	}
}
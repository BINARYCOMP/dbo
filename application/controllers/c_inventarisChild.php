<?php
/**
* 
*/
class C_inventarisChild extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_inventarisChild');
	}

	public function index()
	{
		$inventarisChild 	=$this->m_inventarisChild->view();
		$inventarisParent	=$this->m_inventarisChild->viewParent();
		$data = array(
			'content' 			=> 'v_inventarisChild',
			'inventaris_child' 	=> $inventarisChild,
			'inventaris_parent'	=> $inventarisParent
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function save()
	{
		$nama 		= $_POST['txtNama'];
		$parent		= $_POST['txtParent'];
		$jumlah 	= $_POST['txtQty'];
		$data = array(
			'INCH_NAME' 	=> $nama ,
			'INCH_INPA_ID' 	=> $parent ,
			'INCH_QTY' 		=> $jumlah ,
			);
		$child=$this->m_inventarisChild->Insert($data);
		 redirect('c_inventarisChild');
	}
	public function FormUpdate($id){
		$child=$this->m_inventarisChild->Update($id);
		$data = array(
			'inventarisChild' =>$child);
		$this->load->view('v_editinventarisChild',$data);
	}
	public function UpdateData($id)
	{
		$nama = $_POST['txtnama'];
		$guja = $_POST['txtguja'];
		$guta = $_POST['txtguta'];
		$bapa = $_POST['txtbapa'];
		$satuan = $_POST['txtsatuan'];

		$data = array(
			'INCH_NAMe' =>$nama ,
			'INCH_GUJA_TOTAL' =>$guja ,
			'INCH_GUTA_TOTAL' =>$guta ,
			'INCH_BAPA_ID' =>$bapa ,
			'INCH_SATU_ID' =>$satuan , 
			);
		$child=$this->m_inventarisChild->UpdateData($id, $data);
		redirect('C_inventarisChild');

	}
	public function delete($id)
	{
		$this->db->delete('inventaris_child', array('INCH_ID' => $id));
		redirect('c_inventarisChild');
	}
}
?>
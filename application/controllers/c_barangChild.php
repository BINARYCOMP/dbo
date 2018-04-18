<?php
/**
* 
*/
class C_barangChild extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barangChild');
	}

	public function index()
	{
		$barangChild=$this->m_barangChild->view();
		$data = array(
			'content' => 'v_barangChild',
			'barang_child' =>$barangChild
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function form()
	{
		$nama = $_POST['txtnama'];
		$guja = $_POST['txtguja'];
		$guta = $_POST['txtguta'];
		$bapa = $_POST['txtbapa'];
		$satuan = $_POST['txtsatuan'];


		$data = array(
			'BACH_NAME' =>$nama ,
			'BACH_GUJA_TOTAL' =>$guja ,
			'BACH_GUTA_TOTAL' =>$guta ,
			'BACH_BAPA_ID' =>$bapa ,
			'BACH_SATU_ID' =>$satuan ,
			);
		$child=$this->m_barangChild->Insert($data);
		 redirect('c_barangChild');
	}
	public function FormUpdate($id){
		$child=$this->m_barangChild->Update($id);
		$data = array(
			'barangChild' =>$child);
		$this->load->view('v_editBarangChild',$data);
	}
	public function UpdateData($id)
	{
		$nama = $_POST['txtnama'];
		$guja = $_POST['txtguja'];
		$guta = $_POST['txtguta'];
		$bapa = $_POST['txtbapa'];
		$satuan = $_POST['txtsatuan'];

		$data = array(
			'BACH_NAMe' =>$nama ,
			'BACH_GUJA_TOTAL' =>$guja ,
			'BACH_GUTA_TOTAL' =>$guta ,
			'BACH_BAPA_ID' =>$bapa ,
			'BACH_SATU_ID' =>$satuan , 
			);
		$child=$this->m_barangChild->UpdateData($id, $data);
		redirect('C_barangChild');

	}
	public function delete($id)
	{
		$this->db->delete('barang_child', array('BACH_ID' => $id));
		redirect('c_barangChild');
	}
}
?>
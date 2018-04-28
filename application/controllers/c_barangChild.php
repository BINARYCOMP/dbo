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
		$barangParent=$this->m_barangChild->getBarangParent();
		$satuan=$this->m_barangChild->getSatuan();
		$data = array(
			'barang_child' =>$barangChild,
			'barang_parent' =>$barangParent,
			'satuan' =>$satuan,
			'title'=>'Anak Barang',
			'content' => 'v_barangChild',
			'menu'         => 'Barang Child'
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function form()
	{
		$nama = $_POST['txtnama'];
		$bapa = $_POST['txtbapa'];
		$satuan = $_POST['txtsatuan'];


		$data = array(
			'BACH_NAME' =>$nama ,
			'BACH_BAPA_ID' =>$bapa ,
			'BACH_SATU_ID' =>$satuan ,
			);
		$child=$this->m_barangChild->Insert($data);
		 redirect('c_barangChild');
	}
	public function FormUpdate($id){
		$barangChild=$this->m_barangChild->view();
		$child=$this->m_barangChild->Update($id); 
		$satuan=$this->m_barangChild->getSatuan();
		$barangParent=$this->m_barangChild->getBarangParent();
		$data = array(
			'barang_child' =>$barangChild,
			'content'=>'v_editBarangChild',
			'satuan' =>$satuan,
			'barang_parent' =>$barangParent,
			'title'=>'Edit Anak Barang',
			'barangChild' =>$child,
			'menu'         => 'Barang Child'
		);
		$this->load->view('tampilan/v_combine',$data);
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
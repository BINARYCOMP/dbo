<?php
/**
* 
*/
class C_barangChildCimuning extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barangChildCimuning');
	}

	public function index()
	{
		$barangChildCimuning=$this->m_barangChildCimuning->view();
		$barangParent=$this->m_barangChildCimuning->getBarangParent();
		$satuan=$this->m_barangChildCimuning->getSatuan();
		$data = array(
			'barang_child' =>$barangChildCimuning,
			'barang_parent' =>$barangParent,
			'satuan' =>$satuan,
			'title'=>'Anak Barang',
			'content' => 'v_barangChildCimuning',
			'menu'         => 'Barang Child'
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function form()
	{
		$nama = $_POST['txtnama'];
		$satuan = $_POST['txtsatuan'];


		$data = array(
			'BACC_NAME' =>$nama ,
			'BACC_SATU_ID' =>$satuan ,
			);
		$child=$this->m_barangChildCimuning->Insert($data);
		 redirect('c_barangChildCimuning');
	}
	public function FormUpdate($id){
		$barangChildCimuning 	=$this->m_barangChildCimuning->view();
		$child 			=$this->m_barangChildCimuning->Update($id); 
		$satuan 		=$this->m_barangChildCimuning->getSatuan();
		$barangParent 	=$this->m_barangChildCimuning->getBarangParent();
		$data  = array(
			'barang_child' =>$barangChildCimuning,
			'content'=>'v_editbarangChildCimuning',
			'satuan' =>$satuan,
			'barang_parent' =>$barangParent,
			'title'=>'Edit Anak Barang',
			'barangChildCimuning' =>$child,
			'menu'         => 'Barang Child'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id)
	{
		$nama 	= $_POST['txtnama'];
		$satuan = $_POST['txtsatuan'];

		$data = array(
			'BACC_NAME' =>$nama ,
			'BACC_SATU_ID' =>$satuan , 
			);
		$child=$this->m_barangChildCimuning->UpdateData($id, $data);
		redirect('C_barangChildCimuning');

	}
	public function delete($id)
	{
		$this->db->delete('barang_cimuning_child', array('BACC_ID' => $id));
		redirect('c_barangChildCimuning');
	}


}
?>

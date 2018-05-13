<?php
/**
* 
*/
class C_materialChildCimuning extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_materialChildCimuning');
	}

	public function index()
	{
		$cimuningChild=$this->m_materialChildCimuning->view();
		$cimuningParent=$this->m_materialChildCimuning->getBarangParent();
		$satuan=$this->m_materialChildCimuning->getSatuan();
		$data = array(
			'cimuning_child' =>$cimuningChild,
			'cimuning_Parent' =>$cimuningParent,
			'satuan' =>$satuan,
			'title'=>'Material Child Cimuning',
			'content' => 'v_materialChildCimuning',
			'menu'         => 'Material Child Cimuning'
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function form()
	{
		$parent = $_POST['txtparent'];
		$nama = $_POST['txtnama'];
		$satuan = $_POST['txtsatuan'];


		$data = array(
			'MCCI_MPCI_ID' =>$parent ,
			'MCCI_NAME' => $nama ,
			'MCCI_SATU_ID' =>$satuan ,
			'MCCI_MACI_TOTAL' => 0
			);
		$child=$this->m_materialChildCimuning->Insert($data);
		redirect('C_materialChildCimuning');
	}
	public function FormUpdate($id){
		$cimuningChild=$this->m_materialChildCimuning->view();
		$cimuningParent=$this->m_materialChildCimuning->getBarangParent();
		$satuan=$this->m_materialChildCimuning->getSatuan();
		$child=$this->m_materialChildCimuning->Update($id);
		$data = array(
			'cimuning_child' =>$cimuningChild,
			'cimuning_Parent' =>$cimuningParent,
			'satuan' =>$satuan,
			'title'=>' Edit Material Child Cimuning',
			'content' => 'v_editMaterialChildCimuning',
			'cimuningChild' => $child,
			'menu'         => 'Material Child Cimuning'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id)
	{

		$parent = $_POST['txtparent'];
		$nama = $_POST['txtnama'];
		$satuan = $_POST['txtsatuan'];


		$data = array(
			'MCCI_MPCI_ID' =>$parent ,
			'MCCI_NAME' => $nama ,
			'MCCI_SATU_ID' =>$satuan ,
			'MCCI_MACI_TOTAL' => 0
			);
		$child=$this->m_materialChildCimuning->UpdateData($id, $data);
		redirect('C_materialChildCimuning');

	}
	public function delete($id)
	{
		$this->db->delete('material_child_cimuning', array('MCCI_ID' => $id));
		redirect('C_materialChildCimuning');
	}
}
?>

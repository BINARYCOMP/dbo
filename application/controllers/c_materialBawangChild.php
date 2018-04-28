<?php
/**
* 
*/
class C_materialBawangChild extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_materialBawangChild');
	}

	public function index()
	{
		$bawangChild=$this->m_materialBawangChild->view();
		$bawangParent=$this->m_materialBawangChild->getBarangParent();
		$satuan=$this->m_materialBawangChild->getSatuan();
		$data = array(
			'bawang_child' =>$bawangChild,
			'bawang_Parent' =>$bawangParent,
			'satuan' =>$satuan,
			'title'=>'Material Bawang Child',
			'content' => 'v_materialBawangChild',
			'menu'         => 'Material Bawang Child'
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function form()
	{
		$parent = $_POST['txtparent'];
		$nama = $_POST['txtnama'];
		$satuan = $_POST['txtsatuan'];
		$total = $_POST['txttotal'];


		$data = array(
			'MCBA_MPBA_ID' =>$parent ,
			'MCBA_NAME' => $nama ,
			'MCBA_SATU_ID' =>$satuan ,
			'MCBA_MABA_TOTAL' => 0
			);
		$child=$this->m_materialBawangChild->Insert($data);
		redirect('C_materialBawangChild');
	}
	public function FormUpdate($id){
		$bawangChild=$this->m_materialBawangChild->view();
		$bawangParent=$this->m_materialBawangChild->getBarangParent();
		$satuan=$this->m_materialBawangChild->getSatuan();
		$child=$this->m_materialBawangChild->Update($id);
		$data = array(
			'bawang_child' =>$bawangChild,
			'bawang_Parent' =>$bawangParent,
			'satuan' =>$satuan,
			'content'=>'v_editMaterialBawangChild',
			'title'=>'Edit Material Bawang Child',
			'bawangChild' =>$child,
			'menu'         => 'Material Bawang Child'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id)
	{

		$parent = $_POST['txtparent'];
		$nama = $_POST['txtnama'];
		$satuan = $_POST['txtsatuan'];
		$total = $_POST['txttotal'];


		$data = array(
			'MCBA_MPBA_ID' =>$parent ,
			'MCBA_NAME' => $nama ,
			'MCBA_SATU_ID' =>$satuan ,
			'MCBA_MABA_TOTAL' => 0
			);
		$child=$this->m_materialBawangChild->UpdateData($id, $data);
		redirect('C_materialBawangChild');

	}
	public function delete($id)
	{
		$this->db->delete('material_child_bawang', array('MCBA_ID' => $id));
		redirect('C_materialBawangChild');
	}
}
?>
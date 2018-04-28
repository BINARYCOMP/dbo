<?php
/**
* 
*/
class C_materialParentBawang extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_materialParentBawang');
	}

	public function index()
	{
	$paba=$this->m_materialParentBawang->view();
		$data = array(
			'paba' =>$paba,
			'content'=>'v_materialParentBawang',
			'title' => 'Material Parent Bawang',
     	 	'menu'            => 'Material Parent Bawang'
		);
		$this->load->view('tampilan/v_combine', $data);

	}
	public function form()
	{
		$paba= $_POST['txtnama'];


		$data = array(
			'MPBA_NAME' =>$paba , 
			);
		$paba=$this->m_materialParentBawang->Insert($data);
		 redirect('C_materialParentBawang');
	}
	public function FormUpdate($id){
		$paba=$this->m_materialParentBawang->Update($id);
		$data = array(
			'paba' =>$paba,
			'content'=>'v_editMaterialParentBawang',
			'title' => 'Edit Material Parent Bawang',
     	 	'menu'            => 'Material Parent Bawang'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id){
		$paba= $_POST['txtnama'];

		$data = array(
			'MPBA_NAME' =>$paba 
			);
		$paba=$this->m_materialParentBawang->UpdateData($id, $data);
		redirect('C_materialParentBawang');

	}
	public function delete($id)
	{
		$this->db->delete('material_parent_bawang', array('MPBA_ID' => $id));
		redirect('C_materialParentBawang');
	}
}
?>
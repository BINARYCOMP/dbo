<?php
/**
* 
*/
class C_materialParentCimuning extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_materialParentCimuning');
	}

	public function index()
	{
	$paci=$this->m_materialParentCimuning->view();
		$data = array(
			'paci' =>$paci,
			'content'=>'v_materialParentCimuning',
			'title' => 'Material Parent Cimuning',
     	 	'menu'            => 'Material Parent Cimuning'
		);
		$this->load->view('tampilan/v_combine', $data);

	}
	public function form()
	{
		$paci= $_POST['txtnama'];


		$data = array(
			'MPCI_NAME' =>$paci , 
			);
		$paci=$this->m_materialParentCimuning->Insert($data);
		 redirect('C_materialParentCimuning');
	}
	public function FormUpdate($id){
		$paci=$this->m_materialParentCimuning->Update($id);
		$data = array(
			'paci' =>$paci,
			'content'=>'v_editMaterialParentCimuning',
			'title' => 'Edit Material Parent Cimuning',
     	 	'menu'            => 'Material Parent Cimuning'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id){
		$paci= $_POST['txtnama'];

		$data = array(
			'MPCI_NAME' =>$paci 
			);
		$paci=$this->m_materialParentCimuning->UpdateData($id, $data);
		redirect('C_materialParentCimuning');

	}
	public function delete($id)
	{
		$this->db->delete('material_parent_Cimuning', array('MPCI_ID' => $id));
		redirect('C_materialParentCimuning');
	}
}
?>

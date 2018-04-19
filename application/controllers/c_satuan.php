<?php
/**
* 
*/
class C_satuan extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_satuan');
  }

  public function index()
  {
  $satuan=$this->m_satuan->view();
    $data = array(
      'content'=>'v_satuan',
      'satuan' =>$satuan);
    $this->load->view('tampilan/v_combine', $data);

  }
  public function form()
  {
    $satuan = $_POST['txtsatuan'];


    $data = array(
      'SATU_NAME' =>$satuan , 
      );
    $satuan=$this->m_satuan->Insert($data);
     redirect('C_satuan');
  }
  public function FormUpdate($satuan){
    $satuan=$this->m_satuan->Update($satuan);
    $data = array(
      'content'=>'v_editsatuan',
      'satuan' =>$satuan);
    $this->load->view('tampilan/v_combine',$data);
  }
  public function UpdateData($id){
    $satuan = $_POST['txtsatuan'];

    $data = array(
      'SATU_NAME' =>$satuan  
      );
    $satuan=$this->m_satuan->UpdateData($id, $data);
    redirect('C_satuan');

  }
  public function delete($id)
  {
    $this->db->delete('satuan', array('SATU_ID' => $id));
    redirect('C_satuan');
  }
}
?>
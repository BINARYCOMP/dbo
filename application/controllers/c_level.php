<?php
/**
* 
*/
class C_level extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_level');
  }

  public function index()
  {
  $level=$this->m_level->view();
    $data = array(
      'level' =>$level);
    $this->load->view('v_level', $data);

  }
  public function form()
  {
    $level = $_POST['txtlevel'];


    $data = array(
      'LEVE_NAME' =>$level , 
      );
    $level=$this->m_level->Insert($data);
     redirect('C_level');
  }
  public function FormUpdate($level){
    $level=$this->m_level->Update($level);
    $data = array(
      'level' =>$level);
    $this->load->view('v_editlevel',$data);
  }
  public function UpdateData($id){
    $level = $_POST['txtlevel'];

    $data = array(
      'LEVE_NAME' =>$level  
      );
    $level=$this->m_level->UpdateData($id, $data);
    redirect('C_level');

  }
  public function delete($id)
  {
    $this->db->delete('level', array('LEVE_ID' => $id));
    redirect('C_level');
  }
}
?>
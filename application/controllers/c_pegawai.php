<?php 
/**
* 
*/
class C_pegawai extends CI_controller
{
	
	public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('m_pegawai');
  }
  public function index(){
    $data['pegawai'] = $this->m_pegawai->view();
    $this->load->view('v_pegawai',$data);
  }
  
  public function tambah(){
    if($this->input->post('submit')){
      if($this->m_pegawai->validation("save")){
        $this->m_pegawai->save();
        redirect('pegawai');
      }
    }
    
    $this->load->view('v_pegawai');
  }
  
  public function ubah($ID){
    if($this->input->post('submit')){
      if($this->m_pegawai->validation("update")){
        $this->m_pegawai->edit($ID);
        redirect('pegawai');
      }
    }
    
    $data['pegawai'] = $this->m_pegawai->view_by($ID);
    $this->load->view('v_pegawai_ubah', $data);
  }
  
  public function hapus($ID){
    $this->m_pegawai->delete($ID); // Panggil fungsi delete() yang ada di SiswaModel.php
    redirect('siswa');
  }
}
 ?>
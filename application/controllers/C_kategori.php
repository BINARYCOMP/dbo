<?php 

/**
* 
*/
class C_kategori extends CI_Controller
{
	
	public function __construct()
  {
    parent::__construct();
    $this->load->model('m_kategori');
  }

  public function index()
  {
  $kategori=$this->m_kategori->view();
    $data = array(
      'title'           => 'Kategori',
      'content'         => 'v_kategori',
      'kategori'        => $kategori,
      'menu'            => 'Input Kategori'
    );
    $this->load->view('tampilan/v_combine', $data);

  }
  public function form()
  {
    $kategori = $_POST['txtKategori'];


    $data = array(
      'KATE_NAME' =>$kategori , 
      );
    $kategori=$this->m_kategori->Insert($data);
     redirect('c_kategori');
  }
  public function FormUpdate($kategori){
    $kategori=$this->m_kategori->Update($kategori);
    $data = array(
      'title'           => 'Edit Kategori',
      'content'         => 'v_editKategori',
      'kategori'        => $kategori,
      'menu'            => 'Input Satuan'
    );
    $this->load->view('tampilan/v_combine',$data);
  }
  public function UpdateData($id){
    $kategori = $_POST['txtKategori'];

    $data = array(
      'KATE_NAME' =>$kategori  
      );
    $kategori=$this->m_kategori->UpdateData($id, $data);
    redirect('c_kategori');

  }
  public function delete($id)
  {
    $this->db->delete('kategori', array('KATE_ID' => $id));
    redirect('c_kategori');
  }

}

 ?>

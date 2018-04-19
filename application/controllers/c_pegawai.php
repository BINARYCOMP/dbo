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
    $dataPegawai = $this->m_pegawai->view();
    $data = array(
    	'content' =>'v_pegawai' ,
    	'pegawai'=>$dataPegawai);
    
    $this->load->view('tampilan/v_combine',$data);
  }
  
  public function tambah(){
    if($this->input->post('submit')){
      if($this->m_pegawai->validation("save")){
        $this->m_pegawai->save();
        redirect('c_pegawai');
      }
    }
    $data = array('content' => 'v_pegawai' );
    $this->load->view('tampilan/v_combine',$data);
  }
  public function ubah($id){
		$dataPegawai=$this->m_pegawai->view_by($id);
		$data = array(
			'content'=>'v_pegawai_ubah',
			'id'=>$id,
			'dataPegawai'=>$dataPegawai,
			'pegawai'=>$this->m_pegawai->view() 
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id){
		$idPegawai = $id;
		$nama = $_POST['I_nama'];
		$email = $_POST['I_email'];
		$alamat = $_POST['I_alamat'];
		$no_tlp = $_POST['I_no_tlp'];
		$jenis_kelamin = $_POST['I_jenis_kelamin'];

		$data = array(
			'PEGA_NAME' =>$nama ,
			'PEGA_EMAIL' =>$email ,
			'PEGA_ALAMAT' =>$alamat ,
			'PEGA_NO_TLP' =>$no_tlp ,
			'PEGA_JENKEL' =>$jenis_kelamin
			);
		$dataLevel=$this->m_pegawai->edit($idPegawai,$data);
		redirect('c_pegawai');
	}
  
  public function hapus($ID){
    $this->m_pegawai->delete($ID);
    redirect('c_pegawai');
  }
}
 ?>
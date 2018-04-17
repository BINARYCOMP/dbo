<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');

class M_pegawai extends CI_Model{
  public function view(){
    return $this->db->get('pegawai')->result();
  }
  public function view_by($ID)
  {
    $sql = "select * from pegawai where PEGA_ID = '$ID'";
    $query = $this->db->query($sql);
    $return = $query->result_array();
    return $return;
  }
  public function validation($mode){
    if($mode == "save")
      $this->form_validation->set_rules('I_nama','PEGA_NAME','required|max_length[80]');
      $this->form_validation->set_rules('I_email','PEGA_EMAIL','required|max_length[80]');
      $this->form_validation->set_rules('
        I_alamat','PEGA_ALAMAT','max_length[100]');
      $this->form_validation->set_rules('I_no_tlp','PEGA_NO_TLP','required|numeric|max_length[13]');
      $this->form_validation->set_rules('I_jenis_kelamin','PEGA_JENKEL','required');
      if($this->form_validation->run())
      return TRUE;
      else
      return FALSE;
  }

      public function save(){
      $data = array(
      "PEGA_NAME" => $this->input->post('I_nama'),
      "PEGA_EMAIL" => $this->input->post('I_email'),
      "PEGA_ALAMAT" => $this->input->post('I_alamat'),
      "PEGA_NO_TLP" => $this->input->post('I_no_tlp'),
      "PEGA_JENKEL" => $this->input->post('I_jenis_kelamin')
    );
      $this->db->insert('pegawai',$data);
    }
    public function edit($ID){
      $data=array(
        "PEGA_NAMA" => $this->input->post('I_nama'),
        "PEGA_EMAIL" => $this->input->post('I_email'),
        "PEGA_ALAMAT" => $this->input->post('I_alamat'),
        "PEGA_NO_TLP" => $this->input->post('I_no_tlp'),
        "PEGA_JENKEL" => $this->input->post('I_jenis_kelamin')
      );
        $this->db->where ('PEGA_ID',$ID);
        $this->db->update('pegawai', $data);
    }
    public function delete($ID){
      $this->db->where('PEGA_ID', $ID);
      $this->db->delete('pegawai');
    }
  }

 ?>
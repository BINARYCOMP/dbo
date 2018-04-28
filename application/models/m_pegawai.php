<?php
/**
* 
*/
class M_pegawai extends CI_Model
{
  
function view()
  {
    $sql = "select * from pegawai,agama where pegawai.PEGA_AGAM_ID=agama.AGAM_ID";
    $query=$this->db->query($sql);
    $return = $query->result_array();
  return $return

  }
  public function Insert($data)
  {
    
    $this->db->insert('pegawai',$data);
  }
  public function Update($data)
  {
    $sql="select * from pegawai where PEGA_ID =".$data;
    $query=$this->db->query($sql);
    $return = $query->result_array();
    return $return;
  }
  public function UpdateData($id, $data)
  {
    $this->db->where('PEGA_ID', $id);
    $this->db->update('pegawai', $data);
  }
  public function delete($id)
  {
    $this->db->where('PEGA_ID', $id);
    $this->db->delete('pegawai');
  }
  public function getAgama()
    {
      $sql="select * from agama";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
}
?>
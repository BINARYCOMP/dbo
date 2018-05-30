<?php
/**
* 
*/
class M_ruangan extends CI_Model
{
  
function view()
  {
    $sql    = "select * from ruangan";
    $query  = $this->db->query($sql);
    $return = $query->result_array();
    return $return;

  }
  public function Insert($data)
  {
    $this->db->insert('ruangan',$data);
  }
  public function Update($data)
  {
    $sql    ="select * from ruangan where RUAN_ID =".$data;
    $query  =$this->db->query($sql);
    $return = $query->result_array();
    return $return;
  }
  public function UpdateData($id, $data)
  {
    $this->db->where('RUAN_ID', $id);
    $this->db->update('ruangan', $data);
  }
  public function delete($id)
  {
    $this->db->where('RUAN_ID', $id);
    $this->db->delete('ruangan');
  }
}
?>

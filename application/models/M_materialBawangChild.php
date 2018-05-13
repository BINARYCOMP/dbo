<?php
/**
* 
*/
class M_materialBawangChild extends CI_Model
{
  
  public function view()
  {
    $sql = "select * from material_child_bawang inner join satuan on material_child_bawang.MCBA_SATU_ID=satuan.SATU_ID inner join material_parent_bawang on material_child_bawang.MCBA_MPBA_ID=material_parent_bawang.MPBA_ID";
    $query=$this->db->query($sql);
    $return = $query->result_array();
    return $return;

  }
  public function getBarangParent()
  {
    $sql = "select * from material_parent_bawang";
    $query=$this->db->query($sql);
    $return = $query->result_array();
    return $return;

  }
  public function getSatuan()
  {
    $sql = "select * from satuan";
    $query=$this->db->query($sql);
    $return = $query->result_array();
    return $return;

  }
  public function Insert($data)
  {
    
    $this->db->insert('material_child_bawang',$data);
  }
  public function Update($data)
  {
    $sql="select * from material_child_bawang where MCBA_ID =".$data;
    $query=$this->db->query($sql);
    $return = $query->result_array();
    return $return;
  }
  public function UpdateData($id, $data)
  {
    $this->db->where('MCBA_ID', $id);
    $this->db->update('material_child_bawang', $data);
  }
  public function delete($id)
  {
    $this->db->where('MCBA_ID', $id);
    $this->db->delete('material_child_bawang');
  }

}
?>

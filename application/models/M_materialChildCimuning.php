<?php
/**
* 
*/
class M_materialChildCimuning extends CI_Model
{
  
  public function view()
  {
    $sql = "select * from material_child_cimuning inner join satuan on material_child_cimuning.MCCI_SATU_ID=satuan.SATU_ID inner join material_parent_cimuning on material_child_cimuning.MCCI_MPCI_ID=material_parent_cimuning.MPCI_ID";
    $query=$this->db->query($sql);
    $return = $query->result_array();
    return $return;

  }
  public function getBarangParent()
  {
    $sql = "select * from material_parent_cimuning";
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
    
    $this->db->insert('material_child_cimuning',$data);
  }
  public function Update($data)
  {
    $sql="select * from material_child_cimuning where MCCI_ID =".$data;
    $query=$this->db->query($sql);
    $return = $query->result_array();
    return $return;
  }
  public function UpdateData($id, $data)
  {
    $this->db->where('MCCI_ID', $id);
    $this->db->update('material_child_cimuning', $data);
  }
  public function delete($id)
  {
    $this->db->where('MCCI_ID', $id);
    $this->db->delete('material_child_cimuning');
  }

}
?>

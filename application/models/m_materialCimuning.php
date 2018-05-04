<?php
  /**
   *
   */
  class M_materialCimuning extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
    }
    
    public function simpanBarang($data, $saldo, $child)
    {
      $this->db->insert("material_cimuning", $data);
      $data = array(
              'MCCI_MACI_TOTAL' => $saldo,
      );
      $this->db->where('mcci_id', $child);
      $this->db->update('material_child_cimuning', $data);
    }

    //nama Parent
    public function getParentName()
    {
      $sql="select * from material_parent_cimuning";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    // nama Child str
    public function getChildName($str)
    {
      $sql="select * from material_child_cimuning where mcci_mpci_id =".$str;
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getFirstStock($mcci_id,$mpci_id)
    {
      $sql="SELECT * from material_cimuning, material_parent_cimuning, material_child_cimuning where maci_mcci_id = mcci_id and maci_mpci_id = mpci_id and maci_mcci_id = ".$mcci_id." and maci_mpci_id = ".$mpci_id." and group by maci_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutKategori($mcci_id,$mpci_id)
    {
      $sql="SELECT * from material_cimuning, material_parent_cimuning, material_child_cimuning where maci_mcci_id = mcci_id and maci_mpci_id = mpci_id and maci_mcci_id = ".$mcci_id." and maci_mpci_id = ".$mpci_id." group by maci_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getDataGudang()
    {
      $sql    = "SELECT * from material_cimuning,material_child_cimuning,material_parent_cimuning where MACI_MCCI_ID = MCCI_ID AND MACI_MPCI_ID = MPCI_ID";
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getChildBympciId($id)
    {

      $sql    = "SELECT * FROM material_child_cimuning INNER JOIN material_parent_cimuning ON material_child_cimuning.MCCI_MPCI_ID = material_parent_cimuning.MPCI_ID inner join satuan on material_parent_cimuning.MPCI_ID=satuan.SATU_ID WHERE MCCI_MPCI_ID =".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return; 
    }
     
  }

 ?>
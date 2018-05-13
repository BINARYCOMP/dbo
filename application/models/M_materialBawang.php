<?php
  /**
   *
   */
  class M_materialBawang extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
    }
    
    public function simpanBarang($data, $saldo, $child)
    {
      $this->db->insert("material_bawang", $data);
      $data = array(
              'MCBA_MABA_TOTAL' => $saldo,
      );
      $this->db->where('mcba_id', $child);
      $this->db->update('material_child_bawang', $data);
    }

    //nama Parent
    public function getParentName()
    {
      $sql="select * from material_parent_bawang";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    // nama Child str
    public function getChildName($str)
    {
      $sql="select * from material_child_bawang where mcba_mpba_id =".$str;
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getFirstStock($mcba_id,$mpba_id,$ruan_id)
    {
      $sql="SELECT * from material_bawang, material_parent_bawang, material_child_bawang, ruangan where maba_mcba_id = mcba_id and maba_mpba_id = mpba_id and maba_ruan_id = ruan_id and maba_ruan_id = ".$ruan_id." and maba_mcba_id = ".$mcba_id." and maba_mpba_id = ".$mpba_id." group by maba_id desc limit 1";

      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutKategori($mcba_id,$mpba_id)
    {
      $sql="SELECT * from material_bawang, material_parent_bawang, material_child_bawang where maba_mcba_id = mcba_id and maba_mpba_id = mpba_id and maba_mcba_id = ".$mcci_id." and maba_mpba_id = ".$mpci_id." group by maba_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getDataGudang()
    {
      $sql    = "SELECT * from material_bawang,material_parent_bawang where MABA_MPBA_ID = MPBA_ID";
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getChildBympbaId($id)
    {

      $sql    = "SELECT * FROM material_child_bawang INNER JOIN material_parent_bawang ON material_child_bawang.MCBA_MPBA_ID = material_parent_bawang.MPBA_ID inner join satuan on material_parent_bawang.MPBA_ID=satuan.SATU_ID WHERE MCBA_MPBA_ID =".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return; 
    }
         public function getChildBymcbaId($id)
    {
      $sql    = "SELECT * from material_child_bawang where mcba_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getParentBympbaId($id)
    {
      $sql    = "SELECT * from material_parent_bawang where mpba_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getRuanganByRuanId($id)
    {
      $sql    = "SELECT * from ruangan where ruan_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getRuangan()
    {
      $sql="select * from ruangan";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutRuangan($mcba_id,$mpba_id)
    {
      $sql="SELECT * from material_bawang, material_parent_bawang, material_child_bawang where maba_mcba_id = mcba_id and maba_mpba_id = mpba_id and maba_mcba_id = ".$mcba_id." and maba_mpba_id = ".$mpba_id." group by mpba_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
  }
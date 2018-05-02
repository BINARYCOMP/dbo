<?php
  /**
   *
   */
  class M_material extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
    }
    
    public function simpanBarang($data, $saldo, $child)
    {
      $this->db->insert("gudang_jadi", $data);
      $data = array(
              'BACH_GUJA_TOTAL' => $saldo,
      );
      $this->db->where('bach_id', $child);
      $this->db->update('barang_child', $data);
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

    public function getFirstStock($mcba_id,$mpba_id)
    {
      $sql="SELECT * from material_bawang, material_child_bawang, material_parent_bawang where maba_mpba_id = mpba_id and maba_mcba_id = mcba_id  and  maba_mcba_id = ".$mcba_id." and maba_mpba_id = ".$mpba_id." group by maba_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getDataGudang()
    {
      $sql    = "select * from gudang_jadi,barang_child,barang_parent,kategori where GUJA_BACH_ID = BACH_ID AND GUJA_BAPA_ID = BAPA_ID AND GUJA_KATE_ID = KATE_ID";
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getChildByMpbaId($id)
    {
      $sql    = "SELECT * FROM material_child_bawang INNER JOIN material_parent_bawang ON MCBA_MPBA_ID = MPBA_ID inner join satuan on MCBA_SATU_ID = SATU_ID WHERE MCBA_MPBA_ID =".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return; 
    }

        public function getKategoriName()
    {
      $sql="select * from kategori";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

     
  }

 ?>



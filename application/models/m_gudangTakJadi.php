<?php
  /**
   *
   */
  class M_gudangTakJadi extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
    }
    
    public function simpanBarang($data, $saldo, $child)
    {
      $this->db->insert("gudang_tak_jadi", $data);
      $data = array(
              'BACH_GUTA_TOTAL' => $saldo,
      );
      $this->db->where('bach_id', $child);
      $this->db->update('barang_child', $data);
    }

    //nama Parent
    public function getParentName()
    {
      $sql="select * from barang_parent";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    // nama Child
    public function getChildName($str)
    {
      $sql="select * from barang_child where bach_bapa_id =".$str;
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getFirstStock($str)
    {
      $sql="select * from barang_child where bach_id =".$str;
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
  }

 ?>

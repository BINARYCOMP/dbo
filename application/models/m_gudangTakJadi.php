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
    
    public function getDataGudang()
    {
      $sql    = "select * from gudang_tak_jadi,barang_child,barang_parent,kategori where GUTA_BACH_ID = BACH_ID AND GUTA_BAPA_ID = BAPA_ID AND GUTA_KATE_ID = KATE_ID";
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getChildByBapaId($id)
    {
      $sql    = "SELECT * FROM barang_child INNER JOIN barang_parent ON barang_child.BACH_BAPA_ID = barang_parent.BAPA_ID inner join satuan on barang_parent.BAPA_ID=satuan.SATU_ID WHERE BACH_BAPA_ID =".$id;
      var_dump($sql);
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

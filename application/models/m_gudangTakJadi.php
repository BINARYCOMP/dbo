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
      $this->db->where('gutA_id', $child);
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

    // nama Child str
    public function getChildName($str)
    {
      $sql="select * from barang_child where bach_bapa_id =".$str;
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getFirstStock($bach_id,$bapa_id,$kate_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_parent, barang_child, kategori where guta_bach_id = bach_id and guta_bapa_id = bapa_id and guta_kate_id = kate_id and  guta_bach_id = ".$bach_id." and guta_bapa_id = ".$bapa_id." and guta_kate_id = ".$kate_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutKategori($bach_id,$bapa_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_parent, barang_child where guta_bach_id = bach_id and guta_bapa_id = bapa_id and guta_bach_id = ".$bach_id." and guta_bapa_id = ".$bapa_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getDataGudang()
    {
      $sql    = "SELECT * from gudang_tak_jadi,barang_child,barang_parent where GUTA_BACH_ID = BACH_ID AND GUTA_BAPA_ID = BAPA_ID";
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getKateNameByGutaKateId($id)
    {
      $sql    = "SELECT * from kategori where kate_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getChildByBapaId($id)
    {
      var_dump($id);
      $sql    = "SELECT * FROM barang_child INNER JOIN barang_parent ON barang_child.BACH_BAPA_ID = barang_parent.BAPA_ID inner join satuan on barang_parent.BAPA_ID=satuan.SATU_ID WHERE BACH_BAPA_ID =".$id;
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

    public function getChildByBachId($id)
    {
      $sql    = "SELECT * from barang_child where bach_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getParentByBapaId($id)
    {
      $sql    = "SELECT * from barang_parent where bapa_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getKategoriByKateId($id)
    {
      $sql    = "SELECT * from kategori where kate_id = ".$id;
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

      public function getRuanNumberByGutaRuanId($id)
    {
      $sql    = "SELECT * from ruangan where ruan_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
  }
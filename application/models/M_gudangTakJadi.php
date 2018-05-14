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
    }

    //nama Parent
    public function getParentName()
    {
      $sql="select * from barang_cimuning_parent";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    //data Ruangan
    public function getRuangan()
    {
      $sql="select * from ruangan";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    // nama Child str
    public function getChildName($str)
    {
      $sql="select * from barang_cimuning_child where bach_bapa_id =".$str;
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getFirstStock($bach_id,$bapa_id,$kate_id,$ruan_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_cimuning_parent, barang_cimuning_child, kategori, ruangan where guta_bach_id = bach_id and guta_bapa_id = bapa_id and guta_kate_id = kate_id and  guta_bach_id = ".$bach_id." and guta_bapa_id = ".$bapa_id." and guta_kate_id = ".$kate_id." and guta_ruan_id = ".$ruan_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutRuangan($bach_id,$bapa_id,$kate_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_cimuning_parent, barang_cimuning_child, kategori where guta_bach_id = bach_id and guta_bapa_id = bapa_id and guta_kate_id = kate_id and  guta_bach_id = ".$bach_id." and guta_bapa_id = ".$bapa_id." and guta_kate_id = ".$kate_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutKategori($bach_id,$bapa_id, $ruan_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_cimuning_parent, barang_cimuning_child, ruangan where guta_bach_id = bach_id and guta_bapa_id = bapa_id and guta_bach_id = ".$bach_id." and guta_bapa_id = ".$bapa_id." and guta_ruan_id = ".$ruan_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutRuanganAndKategori($bach_id,$bapa_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_cimuning_parent, barang_cimuning_child, where guta_bach_id = bach_id and guta_bapa_id = bapa_id and guta_kate_id = kate_id and  guta_bach_id = ".$bach_id." and guta_bapa_id = ".$bapa_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getDataGudang()
    {
      $sql    = "SELECT * from gudang_tak_jadi,barang_cimuning_child,barang_cimuning_parent where guta_BACH_ID = BACH_ID AND guta_BAPA_ID = BAPA_ID";
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getKateNameBygutaKateId($id)
    {
      $sql    = "SELECT * from kategori where kate_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getRuanNumberBygutaRuanId($id)
    {
      $sql    = "SELECT * from ruangan where ruan_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }


    public function getChildByBapaId($id)
    {
      var_dump($id);
      $sql    = "SELECT * FROM barang_cimuning_child INNER JOIN barang_cimuning_parent ON barang_cimuning_child.BACH_BAPA_ID = barang_cimuning_parent.BAPA_ID inner join satuan on barang_cimuning_parent.BAPA_ID=satuan.SATU_ID WHERE BACH_BAPA_ID =".$id;
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
      $sql    = "SELECT * from barang_cimuning_child where bach_id = ".$id;
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getParentByBapaId($id)
    {
      $sql    = "SELECT * from barang_cimuning_parent where bapa_id = ".$id;
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

     
  }
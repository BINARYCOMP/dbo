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
    
    public function simpanBarang($data, $saldo)
    {
      $this->db->insert("gudang_tak_jadi", $data);
    }

    //nama Parent
    public function getBarangName()
    {
      $sql="select * from barang_cimuning_child";
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
      $sql="select * from barang_child where bach_BACC_id =".$str;
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }

    public function getFirstStock($BACC_id,$kate_id,$ruan_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_cimuning_child, kategori, ruangan where guta_BACC_id = BACC_id and guta_kate_id = kate_id and guta_BACC_id = ".$BACC_id." and guta_kate_id = ".$kate_id." and guta_ruan_id = ".$ruan_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutRuangan($BACC_id,$kate_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_cimuning_child, kategori where guta_BACC_id = BACC_id and guta_kate_id = kate_id and guta_BACC_id = ".$BACC_id." and guta_kate_id = ".$kate_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutKategori($BACC_id, $ruan_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_cimuning_child, ruangan where guta_BACC_id = BACC_id and guta_BACC_id = ".$BACC_id." and guta_ruan_id = ".$ruan_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getFirstStockWithoutRuanganAndKategori($BACC_id)
    {
      $sql="SELECT * from gudang_tak_jadi, barang_cimuning_child where guta_BACC_id = BACC_id and guta_kate_id = kate_id and guta_BACC_id = ".$BACC_id." group by guta_id desc limit 1";
      $query=$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getDataGudang()
    {
      $sql    = "SELECT * from gudang_tak_jadi, barang_cimuning_child where guta_BACC_ID = BACC_ID";
      $query  = $this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getDataGudangByGutaId($id)
    {
      $sql    = "SELECT * from gudang_tak_jadi, barang_cimuning_child where guta_BACC_ID = BACC_ID AND GUTA_ID = ".$id;
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


    public function getChildByBaccId($id)
    {
      var_dump($id);
      $sql    = "SELECT * FROM barang_child INNER JOIN barang_cimuning_child ON barang_child.BACH_BACC_ID = barang_cimuning_child.BACC_ID inner join satuan on barang_cimuning_child.BACC_ID=satuan.SATU_ID WHERE BACH_BACC_ID =".$id;
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
    public function getParentByBACCId($id)
    {
      $sql    = "SELECT * from barang_cimuning_child where BACC_id = ".$id;
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
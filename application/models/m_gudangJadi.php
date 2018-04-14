<?php
  /**
   *
   */
  class M_gudangJadi extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
    }
    public function simpanBarang($data)
    {
      $this->db->insert("gudang_jadi", $data);
    }
  }

 ?>

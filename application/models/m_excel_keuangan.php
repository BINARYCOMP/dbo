<?php 

/**
* 
*/
class M_excel_keuangan extends CI_Model
{

	  public function view()
	  {
	  	$this->db->select('*');
	  	$this->db->from('keuangan');
	  	$query=$this->db->get();
		return $query->result();
		
	  }
	  public function total()
	  {
	  	$this->db->select('SUM(KEUA_SALDO)');
	  	$this->db->from('keuangan');
	  	$query=$this->db->get();
		return $query->result();
	  }
  		
}

 ?>
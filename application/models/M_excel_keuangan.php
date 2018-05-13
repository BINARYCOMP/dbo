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
	  	$this->db->select_sum('KEUA_SALDO');
	  	$query=$this->db->get('keuangan');
		return $query->result();
	  }
  		
}

 ?>

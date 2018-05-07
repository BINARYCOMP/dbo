<?php
/**
 * 
 */
class M_keuangan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function view()
	{
		$sql="select * from keuangan";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getSaldoAkhir()
	{
		$sql="select * from keuangan order by KEUA_ID desc limit 1";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function Insert($data)
	{
		$this->db->insert('keuangan',$data);
	}
	public function FormUpdate($data)
	{
		$sql="select * from keuangan where KEUA_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function Update($id, $data)
	{
		$this->db->where('KEUA_ID', $id);
		$this->db->update('keuangan', $data);
	}
	public function delete($id)
	{
		$this->db->where('KEUA_ID', $id);
		$this->db->delete('keuangan');
	}
}
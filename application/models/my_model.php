<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class my_model extends CI_Model {

	
	public function GetData()
	{
			$query = "SELECT * FROM tb_data";
			$result = $this->db->query($query);
			return $result->result();
	}
	
	public function InsertData($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	
	public function UpdateData($table,$data,$where)
	{
		return $this->db->update($table,$data,$where);
	}
	
	public function DeleteData($table,$where)
	{
		return $this->db->delete($table,$where);
	}
}
?>
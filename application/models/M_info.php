<?php 
/**
 * 
 */
class M_info extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("gereja", $data);
	}

	function data_list(){
		$hasil=$this->db->query("Select * from gereja");
		return $hasil->result();

		// $this->db->select("*");
		// $this->db->from("news");
		// $query = $this->db->get();
		// return $query->result();
	}

	function editData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('gereja',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from gereja where id = $data");
		return $hasil;
	}



}
?>
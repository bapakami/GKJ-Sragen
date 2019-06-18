<?php 

class M_Gereja_DataPepantans extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("pepantans", $data);
	}

	function DataList($gerejaid){
		$query = $this->db->query("SELECT * FROM pepantans Where gereja_id = $gerejaid order by namapepantan ASC");
        return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('pepantans',$data);
	}
	
	function hapusData($data)
	{
		$hasil = $this->db->query("delete from pepantans where id = $data");
		return $hasil;
	}



}
?>
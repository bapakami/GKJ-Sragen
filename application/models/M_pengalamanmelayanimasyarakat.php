<?php 
/**
 * 
 */
class M_pengalamanmelayanimasyarakat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("pengalamanmelayanimas", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From pengalamanmelayanimas");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('pengalamanmelayanimas',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from pengalamanmelayanimas where idx = $data");
		return $hasil;
	}



}
?>
<?php 
/**
 * 
 */
class M_Master_Status_Keluarga extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("manajemen_keluarga", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From manajemen_keluarga");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('manajemen_keluarga',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from manajemen_keluarga where idx = $data");
		return $hasil;
	}



}
?>
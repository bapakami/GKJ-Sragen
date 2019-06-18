<?php 
/**
 * 
 */
class M_pekerjaanpokok extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("pekerjaanpokok", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From pekerjaanpokok");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('pekerjaanpokok',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from pekerjaanpokok where idx = $data");
		return $hasil;
	}



}
?>
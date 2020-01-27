<?php 
/**
 * 
 */
class M_status extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("master_status", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From master_status");
		return $query;
	}
	

	function editData($id,$data)
	{
		$this->db->where('id_status',$id);
		return $this->db->update('master_status',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from master_status where id_status = $data");
		return $hasil;
	}



}
?>
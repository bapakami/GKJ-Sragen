<?php 
/**
 * 
 */
class M_Perangereja extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("perangereja", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From perangereja");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('perangereja',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from perangereja where idx = $data");
		return $hasil;
	}



}
?>
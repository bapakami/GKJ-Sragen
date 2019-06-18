<?php 
/**
 * 
 */
class M_minatpelayanangereja extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("pelayanangereja", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From pelayanangereja");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('pelayanangereja',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from pelayanangereja where idx = $data");
		return $hasil;
	}



}
?>
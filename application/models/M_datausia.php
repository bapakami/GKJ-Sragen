<?php 
/**
 * 
 */
class M_datausia extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("usiajemaat", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From usiajemaat");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('usiajemaat',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from usiajemaat where idx = $data");
		return $hasil;
	}



}
?>
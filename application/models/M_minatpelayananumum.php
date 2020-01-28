<?php 
/**
 * 
 */
class M_minatpelayananumum extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("pelayananumum", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From pelayananumum");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('pelayananumum',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from pelayananumum where idx = $data");
		return $hasil;
	}



}
?>
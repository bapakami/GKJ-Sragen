<?php 
/**
 * 
 */
class M_pekerjaansampingan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("pekerjaansampingan", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From pekerjaansampingan");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('pekerjaansampingan',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from pekerjaansampingan where idx = $data");
		return $hasil;
	}



}
?>
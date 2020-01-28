<?php 
/**
 * 
 */
class M_penghasilanperbulan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("penghasilan", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From penghasilan");
		return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('penghasilan',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from penghasilan where idx = $data");
		return $hasil;
	}



}
?>
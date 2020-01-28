<?php 
/**
 * 
 */
class M_user extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("news", $data);
	}

	function berita_list(){
		$hasil=$this->db->query("Select * from news ORDER BY id DESC");
		return $hasil->result();
	}

	function view_by_id($id)
	{
		$hasil=$this->db->query("Select * from news WHERE id=$id");
		return $hasil->result();
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from news where id = $data");
		return $hasil;
	}



}
?>
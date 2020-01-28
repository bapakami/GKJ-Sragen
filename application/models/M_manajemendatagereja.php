<?php 

class M_manajemendatagereja extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("gereja", $data);
	}

	function dataList(){
		$hasil=$this->db->query("Select * from gereja");
		return $hasil;
	}

	function get_data_list($limit, $start){
		$this->db->select('*');
	    $this->db->from('gereja');
	    $this->db->order_by('id','DESC');
	    $this->db->limit($limit, $start);
	    $query = $this->db->get();
	    return $query->result();
	}

	function editData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('gereja',$data);
	}

	function gereja(){
	    $this->db->order_by('namagereja','ASC');
	    $provinces= $this->db->get('gereja');
	    return $provinces->result_array();
    }

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from gereja where id = $data");
		return $hasil;
	}
}
?>
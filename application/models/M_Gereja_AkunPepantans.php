<?php 

class M_Gereja_AkunPepantans extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("users", $data);
	}

	function DataAkunList($gerejaid){
		$query = $this->db->query("SELECT a.*,c.groupname,b.namapepantan FROM users a 
			LEFT JOIN groups c ON c.id = a.group_id 
			LEFT JOIN pepantans b ON b.id = a.pepantans_id
			Where a.gereja_id = $gerejaid and a.group_id = 7 and a.active = 1");
        return $query;
	}

	function updateData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('users',$data);
	}

	function pepantan($idGereja){
	    $this->db->order_by('namapepantan','ASC');
	    $this->db->where('gereja_id',$idGereja);
	    $pepantan= $this->db->get('pepantans');
	    return $pepantan->result_array();
    }

	function GetNamaGereja($idGereja){
	   	$this->db->select('namagereja');
    	$this->db->from('gereja');
    	$this->db->where('id',$idGereja);
	    return $this->db->get()->row()->namagereja;
    }

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from users where id = $data");
		return $hasil;
	}



}
?>
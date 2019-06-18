<?php 

class M_Gereja_ManajemenAkun extends CI_Model
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
		$query = $this->db->query("SELECT a.*,c.groupname,b.namagereja as namagereja FROM users a 
			LEFT JOIN groups c ON c.id = a.group_id 
			LEFT JOIN gereja b ON b.id = a.gereja_id
			Where a.gereja_id = $gerejaid and a.group_id = 1");
        return $query;
	}

	function updateData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('users',$data);
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
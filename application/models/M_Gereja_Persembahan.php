<?php 

class M_Gereja_Persembahan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function GetNamaPepantan($idGereja)
	{
	    $this->db->order_by('namapepantan','ASC');
	    $this->db->where('gereja_id',$idGereja);
	    $pepantan= $this->db->get('pepantans');
	    return $pepantan->result_array();
    }

    function DataList($idgereja,$type){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM persembahans_new a 
			LEFT JOIN gereja b ON b.id = a.Gereja_id
			LEFT JOIN pepantans c ON c.id = a.Pepantan_id
			WHERE a.Gereja_id = $idgereja and a.Type = '$type'");
        return $query;
	}

	function insertData($data){
		$this->db->insert("persembahans_new", $data);
	}

	function updateData($id,$data)
	{
		$this->db->where('Idx',$id);
		return $this->db->update('persembahans_new',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from persembahans_new where Idx = $data");
		return $hasil;
	}



}
?>
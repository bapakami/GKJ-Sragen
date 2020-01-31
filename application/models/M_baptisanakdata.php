<?php 
class M_baptisanakdata extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function DataList($idgereja,$type){
		$query = $this->db->query("Select a.Idx,a.Type,a.Jumlah,a.Minggu,a.Bulan,a.Tahun,a.Keterangan,a.Sumber_persembahan,b.namagereja as namagereja FROM persembahans_new a LEFT JOIN gereja b ON b.id = a.Gereja_id where a.Gereja_id = '$idgereja' and a.Type = '$type' ");
    	return $query;
	}

	function gereja(){
	    $this->db->order_by('namagereja','ASC');
	    $provinces= $this->db->get('gereja');
	    return $provinces->result_array();
    }

}
?>
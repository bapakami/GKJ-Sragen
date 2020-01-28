<?php 
/**
 * 
 */
class M_laporan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function GetNamaGereja($idGereja){
	   	$this->db->select('namagereja');
    	$this->db->from('gereja');
    	$this->db->where('id',$idGereja);
	    return $this->db->get()->row()->namagereja;
    }
    
	function insertData($data){
		$this->db->insert("users", $data);
	}

	function data_list(){
		$hasil=$this->db->query("Select * from users");
		return $hasil->result();
	}

	function editData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('users',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from users where id = $data");
		return $hasil;
	}

	function gereja(){
    	$hasil = $this->db->query("SELECT id as id,namagereja as namagereja FROM gereja ORDER BY id");
		return $hasil->result_array();
	}

	function data_manajemenpenghasilan($query){
		$hasil=$this->db->query($query);
		//$hasil=$this->db->limit($limit, $start);
		return $hasil->result();

		// $this->db->select('a.id as id_persembahan,a.gereja_id as idgereja,a.tgl_persembahan as tgl,a.mingguan as mingguan,a.bulanan as bulanan,b.namagereja as nama_gereja,a.khusus_mirunggan as khusus,a.perpuluhan as perpuluhan,a.pembangunan as pembangunan,a.syukur as syukur');
	 //    $this->db->from('persembahans a');
	 //    $this->db->join('gereja b','b.id=a.gereja_id','LEFT');
	 //    $this->db->order_by('a.id','DESC');
	 //    $this->db->limit($limit, $start);
	 //    $query = $this->db->get();
	 //    return $query->result();
	}
}
?>
<?php 
/**
 * 
 */
class M_NonJemaat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("jemaats", $data);
	}
	
	function DataListJemaatEdit($idJemaat){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM jemaats a 
			LEFT JOIN gereja b ON b.id = a.gerejaid
			LEFT JOIN pepantans c ON c.id = a.pepantan_id
			WHERE a.id = $idJemaat and a.status = 'Hidup' and a.type = 0");
        return $query;
	}

	function DataList($idgereja){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM jemaats a 
			LEFT JOIN gereja b ON b.id = a.gerejaid
			LEFT JOIN pepantans c ON c.id = a.pepantan_id
			WHERE a.gerejaid = $idgereja and a.status = 'Hidup' and a.type = 0");
        return $query;
	}

		function DataListMeninggal($idgereja){
			$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM jemaats a 
				LEFT JOIN gereja b ON b.id = a.gerejaid
				LEFT JOIN pepantans c ON c.id = a.pepantan_id
				WHERE a.gerejaid = $idgereja and a.status = 'Wafat'");
	        return $query;
		}

	function DetailJemaat($id){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM jemaats a 
			LEFT JOIN gereja b ON b.id = a.gerejaid
			LEFT JOIN pepantans c ON c.id = a.pepantan_id
			WHERE a.id = $id");
        return $query;
	}
	
	function updateData($id,$data)
	{
        $this->db->where('id',$id);
		return $this->db->update('jemaats',$data);
	}

	function updateDataKematian($id,$data)
	{
        $this->db->where('id',$id);
		return $this->db->update('jemaats',$data);
	}

	function pepantan($idGereja){
	    $this->db->order_by('namapepantan','ASC');
	    $this->db->where('gereja_id',$idGereja);
	    $pepantan= $this->db->get('pepantans');
	    return $pepantan->result_array();
    }

    function gereja(){
	    $this->db->order_by('namagereja','ASC');
	    $provinces= $this->db->get('gereja');
	    return $provinces->result_array();
    }

    function Pendidikan(){
	    $this->db->order_by('nama_strata','ASC');
	    $pendidikan= $this->db->get('pendidikan');
	    return $pendidikan->result_array();
    }
    
    function PeranDalamGereja(){
	    $this->db->order_by('nama_peran','ASC');
	    $pendidikan= $this->db->get('perangereja');
	    return $pendidikan->result_array();
    }

    function UsiaJemaat(){
	    $this->db->order_by('usia','ASC');
	    $pendidikan= $this->db->get('usiajemaat');
	    return $pendidikan->result_array();
    }
    
    function MinatPelayanUmum(){
	    $this->db->order_by('nama_pu','ASC');
	    $pendidikan= $this->db->get('pelayananumum');
	    return $pendidikan->result_array();
    }
    
    function MinatPelayananGereja(){
	    $this->db->order_by('nama_pg','ASC');
	    $pendidikan= $this->db->get('pelayanangereja');
	    return $pendidikan->result_array();
    }
    
    function pengalamanMelayaniMasyarakat(){
	    $this->db->order_by('nama_pmm','ASC');
	    $pendidikan= $this->db->get('pengalamanmelayanimas');
	    return $pendidikan->result_array();
    }
    function Penghasilan(){
	    $this->db->order_by('penghasilan_perbulan','ASC');
	    $penghasilan= $this->db->get('penghasilan');
	    return $penghasilan->result_array();
    }

    function Pekerjaan(){
	    $this->db->order_by('nama_pp','ASC');
	    $pekerjaan= $this->db->get('pekerjaanpokok');
	    return $pekerjaan->result_array();
    }

    function GetKodeGereja($idGereja){
	   	$this->db->select('kode_gereja');
    	$this->db->from('gereja');
    	$this->db->where('id',$idGereja);
	    return $this->db->get()->row()->kode_gereja;
    }
	function hapusData($data)
	{
		$hasil = $this->db->query("delete from Jemaats where id = $data");
		return $hasil;
	}

}
?>
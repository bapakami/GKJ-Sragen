<?php 
class M_KlasisJemaat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("jemaats", $data);
	}

	function DataList($idgereja,$status){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM jemaats a 
            LEFT JOIN gereja b ON b.id = a.gerejaid
            LEFT JOIN pepantans c ON c.id = a.pepantan_id
            WHERE a.gerejaid = $idgereja and a.status = '$status'");
        return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('jemaats',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from jemaats where id = $data");
		return $hasil;
	}

	function gereja(){
	    $this->db->order_by('namagereja','ASC');
	    $provinces= $this->db->get('gereja');
	    return $provinces->result_array();
    }

    	function DetailJemaat($id){
    		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM jemaats a 
    			LEFT JOIN gereja b ON b.id = a.gerejaid
    			LEFT JOIN pepantans c ON c.id = a.pepantan_id
    			WHERE a.id = $id");
            return $query;
    	}

    		function pepantan($idGereja){
    		    $this->db->order_by('namapepantan','ASC');
    		    $this->db->where('gereja_id',$idGereja);
    		    $pepantan= $this->db->get('pepantans');
    		    return $pepantan->result_array();
    	    }

    	    function Pendidikan(){
    		    $this->db->order_by('nama_strata','ASC');
    		    $pendidikan= $this->db->get('pendidikan');
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
            function getPDF($kode)
            {
                 $hasil=$this->db->query("SELECT a.*,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.id=$kode ");                 
                 return $hasil->result();
            }

}
?>
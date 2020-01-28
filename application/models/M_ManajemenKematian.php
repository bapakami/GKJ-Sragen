<?php 

class M_ManajemenKematian extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($gereja)
	{		
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,b.namagereja as namagereja, a.tanggal_kematian as tanggal_kematian, a.kota_kematian as kota_kematian, a.tempat_kematian as tempat_kematian from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Wafat' ");
		 
		 return $hasil->result();
	}

	function getStatistik($gereja)
	{		
		 $hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Wafat' ");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
<?php 

class M_manajemenalamat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($alamat,$gereja)
	{
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,a.alamat_tinggal as alamat,a.alamat_ktp as alamat_ktp,a.status_rumah_tinggal as status_rumah,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and a.alamat_tinggal LIKE '%$alamat%'");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
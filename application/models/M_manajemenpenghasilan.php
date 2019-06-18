<?php 

class M_manajemenpenghasilan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($penghasilan,$gereja)
	{
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap, a.jenis_kelamin as gender,a.pendidikan as pendidikan,a.pekerjaan as pekerjaan, a.alamat_tinggal as alamat,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.penghasilan = '$penghasilan' and a.status = 'Hidup' AND a.gerejaid = $gereja ");
		 
		 return $hasil->result();
	}

	function getStatistik($penghasilan,$gereja)
	{
		 $hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.penghasilan = '$penghasilan' and a.status = 'Hidup' AND a.gerejaid = $gereja ");
		 
		 return $hasil->result();
	}

	function getXLS($penghasilan,$gereja)
	{
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap, a.jenis_kelamin as gender,a.pendidikan as pendidikan,a.pekerjaan as pekerjaan, a.alamat_tinggal as alamat,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.penghasilan = '$penghasilan' and a.status = 'Hidup' AND a.gerejaid = $gereja ");
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
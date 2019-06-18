<?php 

class M_manajemenusia extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($partsUsia,$partsStatus,$gereja)
	{		
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,a.alamat_tinggal as alamat,a.jenis_kelamin as gender,a.usia as usia,b.namagereja as namagereja, a.status_perkawinan as status_perkawinan from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and ((a.status_perkawinan in ($partsStatus)) AND (a.usia in ($partsUsia)))");
		 
		 return $hasil->result();
	}

	function getStatistik($partsUsia,$partsStatus,$gereja)
	{		
		 $hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,COUNT(IF(a.usia='<12 th',1, NULL)) as Kurang12,COUNT(IF(a.usia='13-17 th',1, NULL)) as Remaja,COUNT(IF(a.usia='18-25 th',1, NULL)) as Pemuda, COUNT(IF(a.usia='26-40 th',1, NULL)) as DewasaMuda,COUNT(IF(a.usia='41-60 th',1, NULL)) as Dewasa, COUNT(IF(a.usia='>60 th',1, NULL)) as Adiyuswa,COUNT(IF(a.status_perkawinan='Menikah',1, NULL)) as Menikah,COUNT(IF(a.status_perkawinan='Belum Menikah',1, NULL)) as BelumMenikah,COUNT(IF(a.status_perkawinan='Janda',1, NULL)) as Janda,COUNT(IF(a.status_perkawinan='Duda',1, NULL)) as Duda,COUNT(IF(a.status_perkawinan='Single Parent',1, NULL)) as SingleParent from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and ((a.status_perkawinan in ($partsStatus)) AND (a.usia in ($partsUsia)))");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
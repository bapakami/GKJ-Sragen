<?php 

class M_manajemenpendidikan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($gereja,$partsNo)
	{
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,a.penghasilan as penghasilan,a.pendidikan as pendidikan,a.tgl_lahir as tanggal_lahir,a.jenis_kelamin as jenis_kelamin,a.telepon as telepon, a.alamat_tinggal as alamat,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and a.pendidikan in ($partsNo)");
		 
		 return $hasil->result();
	}
	function getStatistik($gereja,$partsNo)
	{
		 $hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,COUNT(IF(a.pendidikan='D1',1, NULL)) as D1,COUNT(IF(a.pendidikan='D2',1, NULL)) as D2,COUNT(IF(a.pendidikan='D3',1, NULL)) as D3, COUNT(IF(a.pendidikan='D4',1, NULL)) as D4,COUNT(IF(a.pendidikan='Sarjana',1, NULL)) as Sarjana, COUNT(IF(a.pendidikan='S2',1, NULL)) as S2,COUNT(IF(a.pendidikan='S3',1, NULL)) as S3,COUNT(IF(a.pendidikan='SD',1, NULL)) as SD,COUNT(IF(a.pendidikan='SMP',1, NULL)) as SMP, COUNT(IF(a.pendidikan='SMA',1, NULL)) as SMA, COUNT(IF(a.pendidikan='Tidak sekolah',1, NULL)) as TidakSekolah, COUNT(IF(a.pendidikan='Lain-lain',1, NULL)) as Lainlain from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and a.pendidikan in ($partsNo)");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
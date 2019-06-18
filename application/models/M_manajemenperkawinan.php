<?php 

class M_manajemenperkawinan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($gereja,$parts)
	{
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,a.status_perkawinan as status_perkawinan,a.tatacara_nikah as tatacara_nikah,a.tgl_nikah as tgl_nikah,a.jml_anak as jumlah_anak,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status_perkawinan in ($parts)");
		 
		 return $hasil->result();
	}
	function getStatistik($gereja,$parts)
	{
		 $hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,COUNT(IF(a.status_perkawinan='Belum Menikah',1, NULL)) as BelumMenikah,COUNT(IF(a.status_perkawinan='Duda',1, NULL)) as Duda,COUNT(IF(a.status_perkawinan='Janda',1, NULL)) as Janda, COUNT(IF(a.status_perkawinan='Menikah',1, NULL)) as Menikah,COUNT(IF(a.status_perkawinan='Single Parent',1, NULL)) as SingleParent from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and a.status_perkawinan in ($parts)");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
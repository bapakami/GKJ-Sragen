<?php 

class M_manajemenpelayanan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($gereja,$parts)
	{
		$hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,a.jenis_kelamin as gender,a.alamat_tinggal as alamat, a.telepon as telepon, a.minat_pelayanan_gereja as minat_pelayanan_gereja,b.namagereja as namagereja FROM jemaats a
            LEFT JOIN gereja b ON a.gerejaid = b.id where a.gerejaid = $gereja and a.status = 'Hidup' AND 
            ( a.minat_pelayanan_gereja in ($parts))");
		 
		 return $hasil->result();
	}
	function getStatistik($gereja,$parts)
	{
		$hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,COUNT(IF(a.minat_pelayanan_gereja='Paduan suara',1, NULL)) as PaduanSuara,COUNT(IF(a.minat_pelayanan_gereja='Pengurus komisi',1, NULL)) as PengurusKomisi,COUNT(IF(a.minat_pelayanan_gereja='Pengiring ibadah',1, NULL)) as PengiringIbadah, COUNT(IF(a.minat_pelayanan_gereja='Menjadi majelis',1, NULL)) as MenjadiMajelis,COUNT(IF(a.minat_pelayanan_gereja='Memimpin PA',1, NULL)) as MemimpinPA, COUNT(IF(a.minat_pelayanan_gereja='Membuat bahan PA',1, NULL)) as BahanPA,COUNT(IF(a.minat_pelayanan_gereja='Guru sekolah minggu',1, NULL)) as GuruSekolahMinggu,COUNT(IF(a.minat_pelayanan_gereja='Mendampingi anak/remaja/pemuda',1, NULL)) as Mendampingi,COUNT(IF(a.minat_pelayanan_gereja='Panitia pembangunan',1, NULL)) as PanitiaPembangunan, COUNT(IF(a.minat_pelayanan_gereja='Multimedia',1, NULL)) as Multimedia, COUNT(IF(a.minat_pelayanan_gereja='Administrasi gereja',1, NULL)) as AdministrasiGereja, COUNT(IF(a.minat_pelayanan_gereja='Lain-lain',1, NULL)) as Lainlain FROM jemaats a
            LEFT JOIN gereja b ON a.gerejaid = b.id where a.gerejaid = $gereja and a.status = 'Hidup' AND 
            ( a.minat_pelayanan_gereja in ($parts))");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
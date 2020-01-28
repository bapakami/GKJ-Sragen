<?php 

class M_manajemenusia extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function pilihan()
	{
		$q = "SELECT
			usia, deskripsi
		FROM
			usiajemaat
		";
		$hasil=$this->db->query($q);
		return $hasil->result();
	}

	function getDataForGraph($gereja,$partsUsia,$partsStatus)
	{
		$hasil=$this->db->query("SELECT 
			COUNT(usia) AS jumlah,
			usia AS usia,
			status_perkawinan AS status 
		From 
			jemaats 
		WHERE 
			gerejaid = $gereja
			AND 
			status = 'Hidup'
			AND 
			((status_perkawinan in ($partsStatus)) AND (usia in ($partsUsia)))
				
		GROUP BY 
			usia
		");
		
		return $hasil->result();
	}

	function getPDF($partsUsia,$partsStatus,$gereja)
	{		
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,a.alamat_tinggal as alamat,a.jenis_kelamin as gender,a.usia as usia,b.namagereja as namagereja, a.status_perkawinan as status_perkawinan from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and ((a.status_perkawinan in ($partsStatus)) AND (a.usia in ($partsUsia)))");
		 
		 return $hasil->result();
	}

	function getStatistik($usiastart,$usiaend,$gereja, $berdasarStatus)
	{		
		 $hasil=$this->db->query("SELECT     
CASE
        WHEN umur < 12 THEN 'anak kurang dari 12 th'
        WHEN umur BETWEEN 13 and 17 THEN 'Remaja (13 - 17th)'
        WHEN umur BETWEEN 18 and 25 THEN 'Pemuda (18 - 25th)'
        WHEN umur BETWEEN 26 and 40 THEN 'Dewasa Muda / Keluarga Muda (26 - 40th)'
                WHEN umur BETWEEN 41 and 60 THEN 'Dewasa (41 - 60th)'
        WHEN umur > 60 THEN 'Adiyuswa'
        WHEN umur IS NULL THEN '(NULL)'
	    END as range_umur, COUNT(*) AS jumlah FROM (select TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur from jemaats WHERE tgl_lahir BETWEEN '".$usiastart."' AND '".$usiaend."' AND peran_gereja = 'Jemaat' AND gerejaid = '".$gereja."' AND status_perkawinan IN ('".$berdasarStatus."')) as dummy_table
GROUP BY range_umur
ORDER BY range_umur");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
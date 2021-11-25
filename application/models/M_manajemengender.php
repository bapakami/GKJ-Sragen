<?php 

class M_manajemengender extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($partsdarah,$partsgender,$gereja)
	{
		
		$hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,a.alamat_tinggal as alamat,a.jenis_kelamin as gender,a.gol_darah as gol_darah,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and ((a.jenis_kelamin in($partsgender)) AND (a.gol_darah in ($partsdarah)))");
		
		return $hasil->result();
	}

	function getDataForGraph($gereja,$partsGender,$partsDarah)
	{
		$hasil=$this->db->query("SELECT 
			COUNT(jenis_kelamin) AS jumlah,
			jenis_kelamin AS gender,
			gol_darah AS darah 
			From jemaats 
			WHERE gerejaid = $gereja
			AND status = 'Hidup'
			AND ((jenis_kelamin in($partsGender)) 
			AND (gol_darah in ($partsDarah)))
			GROUP BY 
			jenis_kelamin ASC
			");
		
		return $hasil->result();
	}

	function getStatistik($partsdarah,$partsgender,$gereja)
	{		
		$hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,
			COUNT(IF(a.jenis_kelamin='Laki-laki',1, NULL)) as Lakilaki,
			COUNT(IF(a.jenis_kelamin='Perempuan',1, NULL)) as Perempuan,
			COUNT(IF(a.gol_darah='A',1, NULL)) as darah_A, 
			COUNT(IF(a.gol_darah='B',1, NULL)) as darah_B,
			COUNT(IF(a.gol_darah='AB',1, NULL)) as darah_AB, 
			COUNT(IF(a.gol_darah='O',1, NULL)) as darah_O 
			from jemaats a 
			Left join gereja b ON a.gerejaid = b.id 
			WHERE a.gerejaid=$gereja 
			and a.status = 'Hidup' 
			and ((a.jenis_kelamin in($partsgender)) 
			AND (a.gol_darah in ($partsdarah)))");
		
		return $hasil->result();
	}

	function getNamaGereja($gereja)
	{
		
		$hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		return $hasil->result();
	}
}
?>

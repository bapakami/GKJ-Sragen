<?php  

class M_manajemenkeluarga extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function pilihan()
	{
		$q = "SELECT
			status_keluarga
		FROM
			keluarga
		";
		$hasil=$this->db->query($q);
		$res = [];
		foreach ($hasil->result() as $row)
		{
			array_push($res, $row->status_keluarga);
		}
		return $res;
	}

	function getPDF($gereja,$partsGender,$partsStatus)
	{

		$hasil=$this->db->query("SELECT 
			a.Nama_Lengkap as NamaLengkap,
			a.jenis_kelamin as gender,
			a.nama_ayah as nama_ayah,
			a.nama_ibu as nama_ibu, 
			a.status_keluarga as status_keluarga,
			b.namagereja as namagereja FROM jemaats a
            LEFT JOIN gereja b ON a.gerejaid = b.id where a.gerejaid = $gereja and a.status = 'Hidup' AND ((a.status_keluarga in($partsStatus) ) and (a.jenis_kelamin in ($partsGender)))");
		 
		 return $hasil->result();
	}
	function getStatistik($gereja,$partsGender,$partsStatus)
	{

		$hasil=$this->db->query("SELECT 
			COUNT(a.Nama_Lengkap) as JumlahJemaat,COUNT(IF(a.jenis_kelamin='Laki-laki',1, NULL)) as Lakilaki,COUNT(IF(a.jenis_kelamin='Perempuan',1, NULL)) as Perempuan,COUNT(IF(a.status_keluarga='Anak',1, NULL)) as Anak, COUNT(IF(a.status_keluarga='Cucu',1, NULL)) as Cucu,COUNT(IF(a.status_keluarga='Istri',1, NULL)) as Istri, COUNT(IF(a.status_keluarga='Kakek/Nenek',1, NULL)) as Kakek,COUNT(IF(a.status_keluarga='Kepala Keluarga',1, NULL)) as KepalaKeluarga,COUNT(IF(a.status_keluarga='Menantu',1, NULL)) as Menantu,COUNT(IF(a.status_keluarga='Numpang',1, NULL)) as Numpang,COUNT(IF(a.status_keluarga='Saudara',1, NULL)) as Saudara,COUNT(IF(a.status_keluarga='Lain-lain',1, NULL)) as Lainlain FROM jemaats a
            	LEFT JOIN gereja b ON a.gerejaid = b.id where a.gerejaid = $gereja and a.status = 'Hidup' AND ((a.status_keluarga in($partsStatus) ) and (a.jenis_kelamin in ($partsGender)))");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
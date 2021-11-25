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
			usia
		FROM
			usiajemaat
		";
		$hasil=$this->db->query($q);
		$res = [];
		foreach ($hasil->result() as $row)
		{
			array_push($res, $row->usia);
		}
		return $res;
	}

	function getDataForGraph($id,$partsUsia)
	{	$id = $this->session->userdata('gereja_id');
		$hasil=$this->db->query("SELECT 
			COUNT(usia) AS jumlah,
			usia AS usia 
		From 
			jemaats 
		WHERE 
				gerejaid = $id
			AND 
				status = 'Hidup'
			AND 
				usia in ($partsUsia)
		GROUP BY 
			usia
		");
		
		return $hasil->result();
	}

	function getPDF($parts,$id)
	{	 
		$this->output->enable_profiler(TRUE);$id = $this->session->userdata('gereja_id');
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,
		 a.alamat_tinggal as alamat,
		 a.jenis_kelamin as gender,
		 a.usia as usia,
		 b.namagereja as namagereja 
		 from jemaats a 
		 Left join gereja b ON a.gerejaid = b.id
		 WHERE a.gerejaid=$id 
		 and a.status = 'Hidup' 
		 AND (a.usia in ($parts))
		 ORDER BY a.usia ASC");
		 
		 return $hasil->result();
	}
	function getStatistik($parts,$id)
	{	$id = $this->session->userdata('gereja_id');	
		 $hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,
		 COUNT(IF(a.usia='<12 th',1, NULL)) as Anak,
		 COUNT(IF(a.usia='13-17 th',1, NULL)) as Remaja,
		 COUNT(IF(a.usia='18-25 th',1, NULL)) as Dewasa, 
		 COUNT(IF(a.usia='41-60 th',1, NULL)) as Tua,
		 COUNT(IF(a.usia='>60 th',1, NULL)) as Lansia 
		 from jemaats a 
		 Left join gereja b ON a.gerejaid = b.id 
		 WHERE a.gerejaid = $id 
		 and a.status = 'Hidup' 
		 and (a.usia in ($parts))");
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
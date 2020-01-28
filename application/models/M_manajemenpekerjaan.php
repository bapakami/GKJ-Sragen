<?php 

class M_manajemenpekerjaan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function pilihan()
	{
		$q = "SELECT
			nama_pp
		FROM
			pekerjaanpokok
		";
		$hasil=$this->db->query($q);
		$res = [];
		foreach ($hasil->result() as $row)
		{
			array_push($res, $row->nama_pp);
		}
		return $res;
	}

	function getDataForGraph($gereja,$partsNo)
	{
		$hasil=$this->db->query("SELECT 
			COUNT(pekerjaan) AS jumlah,
			pekerjaan AS pekerjaan 
		From 
			jemaats 
		WHERE
			pekerjaan in ($partsNo)
			AND
				gerejaid = $gereja
			AND
				status = 'Hidup'
		GROUP BY 
			pekerjaan
		");
		
		return $hasil->result();
	}

	function getPDF($gereja,$partsNo)
	{
		$hasil=$this->db->query("SELECT 
			a.Nama_Lengkap as NamaLengkap,
			a.penghasilan as penghasilan,
			a.pendidikan as pendidikan,
			a.pekerjaan as pekerjaan, 
			a.alamat_tinggal as alamat,
			b.namagereja as namagereja 
		FROM 
			jemaats a 
		LEFT JOIN 
			gereja b 
		ON 
			a.gerejaid = b.id 
		WHERE 
			a.gerejaid = $gereja 
			AND 
				a.status = 'Hidup' 
			AND 
				a.pekerjaan in ($partsNo)
		");
		
		return $hasil->result();
	}

	function getStatistik($gereja,$partsNo)
	{
		 $hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,COUNT(IF(a.pekerjaan='Belum bekerja',1, NULL)) as BelumBekerja,COUNT(IF(a.pekerjaan='Buruh',1, NULL)) as Buruh,COUNT(IF(a.pekerjaan='DPR',1, NULL)) as DPR, COUNT(IF(a.pekerjaan='Lain-lain',1, NULL)) as Lainlain,COUNT(IF(a.pekerjaan='Mengurus rumah tangga',1, NULL)) as MRT, COUNT(IF(a.pekerjaan='Nelayan',1, NULL)) as Nelayan,COUNT(IF(a.pekerjaan='Pedagang',1, NULL)) as Pedagang,COUNT(IF(a.pekerjaan='Pelajar/Mahasiswa',1, NULL)) as Pelajar,COUNT(IF(a.pekerjaan='Pensiunan',1, NULL)) as Pensiunan, COUNT(IF(a.pekerjaan='Perangkat desa',1, NULL)) as PerangkatDesa, COUNT(IF(a.pekerjaan='Petani',1, NULL)) as Petani, COUNT(IF(a.pekerjaan='PNS',1, NULL)) as PNS, COUNT(IF(a.pekerjaan='Swasta',1, NULL)) as Swasta, COUNT(IF(a.pekerjaan='Tidak bekerja',1, NULL)) as TidakBekerja, COUNT(IF(a.pekerjaan='TNI/Polri',1, NULL)) as TNI, COUNT(IF(a.pekerjaan='Wiraswasta',1, NULL)) as Wiraswasta from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid=$gereja and a.status = 'Hidup' and a.pekerjaan in ($partsNo)");
		 
		 return $hasil->result();
	}

	function getXLS($penghasilan,$gereja)
	{
		 $hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap, a.jenis_kelamin as gender,a.pendidikan as pendidikan,a.pekerjaan as pekerjaan, a.alamat_tinggal as alamat,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.penghasilan = '$penghasilan' AND a.gerejaid = $gereja and a.status = 'Hidup' ");
		 return $hasil->result();
	}

	function getNamaGereja($gereja)
	{
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
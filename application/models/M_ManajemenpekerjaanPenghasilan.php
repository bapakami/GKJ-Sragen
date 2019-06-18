<?php  

class M_ManajemenpekerjaanPenghasilan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($gereja,$pekerjaan_id,$penghasilan_id)
	{

		$hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,a.jenis_kelamin as gender,a.pendidikan as pendidikan, a.jml_anak as jml_anak, a.alamat_tinggal as alamat,b.namagereja as namagereja FROM jemaats a
            LEFT JOIN gereja b ON a.gerejaid = b.id WHERE a.gerejaid = $gereja and a.status = 'Hidup' AND a.pekerjaan = 'Belum bekerja' AND a.penghasilan = '< 500.000' ");
		 
		 return $hasil->result();
	}

	function getStatistik($gereja,$pekerjaan_id,$penghasilan_id)
	{
		$hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,COUNT(IF(a.pekerjaan='Belum bekerja',1, NULL)) as BelumBekerja,COUNT(IF(a.pekerjaan='Buruh',1, NULL)) as Buruh,COUNT(IF(a.pekerjaan='DPR',1, NULL)) as DPR, COUNT(IF(a.pekerjaan='Lain-lain',1, NULL)) as Lainlain,COUNT(IF(a.pekerjaan='Mengurus rumah tangga',1, NULL)) as MRT, COUNT(IF(a.pekerjaan='Nelayan',1, NULL)) as Nelayan,COUNT(IF(a.pekerjaan='Pedagang',1, NULL)) as Pedagang,COUNT(IF(a.pekerjaan='Pelajar/Mahasiswa',1, NULL)) as Pelajar,COUNT(IF(a.pekerjaan='Pensiunan',1, NULL)) as Pensiunan, COUNT(IF(a.pekerjaan='Perangkat desa',1, NULL)) as PerangkatDesa, COUNT(IF(a.pekerjaan='Petani',1, NULL)) as Petani, COUNT(IF(a.pekerjaan='PNS',1, NULL)) as PNS, COUNT(IF(a.pekerjaan='Swasta',1, NULL)) as Swasta, COUNT(IF(a.pekerjaan='Tidak bekerja',1, NULL)) as TidakBekerja, COUNT(IF(a.pekerjaan='TNI/Polri',1, NULL)) as TNI, COUNT(IF(a.pekerjaan='Wiraswasta',1, NULL)) as Wiraswasta FROM jemaats a
            LEFT JOIN gereja b ON a.gerejaid = b.id WHERE a.gerejaid = $gereja and a.status = 'Hidup' AND a.pekerjaan = '$pekerjaan_id' AND a.penghasilan = '$penghasilan_id' ");		 
		 return $hasil->result();
	}

	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}

	
} 
?>
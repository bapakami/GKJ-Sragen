<?php 

class M_manajemenstatusgerejawi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	function getPDF($id,$partsstatus,$partsstatuswarga)
	{$id = $this->session->userdata('gereja_id');
	$hasil=$this->db->query("SELECT a.Nama_Lengkap as NamaLengkap,
		a.alamat_tinggal as alamat,
		a.jenis_kelamin as gender,
		a.tgl_baptis as tgl_baptis,
		a.tgl_sidhi as tgl_sidhi,
		a.status_Warga as status_warga,
		b.namagereja as namagereja 
		FROM jemaats a
		LEFT JOIN gereja b 
		ON a.gerejaid = b.id 
		WHERE a.gerejaid = $id 
		AND a.status = 'Hidup' 
		AND a.tgl_baptis IS NOT NULL 
		AND a.tgl_sidhi IS NOT NULL
		AND (a.status_warga in($partsstatuswarga)) ");

	return $hasil->result();
}

function getDataForGraph($gereja,$partsstatus,$partsstatuswarga)
{
		// $id = $this->session->userdata('gereja_id');
	$where = "";

	$hasil = $this->db->query("SELECT 
		status_warga as kategori,
		COUNT(status_warga) as jumlah,
		COUNT(IF(tgl_baptis IS NOT NULL AND tgl_sidhi = NULL, 1, NULL)) as sdh_baptis_blm_sidhi,
		COUNT(IF(tgl_baptis = NULL AND tgl_sidhi IS NOT NULL, 1, NULL)) as sdh_sidhi_blm_baptis,
		COUNT(IF(tgl_baptis = NULL AND tgl_sidhi = NULL, 1, NULL)) as blm_sidhi_blm_baptis,
		COUNT(IF(tgl_baptis IS NOT NULL AND tgl_sidhi IS NOT NULL, 1, NULL)) as sudah_semua
		FROM jemaats 
		WHERE status_warga in ($partsstatuswarga)
		AND status = 'Hidup' 
		AND gerejaid = $gereja 
		GROUP BY status_warga ");

	return $hasil->result();
}

function getStatistik($partsstatus,$partsstatuswarga,$id)
{	$id = $this->session->userdata('gereja_id');
$hasil=$this->db->query("SELECT COUNT(a.Nama_Lengkap) as JumlahJemaat,
	COUNT(IF(a.status_warga='Warga',1, NULL)) as Warga,
	COUNT(IF(a.status_warga='Warga Belajar',1, NULL)) as Wargabelajar,
	COUNT(IF(a.status_warga='Tamu',1, NULL)) as Tamu,
	COUNT(IF(a.tgl_baptis= NOT null,1, NULL)) as tglbaptis, 
	COUNT(IF(a.tgl_sidhi= NOT NULL,1, NULL)) as tglsidhi
	from jemaats a 
	Left join gereja b ON a.gerejaid = b.id 
	WHERE a.gerejaid=$id 
	and a.status = 'Hidup' 
	and ((a.status_warga in($partsstatus)) 
	AND (a.tgl_baptis in ($partsstatuswarga))
	AND (a.tgl_sidhi in ($partsstatuswarga)))");

return $hasil->result();
}

function getNamaGereja($gereja)
{

	$hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
	return $hasil->result();
}
}
?>

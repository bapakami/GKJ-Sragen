<?php 

class M_manajemenstatusgerejawi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getDataForGraph($gereja,$partsWarga,$HanyaSidhi,$HanyaBaptis,$BelumBaptisSidhi,$BaptisdanSidhi)
	{
		$sql = "SELECT COUNT(status_warga) as jumlah,status_warga as kategori FROM jemaats 
		where gerejaid = $gereja and status = 'Hidup' AND (status_warga in($partsWarga)) ";

		if($HanyaSidhi != "" or $HanyaSidhi != null) 
			$sql .= "and tgl_sidhi IS NOT NULL ";
		
		if($HanyaBaptis != "" or $HanyaBaptis != null) 
			$sql .= "and tgl_baptis IS NOT NULL ";
		
		if($BaptisdanSidhi != "" or $BaptisdanSidhi != null) 
			$sql .= "and (tgl_baptis IS NOT NULL and tgl_sidhi IS NOT NULL) ";
		
		if($BelumBaptisSidhi != "" or $BelumBaptisSidhi != null) 
			$sql .= "and (tgl_baptis IS NULL and tgl_sidhi IS NULL) ";
		$hasil=$this->db->query($sql);
		
		return $hasil->result();
	}
	
	function getPDF($gereja,$partsWarga,$HanyaSidhi,$HanyaBaptis,$BelumBaptisSidhi,$BaptisdanSidhi)
	{
		$sql = "SELECT a.Nama_Lengkap as NamaLengkap,a.alamat_tinggal as alamat,a.jenis_kelamin as gender,a.tgl_baptis as tgl_baptis,a.tgl_sidhi as tgl_sidhi,a.status_Warga as status_warga,b.namagereja as namagereja FROM jemaats a
            LEFT JOIN gereja b ON a.gerejaid = b.id where a.gerejaid = $gereja and a.status = 'Hidup' AND (a.status_warga in($partsWarga)) ";

		if($HanyaSidhi != "" or $HanyaSidhi != null) 
			$sql .= "and a.tgl_sidhi IS NOT NULL ";
		
		if($HanyaBaptis != "" or $HanyaBaptis != null) 
			$sql .= "and a.tgl_baptis IS NOT NULL ";
		
		if($BaptisdanSidhi != "" or $BaptisdanSidhi != null) 
			$sql .= "and (a.tgl_baptis IS NOT NULL and a.tgl_sidhi IS NOT NULL) ";
		
		if($BelumBaptisSidhi != "" or $BelumBaptisSidhi != null) 
			$sql .= "and (a.tgl_baptis IS NULL and a.tgl_sidhi IS NULL) ";
		print_r($sql);
		 die();
		$hasil=$this->db->query($sql);
		 
		 return $hasil->result();
	}
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
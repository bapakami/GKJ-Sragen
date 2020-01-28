<?php 
/**
 * 
 */
class M_manajemenberita extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("news", $data);
	}

	function BeritaList(){
		$query = $this->db->query("SELECT a.id as id, a.judul as judul, a.user_id as user_id, a.tanggal_berita as tanggal_berita, a.status as status, a.isi_berita as isi_berita, a.image as image, a.gerejaid as gerejaid, a.gbcover as gbcover, a.gbpath as gbpath, a.gbthumb as gbthumb, a.gbthumbpath as gbthumbpath, b.fullname as fullname, c.namagereja as namagereja FROM news a 
			LEFT JOIN users b ON b.id = a.user_id 
			LEFT JOIN gereja c ON c.id = a.gerejaid 
			Order by a.id DESC");
		
		// $query = $this->db->query("Select * FROM news a INNER JOIN users b ON b.id = a.user_id INNER JOIN gereja c ON c.id = b.gereja_id ");
        return $query;
	}

	function updateData($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('news',$data);
	}

	function gereja(){
	    $this->db->order_by('namagereja','ASC');
	    $provinces= $this->db->get('gereja');
	    return $provinces->result_array();
    }
	function hapusData($data)
	{
		$hasil = $this->db->query("delete from news where id = $data");
		return $hasil;
	}



}
?>
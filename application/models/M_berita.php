<?php 

class M_berita extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("news", $data);
	}

	function DataList($id){
		$query = $this->db->query("SELECT a.id as idx,a.judul as judul,a.tanggal_berita as tanggal_berita,a.isi_berita as isi_berita,a.image as image,c.namagereja as namagereja,b.fullname as fullname FROM news a INNER JOIN USERS b ON a.user_id = b.id INNER JOIN gereja c on a.gerejaid = c.id Where status = 'publikasi' and a.id=$id order by tanggal_berita DESC");
        return $query;
	}

	function RecentBlog(){
		$query = $this->db->query("SELECT a.id as idx,a.judul as judul,a.tanggal_berita as tanggal_berita,a.isi_berita as isi_berita,a.image as image,c.namagereja as namagereja,b.fullname as fullname FROM news a INNER JOIN USERS b ON a.user_id = b.id INNER JOIN gereja c on a.gerejaid = c.id Where status = 'publikasi' order by tanggal_berita DESC LIMIT 3");
        return $query;
	}


	function get_data_list($limit, $start)
	{
		$this->db->select('a.id as idx,a.judul as judul,a.tanggal_berita as tanggal_berita,a.isi_berita as isi_berita,a.image as image,c.namagereja as namagereja,b.fullname as fullname');
	    $this->db->from('news a');
	    $this->db->join('USERS b','b.id=a.user_id','INNER');
	    $this->db->join('gereja c','c.id=a.gerejaid','INNER');
	    $this->db->where('a.status','publikasi');
	    $this->db->order_by('a.id','DESC');
	    $this->db->limit($limit, $start);
	    $query = $this->db->get();
	    return $query->result();
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from news where id = $data");
		return $hasil;
	}



}
?>
<?php 
/**
 * 
 */
class M_manajemengambar extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($gereja,$name,$gambar){
		$hasil=$this->db->query("INSERT INTO images(gallery_id,name,img_file) VALUES ('$gereja','$name','$gambar')");
        return $hasil;
	}

	function get_data_list($limit, $start){
		$this->db->select('a.id as id,a.name as nama,a.gallery_id as gallery_id,b.namagereja as namagereja,a.img_file as file');
	    $this->db->from('images a');
	    $this->db->join('gereja b','b.id=a.gallery_id','LEFT');
	    $this->db->order_by('a.id','DESC');
	    $this->db->limit($limit, $start);
	    $query = $this->db->get();
	    return $query->result();
	}

	function updateData($id,$gereja,$name,$gambar)
	{
		$hasil=$this->db->query("UPDATE images SET gallery_id='$gereja',name='$name',img_file='$gambar' WHERE id='$id'");
        return $hasil;
	}

	public function get_delete_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get('images')->row();   
    }

	function hapus_data($id){
        $hasil=$this->db->query("DELETE FROM images WHERE id='$id'");
        return $hasil;
    }



}
?>
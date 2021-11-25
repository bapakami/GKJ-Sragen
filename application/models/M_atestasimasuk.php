<?php 

class M_atestasimasuk extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data, $id){
		$this->db->where('id_user', $id)->update('jemaats', $data);
		return $this->db->delete('astestasi', array('id_jemaat' => $id));
	}

	function AkunList(){
		$id = $this->session->userdata('gereja_id');
		$query = $this->db->select('a.*,c.astestasi, d.foto, b.*')
		->join('jemaats b','b.id_user = a.id_jemaat')
		->join('tb_dokumen_warga c', 'b.id = c.id_warga')
		->join('users d', 'b.id_user = d.id')
		->where('a.id_gereja_baru', $id)
		->where('a.state','1')
		->get('astestasi a');
		return $query;
	}

	function updateData($gerejaid, $Pepantan_id, $id)
	{
		$hasil=$this->db->query("UPDATE jemaats SET gerejaid = '$gerejaid', Pepantan_id = '$Pepantan_id' WHERE edit_data='$id'");
		return $hasil;
	}
	function gereja(){
		$this->db->order_by('namagereja','ASC');
		$provinces= $this->db->get('gereja');
		return $provinces->result_array();
	}
	function hapusData($data)
	{
		$hasil = $this->db->query("delete from users where id = $data");
		return $hasil;
	}



}
?>

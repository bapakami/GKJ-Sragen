<?php 
/**
 * 
 */
class M_atestasikeluar extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data, $id){
		return $this->db->where('id_jemaat', $id)->where('state', '3')->update("astestasi", $data);
	}

	function AkunList(){
		$id = $this->session->userdata('gereja_id');
		$query = $this->db->select('a.*, c.akte_lahir, b.*')
				->join('jemaats b', 'b.id_user = a.id_jemaat')
				->join('tb_dokumen_warga c', 'b.id = c.id_warga')
				->where('a.id_gereja_lama', $id)
				->where('a.state', '3')
				->get('astestasi a');
        return $query;
	}

	function updateData($state)
	{
		// /*echo "<pre>";
        //   die(print_r($user_group, TRUE));*/
		$hasil=$this->db->query("UPDATE astestasi a SET a.state = '$state' WHERE id_jemaat='$id'");
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

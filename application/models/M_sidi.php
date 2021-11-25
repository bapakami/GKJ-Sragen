<?php 

class M_sidi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data, $id){
		$this->db->where('id_jemaat', $id)->update('data_sidi', $data);
		$this->db->query('UPDATE jemaats, data_sidi SET jemaats.tgl_sidhi = data_sidi.tgl_sidhi WHERE jemaats.id_user = data_sidi.id_jemaat');
		return $this->db->where('id_jemaat', $id);
		// return $this->db->delete('tb_baptisan', array('id_warga' => $id));
	}

	function AkunList(){
		$id = $this->session->userdata('gereja_id');
		$query = $this->db->select('a.*, d.foto, b.*')
				->join('jemaats b','b.id_user = a.id_jemaat')
				->join('tb_dokumen_warga c', 'b.id = c.id_warga')
				->join('users d', 'b.id_user = d.id')
				->where('a.id_gereja', $id)
				->where('a.state','3')
				->get('data_sidi a');
        return $query;
	}

	function updateData($gerejaid, $Pepantan_id, $id)
	{
		/*echo "<pre>";
		  die(print_r($user_group, TRUE));*/
		  $hasil=$this->db->query("UPDATE jemaats SET gerejaid = '$gerejaid', Pepantan_id = '$Pepantan_id' WHERE edit_data='$id'");
        return $hasil;
		// $hasil=$this->db->query("UPDATE users SET username='$username',fullname='$fullname',email='$email',group_id='$user_group',active='$status_aktif',modified=current_time,telpno='$telephone',gereja_id='$gereja' WHERE id='$id'");
        // return $hasil;
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

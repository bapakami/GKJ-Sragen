<?php 

class M_pindahiman extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data, $id){ 
		$this->db->where('id_jemaat', $id)->update('pindah_iman', $data);
		return $this->db->where('id_user', $id)->set('type', 0)->update('jemaats');
	}

	function AkunList(){
		$id = $this->session->userdata('gereja_id');
		$query = $this->db->select('a.*, d.foto, b.*')
				->join('jemaats b','b.id_user = a.id_jemaat')
				->join('tb_dokumen_warga c', 'b.id = c.id_warga')
				->join('users d', 'b.id_user = d.id')
				->where('a.id_gereja', $id)
				->where('a.state','3')
				->get('pindah_iman a');
		// $query = $this->db->query("SELECT a.*, b.nama_lengkap  FROM astestasi a
		// LEFT JOIN jemaats b on b.id = a.id_jemaat
		// LEFT JOIN users c on c.id = a.id_jemaat
		// WHERE a.id_gereja_lama = '$id'");
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

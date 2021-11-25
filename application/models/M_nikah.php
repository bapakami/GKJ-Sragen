<?php 

class M_nikah extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data, $id){
		$this->db->query('UPDATE jemaats, tb_pernikahan SET jemaats.nama_suami = tb_pernikahan.nama_suami WHERE jemaats.id_user = tb_pernikahan.id_warga');
		$this->db->query('UPDATE jemaats, tb_pernikahan SET jemaats.nama_istri = tb_pernikahan.nama_istri WHERE jemaats.id_user = tb_pernikahan.id_warga');
		$this->db->query('UPDATE jemaats, tb_pernikahan SET jemaats.tgl_nikah = tb_pernikahan.tgl_nikah WHERE jemaats.id_user = tb_pernikahan.id_warga');
		return $this->db->where('id_warga', $id)->update('tb_pernikahan', $data);
	}


	function AkunList(){
		$id = $this->session->userdata('gereja_id');
		$query = $this->db->select('a.*, d.foto, b.nama_suami suami, b.nama_istri istri')
				->join('jemaats b','b.id_user = a.id_warga')
				->join('tb_dokumen_warga c', 'b.id = c.id_warga')
				->join('users d', 'b.id_user = d.id')
				->where('a.id_gereja', $id)
				->where('a.state','3')
				->get('tb_pernikahan a');
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

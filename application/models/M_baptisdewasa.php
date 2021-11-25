<?php 

class M_baptisdewasa extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data, $id){
		$this->db->where('id_warga', $id)->update('tb_baptisan', $data);
		$this->db->query('UPDATE jemaats, tb_baptisan SET jemaats.tgl_baptis = tb_baptisan.tgl_daftar WHERE jemaats.id_user = tb_baptisan.id_warga');
		return $this->db->where('id_warga', $id);
		// return $this->db->delete('tb_baptisan', array('id_warga' => $id));
	}

	function AkunList(){
		$id = $this->session->userdata('gereja_id');
		$now = date('Y');
		$date = $now - 17;
		$cari = $date.'-'.date('m-d');
		$query = $this->db->select('a.*, d.foto, b.*')
				->join('jemaats b','b.id_user = a.id_warga')
				->join('tb_dokumen_warga c', 'b.id = c.id_warga')
				->join('users d', 'b.id_user = d.id')
				->where('a.id_gereja', $id)
				->where('b.tgl_lahir <=', $cari)
				->where('a.state','3')
				->get('tb_baptisan a');
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

<?php 
/**
 * 
 */
class M_manajemenakun extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("users", $data);
	}

	function AkunList(){
		$query = $this->db->query("SELECT a.id as id,a.username as username,a.fullname as fullname,a.email as email,b.namagereja as namagereja,a.telpno as telpno,a.gereja_id as gereja_id,a.group_id as group_id,a.active as active,a.gereja_id as gerejaid, c.groupname as groupname FROM users a 
			LEFT JOIN gereja b ON b.id = a.gereja_id 
			LEFT JOIN groups c ON c.id = a.group_id");
        return $query;
	}

	function updateData($id,$username,$fullname,$status_aktif,$user_group,$telephone,$email,$gereja)
	{
		/*echo "<pre>";
          die(print_r($user_group, TRUE));*/
		$hasil=$this->db->query("UPDATE users SET username='$username',fullname='$fullname',email='$email',group_id='$user_group',active='$status_aktif',modified=current_time,telpno='$telephone',gereja_id='$gereja' WHERE id='$id'");
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
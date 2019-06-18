<?php 

class M_login extends CI_Model{	
	// function cek_login($data){		
	// 	$query = $this->db->get_where('users',$data);
	// 	return $query->result(); // tak tambahi Result ok, coba liat sebelume kamu ctrl z aja, siap mas kalo mau redo Ctrlshift z, nanti tak coba e, yo wes aku tak turu yaw wkwkwkwkok mas, makasihhh
	// }	

	function cek_role(){

		return $this->db->get_where($table,$where);

	}

	function cek_login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('active',1);
		$result = $this->db->get('users',1);
		return $result;
	}

	function gereja(){
	    $this->db->order_by('namagereja','ASC');
	    $provinces= $this->db->get('gereja');
	    return $provinces->result_array();
    }
}

?>

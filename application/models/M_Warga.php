<?php

/**
 * 
 */
class M_Warga extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function register($data)
	{
		// $this->db->insert("tb_warga", $data);

	}
	function cek_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('tb_warga', 1);
		return $result;
	}
	function reset($username)
	{
		$query = $this->db->get_where('tb_warga', array('username'  => $username));
		return $query->row();
	}
	function insert($data)
	{
		$this->db->insert('tb_data_warga', $data);
	}
	function insertBaptisan($data)
	{
		$this->db->insert('tb_baptisan', $data);
	}
	function insertPernikahan($data)
	{
		$this->db->insert('tb_pernikahan', $data);
	}
	function insertDoc($data)
	{
		$this->db->insert('tb_dokumen_warga', $data);
	}
	function getAll($id)
	{
		$this->db->where('id_warga', $id);
		$res = $this->db->get('tb_data_warga');
		return $res;
	}
	function getAllDoc($id)
	{
		$this->db->where('id_warga', $id);
		$res = $this->db->get('tb_dokumen_warga');
		return $res;
	}
	public function detail($id)
	{
		$query = $this->db->get_where('tb_data_warga', array('id_warga'  => $id));
		return $query->row();
	}
	public function det($id)
	{
		$query = $this->db->get_where('tb_warga', array('id'  => $id));
		return $query->row();
	}
	public function detDoc($id)
	{
		$query = $this->db->get_where('tb_dokumen_warga', array('id_warga'  => $id));
		return $query->row();
	}
	public function edit($data)
	{
		$this->db->where('id_warga', $data['id_warga']);
		$this->db->update('tb_data_warga', $data);
	}
	public function cekNik($nik)
	{
		$query = $this->db->get_where('jemaats', array('no_ktp' => $nik))->num_rows();
		return $query;
	}
	public function simpanEmail($data)
	{
		$this->db->insert('mail_log', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function simpanUser($data)
	{
		$this->db->insert('users', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function simpanJemaat($data)
	{
		return $this->db->insert('jemaats', $data);
	}
	public function cekVerifikasi($token)
	{
		$cekToken = $this->db->get_where('mail_log', array('token' => $token));
		return $cekToken;
	}
	public function updateUser($idUSer)
	{
		return $this->db->set('active', 1)->where('id', $idUSer)->update('users');
	}
	function cekMail($mail)
	{
		return $this->db->get_where('users', array('email' => $mail))->num_rows();
	}
	function cekEmail($email)
	{
		return $this->db->get_where('users', array('email' => $email));
	}
	function resetPassword($data)
	{
		$cekToken = $this->db->get_where('mail_log', array('token' => $data['token']))->row();
		$idUSer = $cekToken->id_user;
		return $this->db->set('password', $data['password'])->where('id', $idUSer)->update('users');
	}
}

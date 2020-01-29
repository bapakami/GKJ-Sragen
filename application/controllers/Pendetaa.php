<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendetaa extends CI_Controller
{



	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('group_id') != '9') {
			redirect(base_url("login"));
		}
	}

	function index()
	{
		// $data = unpack('C*', "tes tes tes");
		// $key = unpack('C*', "fti uksw");
		// $this->data["encrypt"] = implode(" ", $this->encrypt($data, $key));
		// $this->data["decrypt"] = implode(" ", $this->decrypt($this->data["encrypt"], $key));

		$this->load->view('template/header');
		$this->load->view('template/menu_superadmin');
		$this->load->view('konten/dashboard');
		//$this->load->view('konten/dashboard', $this->data);
		$this->load->view('template/footer');
	}

	public function pastorr()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('paspen/v_pendeta');
		$this->load->view('template/footer');
	}
}

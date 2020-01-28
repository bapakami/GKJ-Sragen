<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{



	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('group_id') != '1') {
			redirect(base_url("login"));
		} else {
			$this->load->model('M_login');
			$this->load->model('M_laporan');
		}
	}

	function index()
	{
		$data['gereja'] = $this->M_login->gereja();
		$data['NamaGereja'] = $this->M_laporan->GetNamaGereja($this->session->userdata('gereja_id'));
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('userGereja/dashboard', $data);
		$this->load->view('template/footer');
	}

	public function admin_aja()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu_admin');
		$this->load->view('konten/v_login');
		$this->load->view('template/footer');
	}
}

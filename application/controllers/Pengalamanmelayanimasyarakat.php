<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengalamanmelayanimasyarakat extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_pengalamanmelayanimasyarakat");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_pengalamanmelayanimasyarakat->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/pengalamanmelayanimasyarakat', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"nama_pmm" => $this->input->post('nama_pmm'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_pengalamanmelayanimasyarakat->insertData($data);
		redirect('pengalamanmelayanimasyarakat');
	}

	public function editData()
	{
		$data = array (
			"nama_pmm" => $this->input->post('nama_pmm'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_pengalamanmelayanimasyarakat->editData($this->input->post('idedit'),$data);
		redirect('pengalamanmelayanimasyarakat');
	}

	public function hapusData()
	{
		$this->M_pengalamanmelayanimasyarakat->hapusData($this->input->post('idhapus'));
		redirect('pengalamanmelayanimasyarakat');
	}
}
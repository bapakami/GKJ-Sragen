<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaanpokok extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_pekerjaanpokok");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_pekerjaanpokok->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/pekerjaanpokok', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"nama_pp" => $this->input->post('nama_pp'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_pekerjaanpokok->insertData($data);
		redirect('pekerjaanpokok');
	}

	public function editData()
	{
		$data = array (
			"nama_pp" => $this->input->post('nama_pp'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_pekerjaanpokok->editData($this->input->post('idedit'),$data);
		redirect('pekerjaanpokok');
	}

	public function hapusData()
	{
		$this->M_pekerjaanpokok->hapusData($this->input->post('idhapus'));
		redirect('pekerjaanpokok');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaansampingan extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_pekerjaansampingan");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_pekerjaansampingan->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/pekerjaansampingan', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"nama_ps" => $this->input->post('nama_ps'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_pekerjaansampingan->insertData($data);
		redirect('pekerjaansampingan');
	}

	public function editData()
	{
		$data = array (
			"nama_ps" => $this->input->post('nama_ps'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_pekerjaansampingan->editData($this->input->post('idedit'),$data);
		redirect('pekerjaansampingan');
	}

	public function hapusData()
	{
		$this->M_pekerjaansampingan->hapusData($this->input->post('idhapus'));
		redirect('pekerjaansampingan');
	}
}
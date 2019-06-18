<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangereja extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_perangereja");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_perangereja->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/perangereja', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"nama_peran" => $this->input->post('nama_peran'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_perangereja->insertData($data);
		redirect('perangereja');
	}

	public function editData()
	{
		$data = array (
			"nama_peran" => $this->input->post('nama_peran'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_perangereja->editData($this->input->post('idedit'),$data);
		redirect('perangereja');
	}

	public function hapusData()
	{
		$this->M_perangereja->hapusData($this->input->post('idhapus'));
		redirect('perangereja');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minatpelayananumum extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_minatpelayananumum");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_minatpelayananumum->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/minatpelayananumum', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"nama_pu" => $this->input->post('nama_pu'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_minatpelayananumum->insertData($data);
		redirect('minatpelayananumum');
	}

	public function editData()
	{
		$data = array (
			"nama_pu" => $this->input->post('nama_pu'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_minatpelayananumum->editData($this->input->post('idedit'),$data);
		redirect('minatpelayananumum');
	}

	public function hapusData()
	{
		$this->M_minatpelayananumum->hapusData($this->input->post('idhapus'));
		redirect('minatpelayananumum');
	}
}
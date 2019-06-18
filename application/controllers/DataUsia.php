<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUsia extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_datausia");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_datausia->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/usiaJemaat', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"usia" => $this->input->post('usia'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_datausia->insertData($data);
		redirect('DataUsia');
	}

	public function editData()
	{
		$data = array (
			"usia" => $this->input->post('usia'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_datausia->editData($this->input->post('idedit'),$data);
		redirect('DataUsia');
	}

	public function hapusData()
	{
		$this->M_datausia->hapusData($this->input->post('idhapus'));
		redirect('DataUsia');
	}
}
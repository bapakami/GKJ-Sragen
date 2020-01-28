<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_status extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_status");
		//$this->load->model("M_datapersembahan");
		//$this->load->library('pagination');
	}

	public function index()
	{	
		$data['data'] = $this->M_status->get_data_list();  
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/master_status', $data);
		$this->load->view('template/footer');
	}

	public function insertData()
	{
		$data = array (
			"nama_status" => $this->input->post('status')
		
		);
		$this->M_status->insertData($data);
		redirect('Master_status');
	}

	public function editData()
	{
		//$idedit = $this->uri->segment(3);

		$data = array (
			"nama_status" => $this->input->post('status')
		
		);
		$this->M_status->editData($this->input->post('idedit'),$data);
		redirect('Master_status');
	}

	public function hapusData()
	{
		$this->M_status->hapusData($this->input->post('idhapus'));
		redirect('Master_status');
	}
}
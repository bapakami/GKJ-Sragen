<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minatpelayanangereja extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_minatpelayanangereja");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_minatpelayanangereja->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/minatpelayanangereja', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"nama_pg" => $this->input->post('nama_pg'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_minatpelayanangereja->insertData($data);
		redirect('minatpelayanangereja');
	}

	public function editData()
	{
		$data = array (
			"nama_pg" => $this->input->post('nama_pg'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_minatpelayanangereja->editData($this->input->post('idedit'),$data);
		redirect('minatpelayanangereja');
	}

	public function hapusData()
	{
		$this->M_minatpelayanangereja->hapusData($this->input->post('idhapus'));
		redirect('minatpelayanangereja');
	}
}
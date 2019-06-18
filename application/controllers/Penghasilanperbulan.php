<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghasilanperbulan extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_penghasilanperbulan");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_penghasilanperbulan->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/penghasilanperbulan', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"penghasilan_perbulan" => $this->input->post('penghasilan_perbulan'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_penghasilanperbulan->insertData($data);
		redirect('Penghasilanperbulan');
	}

	public function editData()
	{
		$data = array (
			"penghasilan_perbulan" => $this->input->post('penghasilan_perbulan'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_penghasilanperbulan->editData($this->input->post('idedit'),$data);
		redirect('Penghasilanperbulan');
	}

	public function hapusData()
	{
		$this->M_penghasilanperbulan->hapusData($this->input->post('idhapus'));
		redirect('Penghasilanperbulan');
	}
}
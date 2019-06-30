<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterStatusKeluarga extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_Master_Status_Keluarga");
		
	}

	public function index()
	{	
		$data['data'] = $this->M_Master_Status_Keluarga->get_data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/manajemenkeluarga', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"status_keluarga" => $this->input->post('nama_sk'),
			"Desc" => $this->input->post('deskripsi')
		
		);
		$this->M_Master_Status_Keluarga->insertData($data);
		redirect('manajemenkeluarga');
	}

	public function editData()
	{
		$data = array (
			"status_keluarga" => $this->input->post('nama_sk'),
			"Desc" => $this->input->post('deskripsi')
		
		);
		$this->M_Master_Status_Keluarga->editData($this->input->post('idedit'),$data);
		redirect('manajemenkeluarga');
	}

	public function hapusData()
	{
		$this->M_Master_Status_Keluarga->hapusData($this->input->post('idhapus'));
		redirect('manajemenkeluarga');
	}
}
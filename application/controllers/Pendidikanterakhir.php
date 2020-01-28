<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikanterakhir extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_pendidikanterakhir");
		//$this->load->model("M_datapersembahan");
		//$this->load->library('pagination');
	}

	public function index()
	{	
		$data['data'] = $this->M_pendidikanterakhir->get_data_list();  
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('masterdata/pendidikanterakhir', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"nama_strata" => $this->input->post('nama_strata'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_pendidikanterakhir->insertData($data);
		redirect('Pendidikanterakhir');
	}

	public function editData()
	{
		//$idedit = $this->uri->segment(3);

		$data = array (
			"nama_strata" => $this->input->post('nama_strata'),
			"deskripsi" => $this->input->post('deskripsi')
		
		);
		$this->M_pendidikanterakhir->editData($this->input->post('idedit'),$data);
		redirect('Pendidikanterakhir');
	}

	public function hapusData()
	{
		$this->M_pendidikanterakhir->hapusData($this->input->post('idhapus'));
		redirect('Pendidikanterakhir');
	}
}
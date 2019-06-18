<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemendatagereja extends CI_Controller {

	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }else {
          $this->load->model("M_manajemendatagereja");
        }		
		
	}

	public function index()
	{
		$data['data']=$this->M_manajemendatagereja->DataList();
        $data['gereja']=$this->M_manajemendatagereja->gereja();
		$this->load->view('template/header');
        $this->load->view('template/menu');
		$this->load->view('konten/manajemendatagereja', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"namagereja" => $this->input->post('namagereja'),
			"kode_gereja" => $this->input->post('kodegereja'),
			"alamat" => $this->input->post('alamat'),
			"pdt" => $this->input->post('pendeta'),
			"telp" => $this->input->post('telpno'),
			"email" => $this->input->post('email'),
			"web" => $this->input->post('web'),
			"sejarah" => $this->input->post('sejarah'),
			"jamkebaktian" => $this->input->post('jadwal'),
			"peta" => $this->input->post('url_gambar'),
			"linkpeta" => $this->input->post('url_peta')
		);
		
		$this->M_manajemendatagereja->insertData($data);
		redirect('manajemendatagereja');
	}

	public function editData()
	{
		$data = array (
			"namagereja" => $this->input->post('namagereja_edit'),
			"kode_gereja" => $this->input->post('kodegereja_edit'),
			"alamat" => $this->input->post('alamat_edit'),
			"pdt" => $this->input->post('pendeta_edit'),
			"telp" => $this->input->post('telpno_edit'),
			"email" => $this->input->post('email_edit'),
			"web" => $this->input->post('web_edit'),
			"sejarah" => $this->input->post('sejarah_edit'),
			"jamkebaktian" => $this->input->post('jadwal_edit'),
			"peta" => $this->input->post('url_gambar_edit'),
			"linkpeta" => $this->input->post('url_peta_edit')
		
		);
		$this->M_manajemendatagereja->editData($this->input->post('idedit'),$data);
		redirect('manajemendatagereja');
	}

	public function hapusData()
	{
		$this->M_manajemendatagereja->hapusData($this->input->post('kode'));
		redirect('manajemendatagereja');
	}
}
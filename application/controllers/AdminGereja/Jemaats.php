<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jemaats extends CI_Controller {

	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1'){
            redirect(base_url("login"));
        }else {
            $this->load->model('M_Jemaat_Gereja');
        }
	}

	public function index()
	{
		$data['data']=$this->M_Jemaat_Gereja->DataList($this->session->userdata('gerejaid'));
		$this->load->view('template/header');
        $this->load->view('template/menu');
		$this->load->view('userGereja/DataJemaat', $data);
		$this->load->view('template/footer');
	}

	public function insertData()
	{
		$gerejaid = $this->session->userdata('gereja_id');
		$data = array (
			"namapepantan" => $this->input->post('namapepantan'),
			"alamat" => $this->input->post('alamat'),
			"pdt" => $this->input->post('pendeta'),
			"telp" => $this->input->post('telpno'),
			"email" => $this->input->post('email'),
			"gereja_id" => $gerejaid
		);
		$this->M_Gereja_DataPepantans->insertData($data);
		redirect('AdminGereja/DataPepantans');
	}

	public function editData()
	{
		$data = array (
			"namapepantan" => $this->input->post('namapepantan_edit'),
			"alamat" => $this->input->post('alamat_edit'),
			"pdt" => $this->input->post('pendeta_edit'),
			"telp" => $this->input->post('telpno_edit'),
			"email" => $this->input->post('email_edit')
			
		);
		$this->M_Gereja_DataPepantans->editData($this->input->post('idedit'),$data);
		redirect('AdminGereja/DataPepantans');
	}

	public function hapusData()
	{
		$this->M_Gereja_DataPepantans->hapusData($this->input->post('kode'));
		redirect('AdminGereja/DataPepantans');
	}
}
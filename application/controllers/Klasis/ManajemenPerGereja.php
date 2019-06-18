<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenPerGereja extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }else {
            $this->load->model("M_KlasisJemaat");
        }		
	}

	public function index()
	{	
		$idGereja=$this->input->post('pilihgereja');
		$status=$this->input->post('statuskematian');
		$data['gereja']=$this->M_KlasisJemaat->gereja();
		$data['data']=$this->M_KlasisJemaat->DataList($idGereja,$status);
		$data['idgereja']=$idGereja;
		$data['pendidikan'] = $this->M_KlasisJemaat->Pendidikan();
		$data['pekerjaan'] = $this->M_KlasisJemaat->Pekerjaan();
		$data['penghasilan'] = $this->M_KlasisJemaat->Penghasilan();
		$data['pepantan']=$this->M_KlasisJemaat->pepantan($this->session->userdata('gereja_id'));
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('klasis/DataJemaat', $data);
		$this->load->view('template/footer');
	}

}
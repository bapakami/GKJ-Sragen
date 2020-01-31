<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenPerGereja extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('group_id') !='9'){
            redirect(base_url("login"));
        }else {
            $this->load->model("M_baptisanak");
        }		
	}

	public function index()
	{	
		$idGereja=$this->input->post('pilihgereja');
		$status=$this->input->post('statuskematian');
		$data['gereja']=$this->M_baptisanak->gereja();
		$data['data']=$this->M_baptisanak->DataList($idGereja,$status);
		$data['idgereja']=$idGereja;
		$data['pendidikan'] = $this->M_baptisanak->Pendidikan();
		$data['pekerjaan'] = $this->M_baptisanak->Pekerjaan();
		$data['penghasilan'] = $this->M_baptisanak->Penghasilan();
		$data['pepantan']=$this->M_baptisanak->pepantan($this->session->userdata('gereja_id'));
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('bptanak/v_bptanak', $data);
		$this->load->view('template/footer');
	}

}
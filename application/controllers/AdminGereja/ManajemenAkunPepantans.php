<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenAkunPepantans extends CI_Controller {

	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1'){
            redirect(base_url("login"));
        }else {
            $this->load->model('M_Gereja_AkunPepantans');
        }
	}

	public function index()
	{
		$data['data']=$this->M_Gereja_AkunPepantans->DataAkunList($this->session->userdata('gereja_id'));
		$data['NamaGereja'] = $this->M_Gereja_AkunPepantans->GetNamaGereja($this->session->userdata('gereja_id'));
        $data['pepantan']=$this->M_Gereja_AkunPepantans->pepantan($this->session->userdata('gereja_id'));
		$this->load->view('template/header');
        $this->load->view('template/menu');
		$this->load->view('userGereja/AkunPepantans', $data);
		$this->load->view('template/footer');
	}

	public function insertData()
    {
        $data = array (
            "username" => $this->input->post('username'),
            "fullname" => $this->input->post('fullname'),
            "password" => sha1($this->input->post('password')),
            "group_id" => $this->input->post('user_group'),
            "active" => $this->input->post('status'),
            "telpno" => $this->input->post('telephone'),
            "email" => $this->input->post('email'),
            "gereja_id" => $this->session->userdata('gereja_id'),
            "status" => $this->input->post('status'),
            "pepantans_id" => $this->input->post('pepantan')
        );
        $this->M_Gereja_AkunPepantans->insertData($data);
        redirect('AdminGereja/ManajemenAkunPepantans');
    }

   public function hapusData()
    {
        $this->M_Gereja_AkunPepantans->hapusData($this->input->post('kode'));
        redirect('AdminGereja/ManajemenAkunPepantans');
    }

    function editData(){
       $data = array (
            "username" => $this->input->post('username_edit'),
            "fullname" => $this->input->post('fullname_edit'),   
            "telpno" => $this->input->post('telephone_edit'),
            "email" => $this->input->post('email_edit'),
            "status" => $this->input->post('status_edit'),

        );
        $this->M_Gereja_AkunPepantans->updateData($this->input->post('idedit'),$data);
        redirect('AdminGereja/ManajemenAkunPepantans');
    }
}
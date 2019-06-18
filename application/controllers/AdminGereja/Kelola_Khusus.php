<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_Khusus extends CI_Controller {

	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1'){
            redirect(base_url("login"));
        }else {
            $this->load->model('M_Gereja_Persembahan');
        }
	}

	public function index()
	{
        $data['data']=$this->M_Gereja_Persembahan->DataList($this->session->userdata('gereja_id'),'Khusus');
		$data['NamaPepantan'] = $this->M_Gereja_Persembahan->GetNamaPepantan($this->session->userdata('gereja_id'));
		$this->load->view('template/header');
        $this->load->view('template/menu');
		$this->load->view('userGereja/Khusus', $data);
		$this->load->view('template/footer');
	}

	public function insertData()
    {
        $typeName = 'Khusus';
        $data = array (
            "Jumlah" => $this->input->post('jumlah'),
            "DateCreated" => $this->input->post('datecreated'),
            "Sumber_persembahan" => $this->input->post('asalpersembahan'),
            "Keterangan" => $this->input->post('keterangan'),
            "Type" => $typeName,
            "Gereja_id" => $this->session->userdata('gereja_id'),
            "Pepantan_id" => $this->input->post('pepantan')
        );
        $this->M_Gereja_Persembahan->insertData($data);
        redirect('AdminGereja/Kelola_Khusus');
    }

   public function hapusData()
    {
        $this->M_Gereja_Persembahan->hapusData($this->input->post('kode'));
        redirect('AdminGereja/Kelola_Khusus');
    }

    function editData(){
       $data = array (
            "Jumlah" => $this->input->post('jumlah_edit'),
            "DateCreated" => $this->input->post('datecreated_edit'),
            "Sumber_persembahan" => $this->input->post('asalpersembahan_edit'),
            "Keterangan" => $this->input->post('keterangan_edit'),
            "Pepantan_id" => $this->input->post('pepantan_edit')
        );
        $this->M_Gereja_Persembahan->updateData($this->input->post('idedit'),$data);
        redirect('AdminGereja/Kelola_Khusus');
    }
}
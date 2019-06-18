<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_Mingguan extends CI_Controller {

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
        $data['data']=$this->M_Gereja_Persembahan->DataList($this->session->userdata('gereja_id'),'Mingguan');
		$data['NamaPepantan'] = $this->M_Gereja_Persembahan->GetNamaPepantan($this->session->userdata('gereja_id'));
		$this->load->view('template/header');
        $this->load->view('template/menu');
		$this->load->view('userGereja/Mingguan', $data);
		$this->load->view('template/footer');
	}

	public function insertData()
    {
        $typeName = 'Mingguan';
        $data = array (
            "Jumlah" => $this->input->post('jumlah'),
            "DateCreated" => $this->input->post('datecreated'),
            "Minggu" => $this->input->post('minggu'),
            "Bulan" => $this->input->post('bulan'),
            "Tahun" => $this->input->post('tahun'),
            "Type" => $typeName,
            "Gereja_id" => $this->session->userdata('gereja_id'),
            "Pepantan_id" => $this->input->post('pepantan')
        );
        $this->M_Gereja_Persembahan->insertData($data);
        redirect('AdminGereja/Kelola_Mingguan');
    }

   public function hapusData()
    {
        $this->M_Gereja_Persembahan->hapusData($this->input->post('kode'));
        redirect('AdminGereja/Kelola_Mingguan');
    }

    function editData(){
       $data = array (
            "Jumlah" => $this->input->post('jumlah_edit'),
            "DateCreated" => $this->input->post('datecreated_edit'),
            "Minggu" => $this->input->post('minggu_edit'),
            "Bulan" => $this->input->post('bulan_edit'),
            "Tahun" => $this->input->post('tahun_edit'),
            "Pepantan_id" => $this->input->post('pepantan')
        );
        $this->M_Gereja_Persembahan->updateData($this->input->post('idedit'),$data);
        redirect('AdminGereja/Kelola_Mingguan');
    }
}
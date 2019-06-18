<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapersembahan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }else {
            $this->load->model("M_KlasisPersembahan");
        }
		
	}

	public function index()
	{	
		$idGereja = 0;
		$minggu = "";
		$data['data']=$this->M_KlasisPersembahan->DataList($idGereja,$type='null');
		$data['gereja']=$this->M_KlasisPersembahan->gereja();
		$data['idgereja']=$idGereja;
		$data['Mingguan'] = $minggu;
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('klasis/datapersembahan', $data);
		$this->load->view('template/footer');
	}

	public function getData()
	{
		$idGereja=$this->input->post('pilihgereja');
		$type=$this->input->post('persembahan');
		$data['gereja']=$this->M_KlasisPersembahan->gereja();
		$data['data']=$this->M_KlasisPersembahan->DataList($idGereja,$type);
		$data['idgereja']=$idGereja;
		$data['Mingguan'] = $type;
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('klasis/datapersembahan', $data);
		$this->load->view('template/footer');
	}

	function data_detail_iuran_search(){
  
        $data=$this->M_KlasisPersembahan->data_detail_list_search($id);
        echo json_encode($data);
    }
}
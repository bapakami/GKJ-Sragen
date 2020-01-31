<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databaptisanak extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('group_id') !='9'){
            redirect(base_url("login"));
        }else {
            $this->load->model("M_baptisanakdata");
        }
		
	}

	public function index()
	{	
		$idGereja = 0;
		$minggu = "";
		$data['data']=$this->M_baptisanakdata->DataList($idGereja,$type='null');
		$data['gereja']=$this->M_baptisanakdata->gereja();
		$data['idgereja']=$idGereja;
		$data['Mingguan'] = $minggu;
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('bptanak/databaptisanak', $data);
		$this->load->view('template/footer');
	}

	public function getData()
	{
		$idGereja=$this->input->post('pilihgereja');
		$type=$this->input->post('persembahan');
		$data['gereja']=$this->M_baptisanakdata->gereja();
		$data['data']=$this->M_baptisanakdata->DataList($idGereja,$type);
		$data['idgereja']=$idGereja;
		$data['Mingguan'] = $type;
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('bptanak/databaptisanak', $data);
		$this->load->view('template/footer');
	}

	function data_detail_iuran_search(){
  
        $data=$this->M_baptisanakdata->data_detail_list_search($id);
        echo json_encode($data);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gender extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemengender");		
	}

	public function index()
	{	
		$columnGender = $this->input->get('columnGender');
		$columnDarah = $this->input->get('columnDarah');
		$gereja = $this->input->get('gereja');
		if ( ! is_array($columnGender)) {
			$column = $this->M_manajemengender->pilihan();
		}
		$data['columnGender'] = $columnGender;
		$data['columnDarah'] = $columnDarah;
		$data['gereja'] = $gereja;

    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_gender', $data);   
		$this->load->view('template/footer');
	}

	public function data()
	{
		$columnGender = $this->input->get('columnGender');
		$columnDarah = $this->input->get('columnDarah');
		$gereja = $this->input->get('gereja');
		
		if ( ! is_array($columnGender)) {
			$column = $this->M_manajemengender->pilihan();
		}

		if ( ! is_numeric($gereja) ) {
			echo json_encode([]);
			return;
		}

		$dataGraph = array();
		$listGender = '"'.implode('","', $columnGender).'"';
		$listDarah = '"'.implode('","', $columnDarah).'"';
		$resultFromTableJemaats = $this->M_manajemengender->getDataForGraph($gereja,$listGender,$listDarah);
		foreach($resultFromTableJemaats as $row)
		{
        	array_push($dataGraph, array("y"=> $row->jumlah, "label"=> $row->gender));
		}

		$name = "";
		$resultName = $this->M_manajemengender->getNamaGereja($gereja);
		$resultDarah = implode(",", $columnDarah);
		if (count($resultName) > 0) {
			$name = $resultName[0]->namagereja;
		}

		$result = [
			"data" => $dataGraph,
			"name" => $name,
			"listDarah" => $resultDarah,
		];
		echo json_encode($result);
	}

}
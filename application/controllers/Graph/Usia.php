<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usia extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemenusia");		
	}

	public function index()
	{	
		$columnUsia = $this->input->get('columnUsia');
		$columnStatus = $this->input->get('columnStatus');
		$gereja = $this->input->get('gereja');
		if ( ! is_array($columnUsia)) {
			$column = $this->M_manajemenusia->pilihan();
		}
		$data['columnUsia'] = $columnUsia;
		$data['columnStatus'] = $columnStatus;
		$data['gereja'] = $gereja;

    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_usia', $data);   
		$this->load->view('template/footer');
	}

	public function data()
	{
		$columnUsia = $this->input->get('columnUsia');
		$columnStatus = $this->input->get('columnStatus');
		$gereja = $this->input->get('gereja');
		
		if ( ! is_array($columnUsia)) {
			$column = $this->M_manajemenusia->pilihan();
		}

		if ( ! is_numeric($gereja) ) {
			echo json_encode([]);
			return;
		}

		$dataGraph = array();
		$listUsia = '"'.implode('","', $columnUsia).'"';
		$listStatus = '"'.implode('","', $columnStatus).'"';
		$resultFromTableJemaats = $this->M_manajemenusia->getDataForGraph($gereja,$listUsia,$listStatus);
		foreach($resultFromTableJemaats as $row)
		{
        	array_push($dataGraph, array("y"=> $row->jumlah, "label"=> $row->usia));
		}

		$name = "";
		$resultName = $this->M_manajemenusia->getNamaGereja($gereja);
		$resultStatus = implode(",", $columnStatus);
		if (count($resultName) > 0) {
			$name = $resultName[0]->namagereja;
		}

		$result = [
			"data" => $dataGraph,
			"name" => $name,
			"listStatus" => $resultStatus,
		];
		echo json_encode($result);
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemenkeluarga");		
	}

	public function index()
	{	
		$columnKeluarga = $this->input->get('columnKeluarga');
		$columnGender = $this->input->get('columnGender');
		$gereja = $this->input->get('gereja');
		if ( ! is_array($columnKeluarga)) {
			$column = $this->M_manajemenkeluarga->pilihan();
		}
		$data['columnKeluarga'] = $columnKeluarga;
		$data['columnGender'] = $columnGender;
		$data['gereja'] = $gereja;

    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_Keluarga', $data);   
		$this->load->view('template/footer');
	}

	public function data()
	{
		$columnKeluarga = $this->input->get('columnKeluarga');
		$columnGender = $this->input->get('columnGender');
		$gereja = $this->input->get('gereja');
		
		if ( ! is_array($columnKeluarga)) {
			$column = $this->M_manajemenkeluarga->pilihan();
		}

		if ( ! is_numeric($gereja) ) {
			echo json_encode([]);
			return;
		}

		$dataGraph = array();
		$listKeluarga = '"'.implode('","', $columnKeluarga).'"';
		$listGender = '"'.implode('","', $columnGender).'"';
		$resultFromTableJemaats = $this->M_manajemenkeluarga->getDataForGraph($gereja,$listKeluarga,$listGender);
		foreach($resultFromTableJemaats as $row)
		{
        	array_push($dataGraph, array("y"=> $row->jumlah, "label"=> $row->keluarga));
		}

		$name = "";
		$resultName = $this->M_manajemenkeluarga->getNamaGereja($gereja);
		$resultGender = implode(",", $columnGender);
		if (count($resultName) > 0) {
			$name = $resultName[0]->namagereja;
		}

		$result = [
			"data" => $dataGraph,
			"name" => $name,
			"listGender" => $resultGender,
		];
		echo json_encode($result);
	}

}
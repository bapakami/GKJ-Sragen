<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemenpendidikan");		
	}

	public function index()
	{	
		$column = $this->input->get('column');
		$gereja = $this->input->get('gereja');
		if ( ! is_array($column)) {
			$column = $this->M_manajemenpendidikan->pilihan();
		}
		$data['column'] = $column;
		$data['gereja'] = $gereja;

    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_pendidikan', $data);   
		$this->load->view('template/footer');
	}

	public function data()
	{
		$column = $this->input->get('column');
		$gereja = $this->input->get('gereja');
		
		if ( ! is_array($column)) {
			$column = $this->M_manajemenpendidikan->pilihan();
		}

		if ( ! is_numeric($gereja) ) {
			echo json_encode([]);
			return;
		}

		$dataGraph = array();
		$nameofmaster = '"'.implode('","', $column).'"';
		$resultFromTableJemaats = $this->M_manajemenpendidikan->getDataForGraph($gereja,$nameofmaster);
		foreach($resultFromTableJemaats as $row)
		{
        	array_push($dataGraph, array("y"=> $row->jumlah, "label"=> $row->pendidikan));
		}

		$name = "";
		$resultName = $this->M_manajemenpendidikan->getNamaGereja($gereja);
		if (count($resultName) > 0) {
			$name = $resultName[0]->namagereja;
		}

		$result = [
			"data" => $dataGraph,
			"name" => $name,
		];
		echo json_encode($result);
	}

}
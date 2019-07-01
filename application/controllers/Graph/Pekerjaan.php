<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemenpekerjaan");		
	}

	public function index()
	{	
    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_pekerjaan');   
		$this->load->view('template/footer');
	}

	public function data($id = 0)
	{
		if ( ! is_numeric($id) ) {
			echo json_encode([]);
			return;
		}

		$dataGraph = array();
		$nameofmaster = '"'.implode('","', $this->M_manajemenpekerjaan->pilihan()).'"';
		$resultFromTableJemaats = $this->M_manajemenpekerjaan->getDataForGraph($id,$nameofmaster);
		foreach($resultFromTableJemaats as $row)
		{
        	array_push($dataGraph, array("y"=> $row->jumlah, "label"=> $row->pekerjaan));
		}

		$name = "";
		$resultName = $this->M_manajemenpekerjaan->getNamaGereja($id);
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
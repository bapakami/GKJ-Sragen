<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PekerjaanPenghasilan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemenpekerjaanPenghasilan");		
	}

	public function index()
	{			
		$columnPenghasilan = $this->input->get('columnPenghasilan');
		$columnPekerjaan = $this->input->get('columnPekerjaan');
		$gereja = $this->input->get('gereja');
		if ( $columnPenghasilan == null) {
			$column = $this->M_manajemenpekerjaanPenghasilan->pilihan();
		}
		$data['columnPenghasilan'] = $columnPenghasilan;
		$data['columnPekerjaan'] = $columnPekerjaan;
		$data['gereja'] = $gereja;

    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_PekerjaanPenghasilan', $data);   
		$this->load->view('template/footer');
	}

	public function data()
	{
		$columnPenghasilan = $this->input->get('columnPenghasilan');
		$columnPekerjaan = $this->input->get('columnPekerjaan');
		$gereja = $this->input->get('gereja');
		
		if ( $columnPenghasilan == null) {
			$column = $this->M_manajemenpekerjaanPenghasilan->pilihan();
		}

		if ( ! is_numeric($gereja) ) {
			echo json_encode([]);
			return;
		}

		$dataGraph = array();
		$resultFromTableJemaats = $this->M_manajemenpekerjaanPenghasilan->getDataForGraph($gereja,$columnPenghasilan,$columnPekerjaan);
		foreach($resultFromTableJemaats as $row)
		{
        	array_push($dataGraph, array("y"=> $row->jumlah, "label"=> $row->pekerjaan));
		}

		$name = "";
		$resultName = $this->M_manajemenpekerjaanPenghasilan->getNamaGereja($gereja);
		//$resultPenghasilan = implode(",", $columnPenghasilan);
		if (count($resultName) > 0) {
			$name = $resultName[0]->namagereja;
		}

		$result = [
			"data" => $dataGraph,
			"name" => $name,
			"listPenghasilan" => $columnPenghasilan,
		];
		echo json_encode($result);
	}

}
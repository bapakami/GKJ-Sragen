<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusGerejawi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemenstatusgerejawi");		
	}

	public function index()
	{	
		$columnStatus = $this->input->get('columnStatus');
		$HanyaSidhi = $this->input->get('HanyaSidhi');
		$HanyaBaptis = $this->input->get('HanyaBaptis');
		$BaptisdanSidhi = $this->input->get('BaptisdanSidhi');
		$BelumBaptisSidhi = $this->input->get('BelumBaptisSidhi');
		$gereja = $this->input->get('gereja');
		if ( $columnStatus == null) {
			$column = $this->M_manajemenstatusgerejawi->pilihan();
		}
		$data['HanyaSidhi'] = $HanyaSidhi;
		$data['HanyaBaptis'] = $HanyaBaptis;
		$data['BaptisdanSidhi'] = $BaptisdanSidhi;
		$data['BelumBaptisSidhi'] = $BelumBaptisSidhi;
		$data['columnStatus'] = $columnStatus;
		$data['gereja'] = $gereja;

    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_statusGerejawi', $data);   
		$this->load->view('template/footer');
	}

	public function data()
	{
		$HanyaSidhi = $this->input->get('HanyaSidhi');
		$HanyaBaptis = $this->input->get('HanyaBaptis');
		$BaptisdanSidhi = $this->input->get('BaptisdanSidhi');
		$BelumBaptisSidhi = $this->input->get('BelumBaptisSidhi');
		$columnStatus = $this->input->get('columnStatus');
		$gereja = $this->input->get('gereja');
		
		if ( $columnStatus == null) {
			$column = $this->M_manajemenstatusgerejawi->pilihan();
		}

		if ( ! is_numeric($gereja) ) {
			echo json_encode([]);
			return;
		}

		$dataGraph = array();
		$listStatus = '"'.implode('","', $columnStatus).'"';
		$resultFromTableJemaats = $this->M_manajemenstatusgerejawi->getDataForGraph($gereja,$listStatus,$HanyaSidhi,$HanyaBaptis,$BelumBaptisSidhi,$BaptisdanSidhi);
		foreach($resultFromTableJemaats as $row)
		{
        	array_push($dataGraph, array("y"=> $row->jumlah, "label"=> $row->kategori));
		}

		$name = "";
		$resultName = $this->M_manajemenstatusgerejawi->getNamaGereja($gereja);
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
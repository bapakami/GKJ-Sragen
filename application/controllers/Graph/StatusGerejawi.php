<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusGerejawi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemenstatusgerejawi");		
	}

	public function index()
	{	
		$columnstatus = $this->input->get('columnstatus');
		$columnstatuswarga =$this->input->get('columnstatuswarga');
		$gereja = $this->input->get('gereja');
		if ( $columnstatus == null) {
			$column = $this->M_manajemenstatusgerejawi->pilihan();
		}
		$data['sdh_sidhi'] = "";
		$data['sdh_baptis'] = "";
		$data['sdh_baptis_blm_sidhi'] = "";
		$data['sdh_sidhi_blm_baptis'] = "";
		$data['columnstatuswarga'] = $columnstatuswarga;
		$data['columnstatus'] = $columnstatus;
		$data['gereja'] = $gereja;

    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_statusGerejawi', $data);   
		$this->load->view('template/footer');
	}

	public function data()
	{
		$columnstatuswarga = $this->input->get('columnstatuswarga');
		$columnstatus = $this->input->get('columnstatus');
		$gereja = $this->input->get('gereja');

		if ( $columnstatus == null) {
			$column = $this->M_manajemenstatusgerejawi->pilihan();
		}

		if ( ! is_numeric($gereja) ) {
			echo json_encode([]);
			return;
		}

		$dataGraph = array();
		$listStatus = '"'.implode('","', $columnstatus).'"';
		$columnstatuswargaY = '"'.implode('","', $columnstatuswarga).'"';

		// gereja id gerejaid
		// liststatuswarga is for in functionn sql
		// echo "<pre>"; print_r($columnstatus);exit;
		$resultFromTableJemaats = $this->M_manajemenstatusgerejawi->getDataForGraph($gereja,$columnstatus,$columnstatuswargaY);
		foreach($resultFromTableJemaats as $row)
		{
			if(in_array('Belum Baptis dan Sidhi', $columnstatus)) {				
        	array_push($dataGraph, array("y"=> $row->blm_sidhi_blm_baptis, "label"=> $row->kategori." belum sidhi dan belum baptis"));
			}
			if(in_array('Hanya Sidhi', $columnstatus)) {
        	array_push($dataGraph, array("y"=> $row->sdh_sidhi_blm_baptis, "label"=> $row->kategori." sudah sidhi tapi belum baptis"));
			}
			if(in_array('Hanya Baptis', $columnstatus)) {
        	array_push($dataGraph, array("y"=> $row->sdh_baptis_blm_sidhi, "label"=> $row->kategori." sudah baptis tapi belum sidhi"));
			}
			if(in_array('Baptis dan Sidhi', $columnstatus)) {
        	array_push($dataGraph, array("y"=> $row->sudah_semua, "label"=> $row->kategori." sudah baptis dan sudah sidhi"));
			}
        	// array_push($dataGraph, array("y"=> $row->jumlah, "label"=> $row->kategori));
        	// array_push($dataGraph, array("y"=> $row->sdh_baptis_blm_sidhi, "label"=> "Sudah Baptis Tapi Belum Sidhi"));
        	// array_push($dataGraph, array("y"=> $row->sdh_sidhi_blm_baptis, "label"=> "Sudah Sidhi Tapi Belum Baptis"));
        	// array_push($dataGraph, array("y"=> $row->blm_sidhi_blm_baptis, "label"=> "Belum Sidhi dan Belum Baptis"));
		}

		// echo "<pre>"; print_r($resultFromTableJemaats);exit;
		$name = "";
		$resultName = $this->M_manajemenstatusgerejawi->getNamaGereja($gereja);
		$resultStatus = implode(",", $columnstatus);
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("M_manajemenpekerjaan");		
	}

	public function index()
	{	
		$dataGraph = array();
		$nameofmaster = '"'.implode('","', $this->M_manajemenpekerjaan->pilihan()).'"';
		$resultFromTableJemaats = $this->M_manajemenpekerjaan->getDataForGraph(7,$nameofmaster);
		foreach($resultFromTableJemaats as $row)
		{
        	array_push($dataGraph, array("x"=> $row->jumlah, "y"=> $row->pekerjaan));
    	}
    	$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('laporan/graph_pekerjaan');   
		$this->load->view('template/footer');
    	 	
	}

}
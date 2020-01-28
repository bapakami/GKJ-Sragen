<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapersembahan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("M_datapersembahan");
    }

    public function index()
    {
        $data['data']=$this->M_datapersembahan->PersembahanList();
        $data['gereja']=$this->M_datapersembahan->gereja();
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('konten/datapersembahan',$data);
        $this->load->view('template/footer');
    }

   public function hapusData()
    {
        $this->M_datapersembahan->hapusData($this->input->post('kode'));
        redirect('Datapersembahan');
    }

}
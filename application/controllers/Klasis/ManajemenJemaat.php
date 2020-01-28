<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenJemaat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }else {
            $this->load->model("M_KlasisJemaat");
        }		
	}

	public function index()
	{	
		$idGereja = 0;
		$status = '';
		$data['data']=$this->M_KlasisJemaat->DataList($idGereja,$status);
		$data['gereja']=$this->M_KlasisJemaat->gereja();
		$data['idgereja']=$idGereja;
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('klasis/DataJemaat', $data);
		$this->load->view('template/footer');
	}

	public function getData()
	{
		$idGereja=$this->input->post('pilihgereja');
		$data['gereja']=$this->M_KlasisJemaat->gereja();
		$data['data']=$this->M_KlasisJemaat->DataList($idGereja);
		$data['idgereja']=$idGereja;
		$data['pendidikan'] = $this->M_KlasisJemaat->Pendidikan();
		$data['pekerjaan'] = $this->M_KlasisJemaat->Pekerjaan();
		$data['penghasilan'] = $this->M_KlasisJemaat->Penghasilan();
		$data['pepantan']=$this->M_KlasisJemaat->pepantan($this->session->userdata('gereja_id'));
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('klasis/DataJemaat', $data);
		$this->load->view('template/footer');
	}

	function data_detail_iuran_search(){
  
        $data=$this->M_KlasisJemaat->data_detail_list_search($id);
        echo json_encode($data);
    }

	public function editData()
	{
		$data = array (
			"nama_lengkap" => $this->input->post('nama_lengkap'),
			"nama_panggilan" => $this->input->post('nama_panggilan'),
			"no_ktp" => $this->input->post('no_ktp'),
			"no_kk" => $this->input->post('no_kk'),
			"jenis_kelamin" => $this->input->post('jenis_kelamin'),
			"alamat_tinggal" => $this->input->post('alamat_tinggal'),
			"telepon" => $this->input->post('telepon'),
			"gerejaid" => $this->input->post('gerejaid'),
			"no_induk" => $this->input->post('no_induk')
		);
		$this->M_datajemaat->editData($this->input->post('idedit'),$data);
		redirect('datajemaat');
	}

	public function hapusData()
	{
		$this->M_datajemaat->hapusData($this->input->post('idhapus'));
		redirect('datajemaat');
	}

	public function detail($kode)
	{
	    $data['data']=$this->M_KlasisJemaat->DetailJemaat($kode);
	    $this->load->view('template/header');
	    $this->load->view('template/menu');
	    $this->load->view('userGereja/DetailJemaat',$data);
	    $this->load->view('template/footer');
	}

	public function report_Data($kode)
	{
			
			//$data['namagereja'] = $this->M_manajemenalamat->getNamaGereja($gereja);
			$data['isi'] = $this->M_KlasisJemaat->getPDF($kode);

	  		$html=$this->load->view('laporan/pdf_employee',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Data_Jemaat.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	    
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "I");
		
			 
		
		
	}
}
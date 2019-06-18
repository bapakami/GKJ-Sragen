<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Manajemenkeluarga extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1' && $this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }
		$this->load->model("M_manajemenkeluarga");
		$this->load->model("M_manajemenberita");
		$this->load->model("M_datapersembahan");
		$this->load->model("M_laporan");
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['NamaGereja'] = $this->M_laporan->GetNamaGereja($this->session->userdata('gereja_id'));  
		$data['gereja']=$this->M_datapersembahan->gereja();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('konten/laporankeluarga', $data);
		$this->load->view('template/footer');

	}

	public function report_Data()
	{

		$status = $this->input->post('status');
		$gender = $this->input->post('gender');
		$gereja = $this->input->post('gereja');
		$berdasarStatus = implode(",", $status);
		$berdasarGender = implode(",", $gender);
		$partsGender= '"'.implode('","', $gender).'"';
		$partsStatus = '"'.implode('","', $status).'"';
		


		if($this->input->post('hasil_id') == 'PDF'){
			
			$data['namagereja'] = $this->M_manajemenkeluarga->getNamaGereja($gereja);
			$data['isi'] = $this->M_manajemenkeluarga->getPDF($gereja,$partsGender,$partsStatus);
			$data['statistik'] = $this->M_manajemenkeluarga->getStatistik($gereja,$partsGender,$partsStatus);
			$data['berdasarGender'] = $berdasarGender;
			$data['berdasarStatus'] = $berdasarStatus;
	  		$html=$this->load->view('laporan/pdf_laporankeluarga',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Laporan_keluarga.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	     
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "I");
		}else if($this->input->post('hasil_id') == 'XLS'){

			$namagereja = $this->M_manajemenkeluarga->getNamaGereja($gereja);
			$isi= $this->M_manajemenkeluarga->getPDF($gereja,$partsGender,$partsStatus);

			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$heading=array('No','Nama Lengkap','Jenis kelamin','Nama Ayah','Nama Ibu','Status Keluarga','Asal Gereja'); //Field Header
			$styleArray = array(
			    'borders' => array(
			        'outline' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			            'color' => array('argb' => '000000'),
			        ),
			    ),
			);
			//Loop Heading
			$sheet->setCellValue('A1', 'Laporan Status keluarga');
			foreach($namagereja as $gereja){
			$sheet->setCellValue('A2', $gereja->namagereja);
			}
			$rowNumberH = 4;
			$colH = 'A';
			foreach($heading as $h){
				$sheet ->getStyle($colH.$rowNumberH)->applyFromArray($styleArray);
				$sheet->getStyle($colH.$rowNumberH)->getFont()->setBold(true);
			    $sheet->setCellValue($colH.$rowNumberH,$h);
			    $colH++;    
			}
			//Loop Result
			
			//$maxrow=$totn+1;
	
			       $row = 5;
			       $no = 1;
			foreach($isi as $n){
			    //$numnil = (float) str_replace(',','.',$n->nilai);
			    $sheet ->getStyle('A'.$row.':'.'G'.$row)->applyFromArray($styleArray);
			    $sheet->setCellValue('A'.$row,$no);
			    $sheet->setCellValue('B'.$row,$n->NamaLengkap);
			    $sheet->setCellValue('C'.$row,$n->gender);
			    $sheet->setCellValue('D'.$row,$n->nama_ayah);
			    $sheet->setCellValue('E'.$row,$n->nama_ibu);
			    $sheet->setCellValue('F'.$row,$n->status_keluarga);
			    
			    $sheet->setCellValue('G'.$row,$n->namagereja);
			    $row++;
			    $no++;
			}
			
			$writer = new Xlsx($spreadsheet);

			$filename = 'Laporan Status Keluarga ';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			
			$writer->save('php://output');
			exit;
			 
		}
		
	}










	

	public function insertData()
	{
		$data = array (
			"judul" => $this->input->post('judul'),
			"isi_berita" => $this->input->post('isiberita')
		);
		$this->M_manajemenberita->insertData($data);
		redirect('manajemenberita');
	}

	public function editData()
	{
		$data = array (
			"judul" => $this->input->post('juduledit'),
			"isi_berita" => $this->input->post('isiberitaedit')
		);
		$this->M_manajemenberita->editData($this->input->post('idedit'),$data);
		redirect('manajemenberita');
	}

	public function hapusData()
	{
		$this->M_manajemenberita->hapusData($this->input->post('idhapus'));
		redirect('manajemenberita');
	}




}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
class Manajemenusia extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1' && $this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }
		$this->load->model("M_manajemenberita");
		$this->load->model("M_manajemenusia");
		$this->load->model("M_datapersembahan");
		$this->load->model("M_laporan");
		$this->load->library('pagination');
	}

	public function index()
	{
 		$data['gereja']=$this->M_datapersembahan->gereja();
 		$data['NamaGereja'] = $this->M_laporan->GetNamaGereja($this->session->userdata('gereja_id'));
        //load view mahasiswa view
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('konten/laporanusia', $data);
		$this->load->view('template/footer');

	}

	public function report_Data()
	{	ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
		$usia = $this->input->post('usia');
		$gereja = $this->input->post('gereja');
		$berdasar = implode(",", $usia);
		$partsUsia = '"'.implode('","', $usia).'"';

		if($this->input->post('hasil_id') == 'PDF'){	

			$data['namagereja'] = $this->M_manajemenusia->getNamaGereja($gereja);
			$data['isi'] = $this->M_manajemenusia->getPDF($partsUsia,$gereja);
			$data['statistik'] = $this->M_manajemenusia->getStatistik($gereja,$partsUsia);
			$data['berdasar'] = $berdasar;
  			$html=$this->load->view('laporan/pdf_laporanusia',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Laporan_usia.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	    
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "I");
		}else if($this->input->post('hasil_id') == 'XLS'){
			$namagereja = $this->M_manajemenusia->getNamaGereja($gereja);
			$isi = $this->M_manajemenusia->getPDF($partsUsia,$gereja);
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$heading=array('No','Nama Lengkap','Jenis Kelamin','Usia','Alamat','Asal Gereja');
			$styleArray = array(
			    'borders' => array(
			        'outline' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			            'color' => array('argb' => '000000'),
			        ),
			    ),
			);
			//Loop Heading
			$sheet->setCellValue('A1', 'Laporan Usia Jemaat');
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
			    $sheet ->getStyle('A'.$row.':'.'F'.$row)->applyFromArray($styleArray);
			    $sheet->setCellValue('A'.$row,$no);
			    $sheet->setCellValue('B'.$row,$n->NamaLengkap);
			    $sheet->setCellValue('C'.$row,$n->gender);
			    $sheet->setCellValue('D'.$row,$n->usia);
			    $sheet->setCellValue('E'.$row,$n->alamat);
			    $sheet->setCellValue('F'.$row,$n->namagereja);
			    $row++;
			    $no++;
			}
			
			$writer = new Xlsx($spreadsheet);

			$filename = 'Laporan Usia ';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			
			$writer->save('php://output');
			exit;
			 
		}elseif ($this->input->post('hasil_id') == 'GRAPH') {
			$columnUsia = $this->input->post('usia');
			$gereja = $this->input->post('gereja');
			if ( ! is_array($columnUsia)) {
				redirect('Manajemenusia');
			}
			
			$arr = [
				'columnUsia' => $columnUsia,
				'gereja' => $gereja
			];
			redirect('Graph/Usia?' . http_build_query($arr));	
		}
		
	}

	public function dropdown()
	{
		$data = [
			"data" => [],
			"message" => "",
			"status" => 200 // Success
		];

		try {
			$data["data"] = $this->M_manajemenusia->pilihan();
		}
		catch (Exception $e) {
			$data["message"] = $e->getMessage();
			$data["status"] = 400; // Bad Request
		}
		echo json_encode($data);
	}

}
?>
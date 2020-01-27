<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
// End load library phpspreadsheet

class Manajemenpekerjaan extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1' && $this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }
		$this->load->model("M_manajemenpekerjaan");
		$this->load->model("M_datapersembahan");
		$this->load->model("M_laporan");
		$this->load->model("M_Jemaat_Gereja");
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['gereja']=$this->M_datapersembahan->gereja();
		$data['NamaGereja'] = $this->M_laporan->GetNamaGereja($this->session->userdata('gereja_id'));
		$data['pekerjaan'] = $this->M_Jemaat_Gereja->Pekerjaan(); 
        //load view mahasiswa view
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('konten/laporanpekerjaan', $data);
		$this->load->view('template/footer');

	}

	public function report_Data()
	{
		$belum_bekerja = $this->input->post('pekerjaan');
		$gereja = $this->input->post('gereja');
		$berdasar = implode(",", $belum_bekerja);
		$partsNo = '"'.implode('","', $belum_bekerja).'"';
		
		if($this->input->post('hasil_id') == 'PDF'){
			
			$data['namagereja'] = $this->M_manajemenpekerjaan->getNamaGereja($gereja);
			$data['isi'] = $this->M_manajemenpekerjaan->getPDF($gereja,$partsNo);
			$data['statistik'] = $this->M_manajemenpekerjaan->getStatistik($gereja,$partsNo);
			$data['berdasar'] = $berdasar;
	  		$html=$this->load->view('laporan/pdf_Laporanpekerjaan',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Laporan_Pekerjaan.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	    
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "I");
		}else if($this->input->post('hasil_id') == 'XLS'){
			$namagereja= $this->M_manajemenpekerjaan->getNamaGereja($gereja);
			$isi = $this->M_manajemenpekerjaan->getPDF($gereja,$partsNo);
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$heading=array('No','Nama Lengkap','Pendidikan','Pekerjaan','Penghasilan','Alamat Tinggal','Asal Gereja');
			$styleArray = array(
			    'borders' => array(
			        'outline' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			            'color' => array('argb' => '000000'),
			        ),
			    ),
			);
			//$sheet ->getStyle('B2:G8')->applyFromArray($styleArray);
			//$sheet->setCellValue('A1', 'Hello World !');
			//Loop Heading
			$sheet->setCellValue('A1', 'Laporan Pekerjaan Jemaat');
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
	
			       $row = 6;
			       $no = 1;
			foreach($isi as $n){
			    //$numnil = (float) str_replace(',','.',$n->nilai);
			    $sheet ->getStyle('A'.$row.':'.'G'.$row)->applyFromArray($styleArray);
			    $sheet->setCellValue('A'.$row,$no);
			    $sheet->setCellValue('B'.$row,$n->NamaLengkap);
			    $sheet->setCellValue('C'.$row,$n->pendidikan);
			    $sheet->setCellValue('D'.$row,$n->pekerjaan);
			    $sheet->setCellValue('E'.$row,$n->penghasilan);
			    $sheet->setCellValue('F'.$row,$n->alamat);
			    $sheet->setCellValue('G'.$row,$n->namagereja);
			    $row++;
			    $no++;
			}
			
			$writer = new Xlsx($spreadsheet);

			$filename = 'Laporan Pekerjaan';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			
			$writer->save('php://output');
			exit;
			 
		}else if($this->input->post('hasil_id') == 'GRAPH'){
			$column = $this->input->post('pekerjaan');
			$gereja = $this->input->post('gereja');
			if ( ! is_array($column)) {
				redirect('Manajemenpekerjaan');
			}
			
			$arr = [
				'column' => $column,
				'gereja' => $gereja
			];
			redirect('Graph/Pekerjaan?' . http_build_query($arr));		
		}
		redirect('Manajemenpekerjaan');
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


	public function dropdown()
	{
		$data = [
			"data" => [],
			"message" => "",
			"status" => 200 // Success
		];

		try {
			$data["data"] = $this->M_manajemenpekerjaan->pilihan();
		}
		catch (Exception $e) {
			$data["message"] = $e->getMessage();
			$data["status"] = 400; // Bad Request
		}
		echo json_encode($data);
	}
}
?>
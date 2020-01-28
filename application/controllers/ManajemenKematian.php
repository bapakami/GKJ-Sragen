<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
// End load library phpspreadsheet

class ManajemenKematian extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !=1 && $this->session->userdata('group_id') !=6){
            redirect(base_url("login"));
        }
		$this->load->model("M_laporan");
		$this->load->model("M_manajemenKematian");
		$this->load->library('upload');
	}

	public function index()
	{        
 		$data['gereja']=$this->M_laporan->gereja();
 		$data['NamaGereja'] = $this->M_laporan->GetNamaGereja($this->session->userdata('gereja_id'));
        //load view mahasiswa view
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('konten/laporanKematian', $data);
		$this->load->view('template/footer');
		

	}

	public function ReportData()
	{
		if($this->session->userdata('group_id') ==1){
            $gereja = $this->session->userdata('gereja_id');
        } else if($this->session->userdata('group_id') ==6) {
        	$gereja = $this->input->post('gereja');
        }
		
		if($this->input->post('hasil_id') == 'PDF'){
			
			$data['namagereja'] = $this->M_manajemenKematian->getNamaGereja($gereja);
			$data['isi'] = $this->M_manajemenKematian->getPDF($gereja);
			$data['statistik'] = $this->M_manajemenKematian->getStatistik($gereja);
	  		$html=$this->load->view('laporan/pdf_kematian',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Laporan_Kematian_Jemaat.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	    
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "I");
		}else if($this->input->post('hasil_id') == 'XLS'){
			$namagereja = $this->M_manajemenpenghasilan->getNamaGereja($gereja);
			$isi = $this->M_manajemenpenghasilan->getPDF($gereja);
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$heading=array('No','Nama Lengkap','Tanggal Kematian','Kota Kematian','Tempat Kematian','Asal Gereja');
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
			$sheet->setCellValue('A1', 'Laporan Daftar Kematian');
			foreach($namagereja as $gereja){
			$sheet->setCellValue('A2', $gereja->namagereja);
			}
			$rowNumberH = 5;
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
			    $sheet->setCellValue('C'.$row,$n->tanggal_kematian);
			    $sheet->setCellValue('D'.$row,$n->kota_kematian);
			    $sheet->setCellValue('E'.$row,$n->tempat_kematian);
			    $sheet->setCellValue('G'.$row,$n->namagereja);
			    $row++;
			    $no++;
			}
			
			$writer = new Xlsx($spreadsheet);

			$filename = 'Laporan Kematian ';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			
			$writer->save('php://output');
			exit;
			 
		}
		
	}

	// public function getData($penghasilan){
	// 	$data['isi'] = $this->M_manajemenpenghasilan->getPDF($penghasilan,$gereja);
 //        //$id_siswa=$this->input->get('id');
 //        //$data=$this->m_iuran->get_detail_by_kode($id_siswa,$id_iuran);
 //        echo json_encode($data);
 //    }

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
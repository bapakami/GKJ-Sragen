<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
// End load library phpspreadsheet
class Manajemenperkawinan extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1' && $this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }
		$this->load->model("M_manajemenperkawinan");
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
		$this->load->view('konten/laporanperkawinan', $data);
		$this->load->view('template/footer');
	}

	public function report_Data()
	{
		$perkawinan = $this->input->post('perkawinan');		
		$gereja = $this->input->post('gereja');
		$berdasar = implode(",", $perkawinan);
		$partsNo = '"'.implode('","', $perkawinan).'"';

		if($this->input->post('hasil_id') == 'PDF'){
			
			$data['namagereja'] = $this->M_manajemenperkawinan->getNamaGereja($gereja);
			$data['isi'] = $this->M_manajemenperkawinan->getPDF($gereja,$partsNo);
			$data['statistik'] = $this->M_manajemenperkawinan->getStatistik($gereja,$partsNo);
			$data['berdasar'] = $berdasar;
	  		$html=$this->load->view('laporan/pdf_laporanperkawinan',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Laporan_perkawinan.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	    
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "I");
		}else if($this->input->post('hasil_id') == 'XLS'){
			$namagereja = $this->M_manajemenperkawinan->getNamaGereja($gereja);
			$isi = $this->M_manajemenperkawinan->getPDF($gereja,$partsNo);
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$heading=array('No','Nama Lengkap','Status Nikah','Tata Cara Nikah','Tanggal Nikah','Jumlah Anak','Asal Gereja');
			$styleArray = array(
			    'borders' => array(
			        'outline' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			            'color' => array('argb' => '000000'),
			        ),
			    ),
			);
			//Loop Heading
			$sheet->setCellValue('A1', 'Laporan Status Perkawinan');
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
			    $sheet->setCellValue('C'.$row,$n->status_perkawinan);
			    $sheet->setCellValue('D'.$row,$n->tatacara_nikah);
			    $sheet->setCellValue('E'.$row,$n->tgl_nikah);
			    $sheet->setCellValue('F'.$row,$n->jumlah_anak);
			    $sheet->setCellValue('G'.$row,$n->namagereja);
			    $row++;
			    $no++;
			}
			
			$writer = new Xlsx($spreadsheet);

			$filename = 'Laporan Status Perkawinan ';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			
			$writer->save('php://output');
			exit;
			 
		}elseif ($this->input->post('hasil_id') == 'GRAPH') {
			$column = $this->input->post('perkawinan');
			$gereja = $this->input->post('gereja');
			if ( ! is_array($column)) {
				redirect('Manajemenperkawinan');
			}
			
			$arr = [
				'column' => $column,
				'gereja' => $gereja
			];
			redirect('Graph/Perkawinan?' . http_build_query($arr));	
		}
		
	}


}
?>
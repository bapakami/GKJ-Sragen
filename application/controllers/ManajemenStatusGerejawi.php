<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
class ManajemenStatusGerejawi extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1' && $this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }
		$this->load->model("M_manajemenstatusgerejawi");
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
		$this->load->view('konten/laporanstatusgerejawi', $data);
		$this->load->view('template/footer');

	}


	public function report_Data()
		{	
		ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
		$status = $this->input->post('status');
		$statuswarga = $this->input->post('statuswarga');
		$gereja = $this->input->post('gereja');
		$berdasarstatus = implode(",", $status);
		$berdasarstatuswarga = implode(",", $statuswarga);
		$partsstatus = '"'.implode('","', $status).'"';
		$partsstatuswarga = '"'.implode('","', $statuswarga).'"';
		$gereja = $this->input->post('gereja');		

		if($this->input->post('hasil_id') == 'PDF'){
			
			$data['namagereja'] = $this->M_manajemenstatusgerejawi->getNamaGereja($gereja);
			$data['isi'] = $this->M_manajemenstatusgerejawi->getPDF($gereja,$partsstatus,$partsstatuswarga);
			$data['berdasarstatus'] = $berdasarstatus;
			$data['berdasarstatuswarga'] = $berdasarstatuswarga;
	  		$html=$this->load->view('laporan/pdf_laporanstatusgerejawi',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Laporan_Gerejawi.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	     
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "I");
		}else if($this->input->post('hasil_id') == 'XLS'){
			$namagereja = $this->M_manajemenstatusgerejawi->getNamaGereja($gereja);
			$isi =  $this->M_manajemenstatusgerejawi->getPDF($gereja,$partsstatus,$partsstatuswarga);
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$heading=array('No','Nama Lengkap','Jenis kelamin','Alamat','Tanggal Baptis','Tanggal Sidhi','Status Warga','Asal Gereja'); //Field Header
			$styleArray = array(
			    'borders' => array(
			        'outline' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			            'color' => array('argb' => '000000'),
			        ),
			    ),
			);
			//Loop Heading
			$sheet->setCellValue('A1', 'Laporan Status Gerejawi');
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
			    $sheet ->getStyle('A'.$row.':'.'H'.$row)->applyFromArray($styleArray);
			    $sheet->setCellValue('A'.$row,$no);
			    $sheet->setCellValue('B'.$row,$n->NamaLengkap);
			    $sheet->setCellValue('C'.$row,$n->gender);
			    $sheet->setCellValue('D'.$row,$n->alamat);
			    $sheet->setCellValue('E'.$row,$n->tgl_baptis);
			    $sheet->setCellValue('F'.$row,$n->tgl_sidhi);
			    $sheet->setCellValue('G'.$row,$n->status_warga);
			    $sheet->setCellValue('H'.$row,$n->namagereja);
			    $row++;
			    $no++;
			}
			
			$writer = new Xlsx($spreadsheet);

			$filename = 'Laporan Status Gerejawi ';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			
			$writer->save('php://output');
			exit;
			 
		}elseif ($this->input->post('hasil_id') == 'GRAPH') {
			$columnstatus = $this->input->post('status');
			$columnstatuswarga = $this->input->post('statuswarga');
			$gereja = $this->input->post('gereja');
			if ( ! is_array($columnstatus)) {
				redirect('ManajemenStatusGerejawi');
			}

			$arr = [
				'columnstatus' => $columnstatus,
				'columnstatuswarga' => $columnstatuswarga,
				'gereja' => $gereja
			];
			redirect('Graph/StatusGerejawi?' . http_build_query($arr));		
		}
		
	}


}
?>

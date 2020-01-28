<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ManajemenpekerjaanPenghasilan extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1' && $this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }
		$this->load->model("M_manajemenberita");
		$this->load->model("M_ManajemenpekerjaanPenghasilan");
		$this->load->model("M_laporan");
		$this->load->model("M_datapersembahan");
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['gereja']=$this->M_datapersembahan->gereja();
		$data['NamaGereja'] = $this->M_laporan->GetNamaGereja($this->session->userdata('gereja_id'));  
        //load view mahasiswa view
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('konten/laporanpekerjaanPenghasilan', $data);
		$this->load->view('template/footer');
	}



public function report_Data()
	{

		$penghasilan_id = $this->input->post('Penghasilan_id');
		$pekerjaan_id = $this->input->post('Pekerjaan_id');
		
		$gereja = $this->input->post('gereja');


		if($this->input->post('hasil_id') == 'PDF'){
			
			$data['namagereja'] = $this->M_ManajemenpekerjaanPenghasilan->getNamaGereja($gereja);
			
			$data['isi'] = $this->M_ManajemenpekerjaanPenghasilan->getPDF($gereja,$pekerjaan_id,$penghasilan_id);
			$data['statistik'] = $this->M_ManajemenpekerjaanPenghasilan->getStatistik($gereja,$pekerjaan_id,$penghasilan_id);
			$data['berdasarPenghasilan'] = $penghasilan_id;
			$data['berdasarPekerjaan'] = $pekerjaan_id;
	  		$html=$this->load->view('laporan/pdf_laporanpenghasilanpekerjaan',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Laporan_penghasilanpekerjaan.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	     
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "I");
		}else if($this->input->post('hasil_id') == 'XLS'){
			$namagereja = $this->M_ManajemenpekerjaanPenghasilan->getNamaGereja($gereja);
			$isi =   $this->M_ManajemenpekerjaanPenghasilan->getPDF($gereja,$pekerjaan_id,$penghasilan_id);

			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$heading=array('No','Nama Lengkap','Jenis kelamin','Pendidikan Akhir','Jumlah Tanggungan','Alamat Tinggal','Asal Gereja'); //Field Header
			$styleArray = array(
			    'borders' => array(
			        'outline' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			            'color' => array('argb' => '000000'),
			        ),
			    ),
			);
			//Loop Heading
			$sheet->setCellValue('A1', 'Laporan Status Penghasilan dan Pekerjaan');
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
			    $sheet->setCellValue('D'.$row,$n->pendidikan);
			    $sheet->setCellValue('E'.$row,$n->jml_anak);
			    
			    $sheet->setCellValue('F'.$row,$n->alamat);
			    $sheet->setCellValue('G'.$row,$n->namagereja);
			    $row++;
			    $no++;
			}
			
			$writer = new Xlsx($spreadsheet);

			$filename = 'Laporan Status Penghasilan dan Pekerjaan';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			
			$writer->save('php://output');
			exit;
			 
		}elseif ($this->input->post('hasil_id') == 'GRAPH') {
			
			$columnPenghasilan = $this->input->post('Penghasilan_id');
			$columnPekerjaan = $this->input->post('Pekerjaan_id');
			$gereja = $this->input->post('gereja');
			if ( $columnPenghasilan == null) {
				redirect('ManajemenpekerjaanPenghasilan');
			}
			
			$arr = [
				'columnPenghasilan' => $columnPenghasilan,
				'columnPekerjaan' => $columnPekerjaan,
				'gereja' => $gereja
			];
			redirect('Graph/PekerjaanPenghasilan?' . http_build_query($arr));	
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
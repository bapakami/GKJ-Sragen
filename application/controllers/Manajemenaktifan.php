<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
class Manajemenaktifan extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		if($this->session->userdata('group_id') !='1' && $this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }
		$this->load->model("M_manajemenaktifan");
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
		$this->load->view('konten/laporanaktifan', $data);
		$this->load->view('template/footer');

	}

	public function report_Data()
	{
		$lama_jabatan_majelis = $this->input->post('lama_jabatan_majelis');
		$keikutsertaan_majelis = $this->input->post('keikutsertaan_majelis');
		$lama_jabatan_komisi = $this->input->post('lama_jabatan_komisi');
		$keikutsertaan_komisi = $this->input->post('keikutsertaan_komisi');
		$gereja = $this->input->post('gereja');

		$query="SELECT a.Nama_Lengkap as NamaLengkap, a.peran_gereja as peran_gereja,a.lama_jabatan_majelis as lama_jabatan_majelis,a.lama_pengurus_komisi as lama_pengurus_komisi, a.panitia_kegiatan as panitia_kegiatan,b.namagereja as namagereja from jemaats a Left join gereja b ON a.gerejaid = b.id WHERE a.gerejaid = $gereja";

		 if($keikutsertaan_majelis != '' && $keikutsertaan_komisi !='' ){
		 	$query .= " AND (a.panitia_kegiatan = '$keikutsertaan_majelis' OR a.panitia_kegiatan = '$keikutsertaan_komisi')";
		 }else if ($keikutsertaan_majelis == '' && $keikutsertaan_komisi !='' ){
		 	$query .= " AND a.panitia_kegiatan = '$keikutsertaan_komisi'";
		 } else if ($keikutsertaan_majelis != '' && $keikutsertaan_komisi =='' ){
		 	$query .= " AND a.panitia_kegiatan = '$keikutsertaan_majelis'";
		 }

		 if ($lama_jabatan_majelis != '' && $lama_jabatan_komisi != ''){
		 	$query .= " AND (a.lama_jabatan_majelis $lama_jabatan_majelis or a.lama_pengurus_komisi $lama_jabatan_komisi)";
		 }else if($lama_jabatan_majelis == '' && $lama_jabatan_komisi != ''){
		 	$query .= " AND a.lama_pengurus_komisi $lama_jabatan_komisi";
		 }else if($lama_jabatan_majelis != '' && $lama_jabatan_komisi == ''){
		 	$query .= " AND a.lama_jabatan_majelis $lama_jabatan_majelis";
		 }

		 // if ($lama_jabatan_komisi != ''){
		 // 	$query .= " AND a.lama_pengurus_komisi $lama_jabatan_komisi";
		 // }
		if($this->input->post('hasil_id') == 'PDF'){
			
			$data['namagereja'] = $this->M_manajemenaktifan->getNamaGereja($gereja);
			$data['isi'] = $this->M_manajemenaktifan->getPDF($query);

	  		$html=$this->load->view('laporan/pdf_laporanaktifan',$data , true);      
	        //this the the PDF filename that user will get to download
	  		$pdfFilePath = "Laporan_Keaktifan.pdf";
	        //load mPDF library
	  		$this->load->library('m_pdf');
	        //$this->m_pdf->pdf->AddPage('L');   
	       //generate the PDF from the given html
	  		$this->m_pdf->pdf->WriteHTML($html);
	    
	        //download it.
	  		$this->m_pdf->pdf->Output($pdfFilePath, "D");
		}else if($this->input->post('hasil_id') == 'XLS'){
			$namagereja = $this->M_manajemenaktifan->getNamaGereja($gereja);
			$isi = $this->M_manajemenaktifan->getPDF($query);
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$heading=array('No','Asal Gereja','Peran Gereja','Lama Jabatan Majelis','Lama Pengurus Komisi','Menjadi Panitia Kegiatan');
			$styleArray = array(
			    'borders' => array(
			        'outline' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			            'color' => array('argb' => '000000'),
			        ),
			    ),
			);
			//Loop Heading
			$sheet->setCellValue('A1', 'Laporan Keaktifan');
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
			    $sheet->setCellValue('C'.$row,$n->namagereja);
			    $sheet->setCellValue('D'.$row,$n->peran_gereja);
			    $sheet->setCellValue('E'.$row,$n->lama_jabatan_majelis);
			    $sheet->setCellValue('F'.$row,$n->lama_pengurus_komisi);
			    $sheet->setCellValue('G'.$row,$n->panitia_kegiatan);
			    $row++;
			    $no++;
			}
			
			$writer = new Xlsx($spreadsheet);

			$filename = 'Laporan Keaktifan ';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
			
			$writer->save('php://output');
			exit;
			 
		}
		
	}


}
?>
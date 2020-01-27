<?php 
/**
 * 
 */
class C_dokumen extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Warga');
	}
	function index(){

		//$this->fallogin();
		$id = $this->session->userdata('id');
		//print_r($id);return;
		$query = $this->M_Warga->getAllDoc($id);
		//print_r($query); return;
		if ($query->num_rows() != 1) {
			$data['isi'] = "warga/dokumen";
			$this->load->view('layout/wrapper',$data);
		}else{
			$data['isi'] = "warga/DocView";
			$data['data'] =  $this->M_Warga->detDoc($id);
			//print_r($data['data']);return;
			$this->load->view('layout/wrapper',$data);
		}
	}

	function action(){

		$config['upload_path'] = './assets/upload/image';
		$config['allowed_types'] = 'gif|png|jpg|jpeg|GIF|PNG|JPG|JPEG';
		$config['file_name']	= rand();
		// load library upload
		$this->load->library('upload', $config);
		$this->upload->do_upload('passfoto1');
		$file1 = $this->upload->data();
		$this->upload->do_upload('passfoto2');
		$file2 = $this->upload->data();
		$this->upload->do_upload('passfoto3');
		$file3 = $this->upload->data();
		$this->upload->do_upload('passfoto4');
		$file4 = $this->upload->data();
		$this->upload->do_upload('passfoto5');
		$file5 = $this->upload->data();
		$this->upload->do_upload('passfoto6');
		$file6 = $this->upload->data();
		$this->upload->do_upload('passfoto7');
		$file7 = $this->upload->data();
		$this->upload->do_upload('passfoto8');
		$file8 = $this->upload->data();
		$this->upload->do_upload('passfoto9');
		$file9 = $this->upload->data();



		$id = $this->session->userdata('id');
		$data = array(
			'id_warga'					=> $id,
			'ktp' 						=> $file1['file_name'],
			'kk'						=> $file2['file_name'],
			'surat_pengantar'			=> $file3['file_name'],
			'surat_baptis_anak'			=> $file4['file_name'],
			'surat_baptis_dewasa'		=> $file5['file_name'],
			'surat_sidhi'				=> $file6['file_name'],
			'surat_nikah'				=> $file7['file_name'],
			'surat_cerai'				=> $file8['file_name'],
			'surat_kematian'			=> $file9['file_name'],
			'tanggal_upload'			=> date("Y-m-d")
		); 
		$this->M_Warga->insertDoc($data);
		$this->session->set_flashdata('msg','Document telah ditambah');
		redirect(base_url('Warga/C_dokumen'));
		
	}
}

?>
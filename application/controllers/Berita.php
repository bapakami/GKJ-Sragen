 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_berita");
	}

	public function index()
	{
		$data['isi'] = $this->M_berita->data_list();
		$this->load->view('template/header');
		$this->load->view('template/menu_superadmin');
		$this->load->view('konten/berita', $data);
		$this->load->view('template/footer');
	}

	public function insertData()
	{
		$data = array (
			"judul" => $this->input->post('judul'),
			"isi_berita" => $this->input->post('isiberita')
		);
		$this->M_berita->insertData($data);
		redirect('berita');
	}

	public function editData()
	{
		$data = array (
			"judul" => $this->input->post('juduledit'),
			"isi_berita" => $this->input->post('isiberitaedit')
		);
		$this->M_berita->editData($this->input->post('idedit'),$data);
		redirect('berita');
	}

	public function hapusData()
	{
		$this->M_berita->hapusData($this->input->post('idhapus'));
		redirect('berita');
	}
}
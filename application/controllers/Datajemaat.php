<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datajemaat extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("M_datajemaat");
		$this->load->model("M_datapersembahan");
		$this->load->library('pagination');
	}

	public function index()
	{	
		 //konfigurasi pagination
        $config['base_url'] = site_url('Datajemaat/index'); //site url
        $config['total_rows'] = $this->db->count_all('news'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 5;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['isi'] = $this->M_datajemaat->get_data_list($config["per_page"], $data['page']);           
 		$data['gereja']=$this->M_datapersembahan->gereja();
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('template/header');
		$this->load->view('template/menu_superadmin');
		$this->load->view('konten/datajemaat', $data);
		$this->load->view('template/footer');

	}

	public function insertData()
	{
		$data = array (
			"nama_lengkap" => $this->input->post('nama_lengkap'),
			"nama_panggilan" => $this->input->post('nama_panggilan'),
			"no_ktp" => $this->input->post('no_ktp'),
			"no_kk" => $this->input->post('no_kk'),
			"jenis_kelamin" => $this->input->post('jenis_kelamin'),
			"alamat_tinggal" => $this->input->post('alamat_tinggal'),
			"telepon" => $this->input->post('telepon'),
			"gerejaid" => $this->input->post('gerejaid'),
			"no_induk" => $this->input->post('no_induk')
		);
		$this->M_datajemaat->insertData($data);
		redirect('datajemaat');
	}

	public function editData()
	{
		$data = array (
			"nama_lengkap" => $this->input->post('nama_lengkap'),
			"nama_panggilan" => $this->input->post('nama_panggilan'),
			"no_ktp" => $this->input->post('no_ktp'),
			"no_kk" => $this->input->post('no_kk'),
			"jenis_kelamin" => $this->input->post('jenis_kelamin'),
			"alamat_tinggal" => $this->input->post('alamat_tinggal'),
			"telepon" => $this->input->post('telepon'),
			"gerejaid" => $this->input->post('gerejaid'),
			"no_induk" => $this->input->post('no_induk')
		);
		$this->M_datajemaat->editData($this->input->post('idedit'),$data);
		redirect('datajemaat');
	}

	public function hapusData()
	{
		$this->M_datajemaat->hapusData($this->input->post('idhapus'));
		redirect('datajemaat');
	}

	 public function detail($kode)
    {
        $data['data']=$this->M_Jemaat_Gereja->DetailJemaat($kode);
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('userGereja/DetailJemaat',$data);
        $this->load->view('template/footer');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_user'); // ini cuman M user
		$this->load->model('M_berita');
		$this->load->model("M_manajemenakun");
	}

	// public function index()
	// {
	// 	$data['isi'] = $this->M_user->berita_list();
	// 	//echo "".$data;
	// 	//return ;
	// 	$this->load->view('template/header');
	// 	$this->load->view('template/menu_superadmin');
	// 	$this->load->view('konten/dashboard', $data);
	// 	$this->load->view('template/footer');
	// }


	public function index()
	{
		$data['data']=$this->M_manajemenakun->AkunList();
		
		$this->load->view('welcome_message',$data);
		// $this->load->view('template/menu_user');
		// $this->load->view('content_user/home', $data);
		// $this->load->view('template/footer_user');
	}


	public function viewBerita($id)
	{
		$data['isi'] = $this->M_user->view_by_id($id);
	
		$this->load->view('template/header_user');
		$this->load->view('template/menu_user');
		$this->load->view('content_user/isi_berita_by_id', $data);
		$this->load->view('template/footer_user');
	}

	public function berita()
	{
		$data['isi'] = $this->M_berita->data_list(); // Lihat ini M berita
	
		$this->load->view('template/header_user');
		$this->load->view('template/menu_user');
		$this->load->view('konten/berita', $data);
		$this->load->view('template/footer_user');
	}

	public function info()
	{
		$data['isi'] = $this->M_info->data_list(); // Lihat ini M info
	
		$this->load->view('template/header_user');
		$this->load->view('template/menu_user');
		$this->load->view('konten/info', $data);
		$this->load->view('template/footer_user');
	}

	public function kontak()
	{
		$data['isi'] = $this->M_kontak-->data_list(); // Lihat ini M kontak
		
		$this->load->view('template/header_user');
		$this->load->view('template/menu_user');
		$this->load->view('konten/kontak', $data);
		$this->load->view('template/footer_user');
	}


	// public function kontak()	
	// {
	// 	$data['isi'] = $this->M_kontak->data_list();
	// 	//echo "".$data;
	// 	//return ;
	// 	$this->load->view('template/header');
	// 	$this->load->view('template/menu_user');
	// 	$this->load->view('konten/kontak', $data);
	// 	$this->load->view('template/footer');
	// }

	// public function info()	
	// {
	// 	$data['isi'] = $this->M_info->data_list();
	// 	//echo "".$data;
	// 	//return ;
	// 	$this->load->view('template/header');
	// 	$this->load->view('template/menu_user');
	// 	$this->load->view('konten/kontak', $data);
	// 	$this->load->view('template/footer');
	// }

}

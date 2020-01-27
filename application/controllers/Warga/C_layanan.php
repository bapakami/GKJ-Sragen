<?php
/**
 * 
 */
class C_layanan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Warga');		
	}

	function baptisan(){
		$data['isi'] = 'warga/baptisan';
		$this->load->view('layout/wrapper',$data);
	}
	function pernikahan(){
		$data['isi'] = 'warga/pernikahan';
		$this->load->view('layout/wrapper',$data);
	}
	function action_baptisan(){
		$id = $this->session->userdata('id');
		$x = $this->input;
		$data = array(
			'id_warga'				=> $id,
			'nama_lengkap'			=> $x->post('namalengkap'),
			'jenis_kelamin'			=> $x->post('jeniskelamin'),
			'tempat_lahir'			=> $x->post('tempatlahir'),
			'tanggal_lahir'			=> $x->post('tanggallahir'),
			'nama_ayah'				=> $x->post('namaayah'),
			'nama_ibu'				=> $x->post('namaibu'),
			'saksi1'				=> $x->post('saksi1'),
			'saksi2'				=> $x->post('saksi2'),
			'tgl_daftar'			=> date("Y-m-d")
		);
		$this->M_Warga->insertBaptisan($data);
		echo $this->session->set_flashdata('msg','Pendaftaran Baptisan Berhasil');
		redirect(base_url('warga/C_layanan/baptisan'));
	}

	function action_nikah(){
		$id = $this->session->userdata('id');
		$x = $this->input;
		$data = array(
			'id_warga'			=> $id,
			'nama_suami'		=> $x->post('namasuami'),
			'tgl_lahir_suami'	=> $x->post('ttl1'),
			'nama_istri'		=> $x->post('namaistri'),
			'tgl_lahir_istri'	=> $x->post('ttl2'),
			'saksi_pernikahan'	=> $x->post('saksi'),
			'tgl_pendaftaran'	=> date("Y-m-d")
		);
		$this->M_Warga->insertPernikahan($data);
		echo $this->session->set_flashdata('msg','Pendaftaran Pernikahan Berhasil');
		redirect(base_url('warga/C_layanan/pernikahan'));
	}
}
?>
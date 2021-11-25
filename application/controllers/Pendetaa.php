<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendetaa extends CI_Controller
{



	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('group_id') !='9'){
			redirect(base_url("login"));
		}
		$this->load->library('lib');
		$this->load->model('M_pendeta');
	}

	function index()
	{
		// $data = unpack('C*', "tes tes tes");
		// $key = unpack('C*', "fti uksw");
		// $this->data["encrypt"] = implode(" ", $this->encrypt($data, $key));
		// $this->data["decrypt"] = implode(" ", $this->decrypt($this->data["encrypt"], $key));

		$this->load->view('template/header');
		$this->load->view('template/menu_superadmin');
		$this->load->view('konten/dashboard');
		//$this->load->view('konten/dashboard', $this->data);
		$this->load->view('template/footer');
	}

	public function pendeta()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('paspen/v_pendeta');
		$this->load->view('template/footer');
	}

	function dokumen()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('paspen/chat');
		$this->load->view('template/footer');
	}

	public function listData() {
        $list = $this->M_pendeta->get_datatables();
        $data = array();
        $no = $_POST['start'];
        // echo $this->db->last_query();exit;
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field['nama_lengkap'];
            $row[] = $this->lib->cekDataJemaat($field['id'], 'ktp');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'kk');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'surat_pengantar');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'surat_baptis_anak');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'surat_baptis_dewasa');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'surat_sidhi');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'surat_nikah');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'foto_berpasang');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'surat_kematian');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'surat_cerai');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'akte_lahir');
            $row[] = $this->lib->cekDataJemaat($field['id'], 'astestasi');
            

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_pendeta->count_all(),
            "recordsFiltered" => $this->M_pendeta->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

	function chat()
	{
		$cekDaftarJemaat = $this->db->group_by('id_sender')->group_by('jenis_layanan')->limit(10)->get('chat')->result_array();
		
		$chat = '';
		foreach($cekDaftarJemaat as $daftarnya => $c) {
			$chat .= '<div class="direct-chat-msg">';
			$chat .= '<div class="direct-chat-infos clearfix">';
			$chat .= '<span class="direct-chat-name pull-left">'. $this->lib->nama_lengkap2($c['id_sender']) .'</span>';
			$chat .= '</div>';
			$foto = $this->lib->getImage($c['id_sender']);
			$chat .= '<img class="direct-chat-img mulai" src="'. base_url($foto) .'" alt="message user image">';
			$chat .= '<div class="direct-chat-text">';
			$chat .=  '<span class="direct-chat-timestamp pull-right mulai" style="color: white; padding-left: 3px;">'. $c['send_at'] .'</span><i class="fa fa-comment" style="color: '. $this->lib->color($c['jenis_layanan']) .';"></i>&nbsp;&nbsp;&nbsp;'.$this->potong($c['pesan']);
			$chat .= '</div>';
			$chat .= '</div>';
		}

		echo $chat;

	}

	function potong($string)
	{
		$kata = '';
		if(strlen($string) > 50) {
			$kata = substr($string, 0, 50).' . . .';
		} else {
			$kata = $string;
		}
		return $kata;
	}

	function cekChat($id = 0, $jenis = 0) 
	{
		$cekCahttingan = $this->db->get_where('chat', array('jenis_layanan' => $jenis, 'id_sender' => $id))->num_rows();
		$jumlah = '';
		if($cekCahttingan > 0) {
			$jumlah = $cekCahttingan;
		}

		echo $jumlah;
	}

	function chattingan($jenis, $id)
	{
		$data['id'] = $id;
		$data['jenis'] = $jenis;
		$this->load->view('paspen/chatting', $data);
	}

	function daftarChat($id, $jenis)
	{
		$getChat = $this->db->where('id_sender', $id)->where('jenis_layanan', $jenis)->get('chat')->result_array();
		// echo $this->db->last_query();exit;
		$chat = '';
		$sebelum = '';
		foreach($getChat as $chatnya => $c) {
			($c['id_receiver'] == '9') ? $senderx = 'right' : $senderx = '';
			$chat .= '<div class="direct-chat-msg '. $senderx .'">';
			$chat .= '<div class="direct-chat-infos clearfix">';
			// $chat1 = '<span class="direct-chat-name pull-left">'. $this->lib->nama_lengkap2($this->session->userdata('id')) .'</span>';
			// if($sebelum == '' && $sebelum != '9') { echo $chat1; }
			$chat .= '</div>';
			$foto = $this->lib->getImage($this->session->userdata('id'));
			$chat .= '<img class="direct-chat-img" src="'. base_url($foto) .'" alt="message user image">';
			$chat .= '<div class="direct-chat-text">';
			$chat .=  '<span class="direct-chat-timestamp pull-right" style="color: white; padding-left: 3px;">'. $c['send_at'] .'</span>'.$c['pesan'];
			$chat .= '</div>';
			$chat .= '</div>';
			$sebelum = $c['id_receiver'];
		}

		echo $chat;
	}

	function sendChat($id, $jenis)
	{
		$post = $this->input->post();
		$data = [
			'id_sender'     => $id,
			'id_receiver'	=> '9',
			'jenis_layanan' => $jenis,
			'pesan'         => $post['chat'],
		];
		$insert = $this->db->insert('chat', $data);

		if($insert) {
			$json = ['s' => 'sukses'];
		} else {
			$json = ['s' => 'gagal', 'm' => 'Gagal kirim pesan'];
		}

		echo json_encode($json);
	}


}

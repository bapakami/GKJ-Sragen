<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '8') {
            redirect(base_url("login"));
        } else {
            $this->load->model('M_login');
            $this->load->model('M_jemaat');
            $this->load->library('lib');
        }
    }

    function katekesasi()
    {
        $data['active'] = 'layanan';
        $data['user'] = $this->session->userdata('fullname');
        $data1['katekesasi'] = $this->M_jemaat->dataLayanan($this->session->userdata('id'));
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));        
        $data1['id_jemaat'] = $data1['jemaat']['id_jemaats'];
        $data1['dokumen'] = $this->M_jemaat->getDokumen($data1['jemaat']['id_jemaats']);
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('layanan/katekesasi', $data1);
        $this->load->view('template/footer');
    }
    function baptis()
    {
        $data['active'] = 'layanan';
        $data['user'] = $this->session->userdata('fullname');
        $data1['baptis'] = $this->M_jemaat->dataBaptis($this->session->userdata('id'));
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));        
        $data1['id_jemaat'] = $data1['jemaat']['id_jemaats'];
        $data1['dokumen'] = $this->M_jemaat->getDokumen($data1['jemaat']['id_jemaats']);
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('layanan/baptis', $data1);
        $this->load->view('template/footer');
    }
    function sidhi()
    {
        $data['active'] = 'layanan';
        $data['user'] = $this->session->userdata('fullname');
        $data1['sidi'] = $this->M_jemaat->dataSidi($this->session->userdata('id'));
        $data1['katekesasi'] = $this->M_jemaat->dataLayanan($this->session->userdata('id'));
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));        
        $data1['id_jemaat'] = $data1['jemaat']['id_jemaats'];
        $data1['dokumen'] = $this->M_jemaat->getDokumen($data1['jemaat']['id_jemaats']);
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('layanan/sidi', $data1);
        $this->load->view('template/footer');
    }
    function nikah()
    {
        $data['active'] = 'layanan';
        $data['user'] = $this->session->userdata('fullname');
        $data1['nikah'] = $this->M_jemaat->dataNikah($this->session->userdata('id'));
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));        
        $data1['id_jemaat'] = $data1['jemaat']['id_jemaats'];
        $data1['dokumen'] = $this->M_jemaat->getDokumen($data1['jemaat']['id_jemaats']);
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('layanan/nikah', $data1);
        $this->load->view('template/footer');
    }
    function doa()
    {
        $data['active'] = 'layanan';
        $data['user'] = $this->session->userdata('fullname');
        $data1['doa'] = $this->M_jemaat->dataDoa($this->session->userdata('id'));
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));       
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('layanan/doa', $data1);
        $this->load->view('template/footer');
    }
    function pindahIman()
    {
        $data['active'] = 'layanan';
        $data['user'] = $this->session->userdata('fullname');
        $data1['daftar_iman'] = $this->M_jemaat->daftarIman();
        $data1['iman'] = $this->M_jemaat->dataIman($this->session->userdata('id'));
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));       
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('layanan/pindah_iman', $data1);
        $this->load->view('template/footer');
    }
    function chat($id)
    {
        $data['id'] = $id;
        $this->load->view('jemaat/chat', $data);
    }
    function sendChat($id)
    {
        $post = $this->input->post();
        $data = [
            'id_sender'     => $this->session->userdata('id'),
            'jenis_layanan' => $id,
            'pesan'         => $post['chat'],
        ];

        $cekChat = $this->db->get_where('chat', array('id_sender' => $this->session->userdata('id'), 'jenis_layanan' => $id));
        if($cekChat->num_rows() > 0) {
            $data['id_parent'] = $cekChat->row()->id_chat;
            $insert = $this->db->insert('chat', $data);
        } else {
            $insert = $this->db->insert('chat', $data);
        }
        if($insert) {
            $json = ['s' => 'sukses'];
        } else {
            $json = ['s' => 'gagal', 'm' => 'Gagal kirim pesan'];
        }

        echo json_encode($json);

    }
    function daftarChat($id)
    {
        $getChat = $this->db->where('id_sender', $this->session->userdata('id'))->where('jenis_layanan', $id)->get('chat')->result_array();
        // echo $this->db->last_query();exit;
        $chat = '';
        $sebelum = '';
        foreach($getChat as $chatnya => $c) {
            ($c['id_sender'] == $this->session->userdata('id') && $c['id_receiver'] != '9') ? $senderx = 'right' : $senderx = '';
            $chat .= '<div class="direct-chat-msg '. $senderx .'">';
            $chat .= '<div class="direct-chat-infos clearfix">';
            // $chat1 = '<span class="direct-chat-name pull-left">'. $this->lib->nama_lengkap2($c['id_sender']) .'</span>';
            // if($sebelum == '' && $sebelum != $c['id_sender']) { echo $chat1; }
            $chat .= '</div>';
            $foto = $this->lib->getImage($c['id_sender']);
            $chat .= '<img class="direct-chat-img" src="'. base_url($foto) .'" alt="message user image">';
            $chat .= '<div class="direct-chat-text">';
            $chat .=  '<span class="direct-chat-timestamp pull-right" style="color: white; padding-left: 3px;">'. $c['send_at'] .'</span>'.$c['pesan'];
            $chat .= '</div>';
            $chat .= '</div>';
            $sebelum = $c['id_sender'];
       }

       echo $chat;
   }
   function daftarKatekesasi($id)
   {
    $json['s'] = 'gagal';
    $post = $this->input->post();
    $data = array(
        'id_jemaat' => $post['id'],
        'nama' => $post['nama'],
        'state' => 3,
        'id_gereja' => $this->session->userdata('gereja_id'),
    );
    $daftar = $this->M_jemaat->daftarKatekesasi($data);
    if ($daftar) {
        $log = array(
            'id_user' => $this->session->userdata('id'),
            'jenis_log' => 'Anda Mendaftar Katekesasi',
        );
        $this->M_jemaat->dataAktifitas($log);
        $json = array('s' => 'sukses', 'm' => 'Proses Daftar Katekesasi Berhasil');
    } else {
        $json = array('s' => 'gagal', 'm' => 'Proses Daftar Katekesasi Gagal');
    }
    echo json_encode($json);
}
function daftarBaptis() 
{
    $post = $this->input->post();      
    $jemaat = $this->M_jemaat->dataJemaat($this->session->userdata('id'));
    $data = array(
        'id_warga' => $post['id'],
        'nama_lengkap' => $jemaat['nama_lengkap'],
        'jenis_kelamin' => $jemaat['jenis_kelamin'],
        'tempat_lahir' => $jemaat['tempat_lahir'],
        'nama_ayah' => $jemaat['nama_ayah'],
        'nama_ibu' => $jemaat['nama_ibu'],
        'tanggal_lahir' => $jemaat['tgl_lahir'],
        'saksi1' => $post['nama1'],
        'saksi2' => $post['nama2'],
        'state' => 3,
        'id_gereja' => $jemaat['gerejaid'],
        'tgl_daftar' => date('Y-m-d'),
    );  
    $daftar = $this->M_jemaat->daftarBaptis($data);
    if($daftar){
        $log = array(
            'id_user' => $this->session->userdata('id'),
            'jenis_log' => 'Anda Mendaftar Baptis',
        );
        $this->M_jemaat->dataAktifitas($log);
        $json = array('s' => 'sukses', 'm' => 'Proses Daftar Baptisan Berhasil');
    } else {
        $json = array('s' => 'gagal', 'm' => 'Proses Daftar Baptisan Gagal');
    }

    echo json_encode($json);

}
function daftarSidi()
{
    $json['s'] = 'gagal';
    $post = $this->input->post();
    $data = array(
        'id_jemaat' => $post['id'],
        'nama' => $post['nama'],
        'state' => 3,
        'id_gereja' => $this->session->userdata('gereja_id'),
    );
    $daftar = $this->M_jemaat->daftarSidi($data);
    if ($daftar) {
        $log = array(
            'id_user' => $this->session->userdata('id'),
            'jenis_log' => 'Anda Mendaftar Sidi',
        );
        $this->M_jemaat->dataAktifitas($log);
        $json = array('s' => 'sukses', 'm' => 'Proses Daftar Sidi Berhasil');
    } else {
        $json = array('s' => 'gagal', 'm' => 'Proses Daftar Sidi Gagal');
    }
    echo json_encode($json);

}
function daftarNikah()
{
    $post = $this->input->post();
    $data = array(
        'id_warga' => $post['id'],
        'nama_suami' => $post['suami'],
        'tgl_lahir_suami' => date('Y-m-d', strtotime($post['tgl_suami'])),
        'nama_istri' => $post['istri'],
        'tgl_lahir_istri' => date('Y-m-d', strtotime($post['tgl_istri'])),
        'saksi_pernikahan' => $post['saksi'],
        'state' => 3,
        'id_gereja' => $this->session->userdata('gereja_id'),
    );

    $simpanNikah = $this->M_jemaat->simpanNikah($data);
    if($simpanNikah) {
        $log = array(
            'id_user' => $this->session->userdata('id'),
            'jenis_log' => 'Anda Mendaftar Nikah',
        );
        $this->M_jemaat->dataAktifitas($log);
        $json = array('s' => 'sukses', 'm' => 'Proses Daftar Berhasil');
    } else {
        $json = array('s' => 'gagal', 'm' => 'Proses Daftar Gagal');
    }

    echo json_encode($json);
}    
function daftarDoa()
{
    $post = $this->input->post();
    $data = array(
        'id_jemaat' => $this->session->userdata('id'),
        'jenis_pelayanan' => $post['jenis'],
        'tujuan' => $post['keterangan'],
        'state' => 3,
        'id_gereja' => $this->session->userdata('gereja_id'),
    );
    $daftar = $this->M_jemaat->daftarDoa($data);
    if($daftar) {
        $log = array(
            'id_user' => $this->session->userdata('id'),
            'jenis_log' => 'Anda Mendaftar Pelayanan Doa',
        );
        $this->M_jemaat->dataAktifitas($log);
        $json = array('s' => 'sukses', 'm' => 'Proses Daftar Berhasil');
    } else {
        $json = array('s' => 'gagal', 'm' => 'Proses Daftar Gagal');
    }

    echo json_encode($json);
}
function daftarPindahIman()
{
    $post = $this->input->post();
    $data = array(
        'id_jemaat' => $this->session->userdata('id'),
        'id_iman_lama' => 2,
        'id_iman_baru' => $post['id_iman_baru'],
        'alasan' => $post['alasan'],
        'id_gereja' => $this->session->userdata('gereja_id'),
        'state' => 3,
    );
    $daftar = $this->M_jemaat->daftarPindahIman($data);
    if($daftar) {
        $log = array(
            'id_user' => $this->session->userdata('id'),
            'jenis_log' => 'Anda Mendaftar Pindah Iman',
        );
        $this->M_jemaat->dataAktifitas($log);
        $json = array('s' => 'sukses', 'm' => 'Proses Daftar Berhasil');
    } else {
        $json = array('s' => 'gagal', 'm' => 'Proses Daftar Gagal');
    }

    echo json_encode($json);
}

function hapus_doa()
{
    $this->db->where('id_jemaat', $this->session->userdata('id'))->delete('pelayanan_doa');
    ?>
    <script>
        alert('Silahkan buat request baru');
        window.history.go(-1);
        location.reload();
    </script>
    <?php
}

}

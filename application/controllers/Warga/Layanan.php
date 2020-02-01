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
    function daftarKatekesasi($id)
    {
        $json['s'] = 'gagal';
        $post = $this->input->post();
        $data = array(
            'id_jemaat' => $post['id'],
            'nama' => $post['nama'],
            'state' => 3,
        );
        $daftar = $this->M_jemaat->daftarKatekesasi($data);
        if ($daftar) {
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
            'saksi1' => $post['nama1'],
            'saksi2' => $post['nama2'],
            'state' => 3,
        );  
        $daftar = $this->M_jemaat->daftarBaptis($data);
        if($daftar){
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
        );
        $daftar = $this->M_jemaat->daftarSidi($data);
        if ($daftar) {
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
        );

        $simpanNikah = $this->M_jemaat->simpanNikah($data);
        if($simpanNikah) {
            $json = array('s' => 'sukses', 'm' => 'Proses Daftar Berhasil');
        } else {
            $json = array('s' => 'gagal', 'm' => 'Proses Daftar Gagal');
        }

        echo json_encode($json);
    }
}

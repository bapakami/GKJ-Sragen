<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jemaat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '8') {
            redirect(base_url("login"));
        } else {
            $this->load->model('M_login');
            $this->load->model('M_jemaat');
            $this->load->model('M_Jemaat_Gereja');
        }
    }

    function index()
    {
        $data['active'] = 'dashboard';
        $data['user'] = $this->session->userdata('fullname');
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('jemaat/dashboard');
        $this->load->view('template/footer');
    }

    function kelola()
    {
        $data['active'] = 'kelola';
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('jemaat/kelola');
        $this->load->view('template/footer');
    }
    function layanan()
    {
        $data['active'] = 'layanan';
        $data['user'] = $this->session->userdata('fullname');
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('jemaat/layanan');
        $this->load->view('template/footer');
    }
    function dataJemaat()
    {
        $data['active'] = 'kelola';
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));
        $data1['pendidikan'] = $this->M_Jemaat_Gereja->Pendidikan();
        $data1['pekerjaan'] = $this->M_Jemaat_Gereja->Pekerjaan();
        $data1['penghasilan'] = $this->M_Jemaat_Gereja->Penghasilan();
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('jemaat/dataPribadi', $data1);
        $this->load->view('template/footer');
    }
    function editData()
    {
        $post = $this->input->post();
        // echo "<pre>";
        // print_r($post);
        // exit;
        $data = array(
            'no_induk' => $post['NoInduk'],
            'nama_lengkap' => $post['namaLengkap'],
            'nama_panggilan' => $post['NamaPanggilan'],
            'alamat_email' => $post['Email'],
            'no_ktp' => $post['NoKtp'],
            'no_kk' => $post['NoKK'],
            'tempat_lahir' => $post['tempatLahir'],
            'tgl_lahir' => $post['tanggalLahir'],
            'jenis_kelamin' => $post['gender'],
            'alamat_ktp' => $post['AlamatKTP'],
            'alamat_tinggal' => $post['AlamatTinggalSekarang'],
            'nama_ayah' => $post['namaAyah'],
            'nama_ibu' => $post['namaIbu'],
            'nama_suami' => $post['namaSuami'],
            'nama_istri' => $post['namaIstri'],
            'telepon' => $post['NoTelp'],
            'telepon_rumah' => $post['NoTelprumah'],
            'telepon_wa' => $post['NoTelpwa'],
            'gol_darah' => $post['golonganDarah'],
            'status_keluarga' => $post['status_keluarga'],
            'status_rumah_tinggal' => $post['StatusRumahTinggal'],
            'pendidikan' => $post['PendidikanTerakhir'],
            'pekerjaan' => $post['PekerjaanPokok'],
            'pekerjaan_sampingan' => $post['PekerjaanSampingan'],
            'minat_usaha' => $post['minatUsaha'],
            'penghasilan' => $post['PenghasilanPerBulan'],
        );
        $id = $post['id_jemaats'];
        $editData = $this->M_jemaat->editDataJemaat($data, $id);
        // echo $this->db->last_query();
        // exit;
        if ($editData) {
            $sess = array('status' => 'sukses', 'message' => 'Berhasil Update Data');
            $this->session->set_flashdata($sess);
            redirect('warga/jemaat/kelola');
        } else {
            $sess = array('status' => 'gagal', 'message' => 'Oops, Terjadi Kesalah, Tidak dapat mengupdate data');
            $this->session->set_flashdata($sess);
            redirect('warga/jemaat/dataJemaat');
        }
    }
    function dataDokumen()
    {
        $data['active'] = 'kelola';
        $this->load->view('template/header');
        $jemaat = $this->M_jemaat->dataJemaat($this->session->userdata('id'));
        $data1['dokumen'] = $this->M_jemaat->getDokumen($jemaat['id_jemaats']);
        $data1['id_jemaat'] = $jemaat['id_jemaats'];
        $this->load->view('template/menu', $data1);
        $this->load->view('jemaat/dataDokumen');
        $this->load->view('template/footer');
    }

    public function asyncr()
    {
        $path = "assets_warga/dokumen";
        $post = $this->input->post();
        if (!is_dir($path)) { // membuat directory if not exist
            mkdir($path, 0777, TRUE);
            fopen($path . "/index.php", "w");
        }
        $jenis = $post['jenis'];
        $id = $post['id'];
        // print_r($jenis);
        // exit;
        $file = $_FILES['file'];
        $xxxx = explode('.', $file['name']);
        $nmxxxx = explode(' ', $xxxx[0]);
        $ext = end($xxxx);
        $rand = rand(11, 99);
        $name = "file_" . $nmxxxx[0] . "_" . $rand . "." . $ext;
        $config['file_name']        = $name;
        $config['upload_path']      = $path;
        $config['allowed_types']    = array('jpg', 'jpeg', 'gif', 'png', 'mp4');
        // $config['max_size']         = 5000;
        $link = $path . "/" . $name;

        // print_r($link);
        // exit;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $jumlah = $this->M_jemaat->saveFoto($jenis, $link, $id);
            if ($jumlah <= 0) {
                $saveFile = $this->M_jemaat->saveFile($jenis, $link);
                $json['status'] = 'sukses';
                $json['message'] = 'Berhasil Upload File';
            } else {
                $saveFile = $this->M_jemaat->editFile($jenis, $link, $id);
                $json['status'] = 'sukses';
                $json['message'] = 'Berhasil Perbaharui File';
            }
        } else {
            $json['status'] = 'gagal';
            $json['message'] = 'Oops, Gagal Upload File';
        }

        echo json_encode($json);
    }
}

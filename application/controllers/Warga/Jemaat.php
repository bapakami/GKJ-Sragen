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
            $this->load->model('M_NonJemaat');
            $this->load->library('lib');
        }
    }

    function index()
    {
        $data['active'] = 'dashboard';
        $data['user'] = $this->session->userdata('fullname');
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));
        $data1['timeline'] = $this->M_jemaat->dataTimeLine($this->session->userdata('id'));
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('jemaat/dashboard', $data1);
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
        $data1['katekesasi'] = $this->lib->katekesasi();        
        $data1['baptis'] = $this->lib->baptis();
        $data1['sidi'] = $this->lib->sidi();        
        $data1['nikah'] = $this->lib->nikahan();
        $data1['doa'] = $this->lib->doa();
        $this->load->view('template/header');
        $this->load->view('template/menu', $data);
        $this->load->view('jemaat/layanan', $data1);
        $this->load->view('template/footer');
    }
    function dataJemaat()
    {
        $data['active'] = 'kelola';
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));
        $data1['pendidikan'] = $this->M_Jemaat_Gereja->Pendidikan();
        $data1['pekerjaan'] = $this->M_Jemaat_Gereja->Pekerjaan();
        $data1['penghasilan'] = $this->M_Jemaat_Gereja->Penghasilan();        
        $data1['gereja'] = $this->M_Jemaat_Gereja->gereja();
        $data1['pepantan'] = $this->M_Jemaat_Gereja->pepantan($this->session->userdata('gereja_id'));
        $this->load->view('template/header');
        $this->load->view('template/menu', $data); 
        $this->load->view('jemaat/dataPribadi', $data1);
        $this->load->view('template/footer');
    }
    function dataNonJemaat()
    {
        $data['active'] = 'kelola';
        $this->load->library('lib');
        $data1['non_jemaat'] = $this->M_jemaat->nonJemaat($this->session->userdata('id'));
        $this->load->view('template/header');
        $this->load->view('template/menu', $data); 
        $this->load->view('jemaat/non_jemaat', $data1);
        $this->load->view('template/footer');
    }
    function tambahNonJemaat()
    {
        $data['active'] = 'kelola';
        $this->load->library('lib');
        $data1['non_jemaat'] = $this->M_jemaat->nonJemaat($this->session->userdata('id'));
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));
        $data1['pendidikan'] = $this->M_NonJemaat->Pendidikan();
        $data1['pekerjaan'] = $this->M_NonJemaat->Pekerjaan();
        $data1['peranDalamGereja'] = $this->M_NonJemaat->PeranDalamGereja();
        $data1['minatPelayananUmum'] = $this->M_NonJemaat->MinatPelayanUmum();
        $data1['minatPelayananGereja'] = $this->M_NonJemaat->MinatPelayananGereja();
        $data1['pengalamanMelayaniMasyarakat'] = $this->M_NonJemaat->pengalamanMelayaniMasyarakat();
        $data1['penghasilan'] = $this->M_NonJemaat->Penghasilan();
        $data1['usiaJemaat'] = $this->M_NonJemaat->UsiaJemaat();
        $data1['gereja']=$this->M_NonJemaat->gereja();
        $data1['pepantan']=$this->M_NonJemaat->pepantan($this->session->userdata('gereja_id'));
        $this->load->view('template/header');
        $this->load->view('template/menu', $data); 
        $this->load->view('jemaat/data_non_jemaat', $data1);
        $this->load->view('template/footer');
    }
    function editNonJemaat($id)
    {
        $data['active'] = 'kelola';
        $data1['data']=$this->M_NonJemaat->DataListJemaatEdit($id);
        $data1['pendidikan'] = $this->M_NonJemaat->Pendidikan();
        $data1['pekerjaan'] = $this->M_NonJemaat->Pekerjaan();
        $data1['peranDalamGereja'] = $this->M_NonJemaat->PeranDalamGereja();
        $data1['minatPelayananUmum'] = $this->M_NonJemaat->MinatPelayanUmum();
        $data1['minatPelayananGereja'] = $this->M_NonJemaat->MinatPelayananGereja();
        $data1['pengalamanMelayaniMasyarakat'] = $this->M_NonJemaat->pengalamanMelayaniMasyarakat();
        $data1['penghasilan'] = $this->M_NonJemaat->Penghasilan();
        $data1['usiaJemaat'] = $this->M_NonJemaat->UsiaJemaat();
        $data1['gereja']=$this->M_NonJemaat->gereja();
        $data1['pepantan']=$this->M_NonJemaat->pepantan($this->session->userdata('gereja_id'));
        $this->load->view('template/header');
        $this->load->view('template/menu', $data); 
        $this->load->view('jemaat/edit_non_jemaat', $data1);
        $this->load->view('template/footer');
    }
    function editProfil()
    {        
        $data1['penghasilan'] = $this->M_Jemaat_Gereja->Penghasilan();
        $data1['pendidikan'] = $this->M_Jemaat_Gereja->Pendidikan();
        $data1['pekerjaan'] = $this->M_Jemaat_Gereja->Pekerjaan();
        $data1['jemaat'] = $this->M_jemaat->dataJemaat($this->session->userdata('id'));
        $data1['data'] = $this->M_jemaat->getDataUser($this->session->userdata('id'));
        $this->load->view('warga/edit_profile', $data1);
    }
    function ubahDataProfile()
    {
        $post = $this->input->post();
        $dataUser = array(
            'fullname' => $post['nama'],
        );

        $dataJemaat = array(
            'alamat_tinggal' => $post['alamat'],
            'tempat_lahir' => $post['tempat'],
            'tgl_lahir' => date('Y-m-d', strtotime($post['tanggal'])),
        );

        if($post['password'] != '') {
            if($post['password'] != $post['konPass']) {
                $json = array('s' => 'gagal', 'm' => 'Oops, Konfirmasi Password tidak sesuai');
                echo json_encode($json);
                exit;
            }
            $dataUser['password'] = md5($post['password']);
        }

        $simpan = $this->M_jemaat->updateUser($dataUser, $dataJemaat, $this->session->userdata('id'));
        if ($simpan) {
            $json = array('s' => 'sukses', 'm' => 'Berhasil Update Data');
        } else {
            $sess = array('s' => 'gagal', 'm' => 'Oops, Terjadi Kesalah, Tidak dapat mengupdate data');
        }

        echo json_encode($json);

    }
    function katekesasi()
    {
        redirect(base_url('warga/layanan/katekesasi'));
    }
    function baptis()
    {
        redirect(base_url('warga/layanan/baptis'));
    }
    function sidhi()
    {
        redirect(base_url('warga/layanan/sidhi'));
    }
    function editData()
    {
        $post = $this->input->post();
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
        // print_r($jemaat['id_jemaats']);exit;
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
        // echo "<pre>"; print_r($post);exit;
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
        $config['allowed_types']    = array('jpg', 'jpeg', 'gif', 'png', 'mp4', 'pdf', 'word');
        // $config['max_size']         = 5000;
        $link = $path . "/" . $name;
        $data = array(
            'link' => $link,
            'jenis' => $jenis,
            'id'    => $id
        );
        // print_r($data);
        // exit; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $jumlah = $this->M_jemaat->saveFoto($jenis, $link, $id);
            if ($jumlah <= 0) {
                $saveFile = $this->M_jemaat->saveFile($jenis, $link, $id);
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
    public function asyncrx()
    {
        $path = "assets_warga/profile";
        $post = $this->input->post();
        if (!is_dir($path)) { // membuat directory if not exist
            mkdir($path, 0777, TRUE);
            fopen($path . "/index.php", "w");
        }
        // print_r($_FILES);
        // exit;
        $file = $_FILES['file'];
        $xxxx = explode('.', $file['name']);
        $nmxxxx = explode(' ', $xxxx[0]);
        $ext = end($xxxx);
        $rand = rand(11, 99);
        $name = "file_" . $nmxxxx[0] . "_" . $rand . "." . $ext;
        $config['file_name']        = $name;
        $config['upload_path']      = $path;
        $config['allowed_types']    = array('jpg', 'jpeg', 'gif', 'png', 'mp4', 'pdf', 'word');
        // $config['max_size']         = 5000;
        $link = $path . "/" . $name;

        // print_r($link);
        // exit;
        $data = array(
            'foto' => $link,
            'dir' => $path,
            'mimetype' => $file['type'],
            'filesize' => $file['size'],
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $jumlah = $this->M_jemaat->editFotoProfile($data);
            $json['status'] = 'sukses';
            $json['message'] = 'Berhasil Upload File';
        } else {
            $json['status'] = 'gagal';
            $json['message'] = 'Oops, Gagal Upload File';
        }

        echo json_encode($json);
    }
    function daftarPepantan($idgereja)
    {
        $data = $this->M_jemaat->getPepantan($idgereja);
        $daftar = '<option value="">Pilih Pepantan</option>';
        foreach($data as $dt => $bb) {
            $daftar .= '<option value="'.$bb["id"].'">'.$bb["namapepantan"].'</option>';
        }

        echo $daftar;
    }
    function editDataGerejawi()
    {
        $post = $this->input->post();
        $data = array(
            'gerejaid' => $post['gereja_edit'],
            'Pepantan_id' => $post['pepantan_edit'],
            'status_warga' => $post['StatusWargaGereja_edit'],
            'tempat_kebaktian' => $post['TempatKebaktian_edit'],
            'pdt_baptis' => $post['pdt_baptis_edit'],
            'tempat_baptis' => $post['tempat_baptis_edit'],
            'tgl_baptis' => $post['tanggal_baptis_edit'],
            'pdt_sidhi' => $post['pdt_sidhi_edit'],
            'tempat_sidhi' => $post['tempat_sidhi_edit'],
            'tgl_sidhi' => $post['tanggal_sidhi_edit'],
        );

        $data2 = array(
            'gereja_id' => $post['gereja_edit'],
            'pepantans_id' => $post['pepantan_edit'],
        );

        $edit = $this->M_jemaat->editDataGerejawi($data, $data2, $this->session->userdata('id'));

        if ($edit) {
            $this->session->unset_userdata('gereja_id');
            $this->session->set_userdata('gereja_id', $post['gereja_edit']);
            $sess = array('status' => 'sukses', 'message' => 'Berhasil Update Data');
            $this->session->set_flashdata($sess);
            redirect('warga/jemaat/dataJemaat');
        } else {
            $sess = array('status' => 'gagal', 'message' => 'Oops, Terjadi Kesalah, Tidak dapat mengupdate data');
            $this->session->set_flashdata($sess);
            redirect('warga/jemaat/dataJemaat');
        }
    }
}

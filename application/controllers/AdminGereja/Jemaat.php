<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jemaat extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('group_id') !='1'){
            redirect(base_url("login"));
        }else {
            $this->load->model('M_Jemaat_Gereja');
            $this->load->library('encrypt'); 
        }
    }

    public function index()
    {
        $data['data']=$this->M_Jemaat_Gereja->DataList($this->session->userdata('gereja_id'));
        $data['pendidikan'] = $this->M_Jemaat_Gereja->Pendidikan();
        $data['status'] = $this->M_Jemaat_Gereja->Status_nikah();
        $data['pekerjaan'] = $this->M_Jemaat_Gereja->Pekerjaan();
        $data['peranDalamGereja'] = $this->M_Jemaat_Gereja->PeranDalamGereja();
        $data['minatPelayananUmum'] = $this->M_Jemaat_Gereja->MinatPelayanUmum();
        $data['minatPelayananGereja'] = $this->M_Jemaat_Gereja->MinatPelayananGereja();
        $data['pengalamanMelayaniMasyarakat'] = $this->M_Jemaat_Gereja->pengalamanMelayaniMasyarakat();
        $data['penghasilan'] = $this->M_Jemaat_Gereja->Penghasilan();
        $data['usiaJemaat'] = $this->M_Jemaat_Gereja->UsiaJemaat();
        $data['gereja']=$this->M_Jemaat_Gereja->gereja();
        $data['pepantan']=$this->M_Jemaat_Gereja->pepantan($this->session->userdata('gereja_id'));
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('userGereja/DataJemaat',$data);
        $this->load->view('template/footer');
    }
    public function FormInsert(){
        $data['data']=$this->M_Jemaat_Gereja->DataList($this->session->userdata('gereja_id'));
        $data['pendidikan'] = $this->M_Jemaat_Gereja->Pendidikan();
        $data['pekerjaan'] = $this->M_Jemaat_Gereja->Pekerjaan();
        $data['penghasilan'] = $this->M_Jemaat_Gereja->Penghasilan();
        $data['gereja']=$this->M_Jemaat_Gereja->gereja();
        $data['pepantan']=$this->M_Jemaat_Gereja->pepantan($this->session->userdata('gereja_id'));
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('userGereja/InsertJemaat',$data);
        $this->load->view('template/footer');
    }

    public function insertData()
    {
        $kode_gereja = $this->M_Jemaat_Gereja->getKodeGereja($this->session->userdata('gereja_id'));
        
        $data = array (
            "nama_lengkap" => $this->input->post('namaLengkap'),
            "nama_panggilan" => $this->input->post('NamaPanggilan'),
            "alamat_email" => $this->input->post('Email'),
            "NoKTPEncrypt" => $this->encrypt->encode($this->input->post('NoKtp')),
            "no_kk" => $this->input->post('NoKK'),
            "jenis_kelamin" => $this->input->post('gender'),
            "status_perkawinan" => $this->input->post('statusNikah'),
            "tempat_lahir" => $this->input->post('tempatLahir'),
            "tgl_lahir" => $this->input->post('tanggalLahir'),
            "usia" => $this->input->post('usiaJemaat'),
            "gol_darah" => $this->input->post('golonganDarah'),
            "nama_ayah" => $this->input->post('namaAyah'), 
            "namaIbuEncrypt" => $this->encrypt->encode($this->input->post('namaIbu')),   
            "nama_suami" => $this->input->post('namaSuami'), 
            "nama_istri" => $this->input->post('namaIstri'),             
            "alamat_ktp" => $this->input->post('AlamatKTP'), 
            "alamat_tinggal" => $this->input->post('AlamatTinggalSekarang'),
            "telepon" => $this->input->post('NoTelp'),
            "telepon_rumah" => $this->input->post('NoTelprumah'), 
            "telepon_wa" => $this->input->post('NoTelpwa'),
            "status" => $this->input->post('Status'),   
            "status_rumah_tinggal" => $this->input->post('StatusRumahTinggal'), 
            "pendidikan" => $this->input->post('PendidikanTerakhir'), 
            "penghasilan" => $this->input->post('PenghasilanPerBulan'), 
            "pekerjaan" => $this->input->post('PekerjaanPokok'), 
            "pekerjaan_sampingan" => $this->input->post('PekerjaanSampingan'),
            "minat_usaha" => $this->input->post('minatUsaha'),
            "Pepantan_id" => $this->input->post('pepantan'),
            "status_warga" => $this->input->post('StatusWargaGereja'),
            "tempat_kebaktian" => $this->input->post('TempatKebaktian'),
            "tgl_nikah" => $this->input->post('tanggalPernikahan'),
            "tatacara_nikah" => $this->input->post('tataCaraPernikahan'),
            "status_keluarga" => $this->input->post('status_keluarga'),
            "tempat_baptis" => $this->input->post('tempat_baptis'),
            "tempat_sidhi" => $this->input->post('tempat_sidhi'),
            "tgl_baptis" => $this->input->post('tanggal_baptis'),
            "tgl_sidhi" => $this->input->post('tanggal_sidhi'),
            "peran_gereja" => $this->input->post('perangereja'),
            "lama_jabatan_majelis" => $this->input->post('jabat_majelis'),
            "lama_pengurus_komisi" => $this->input->post('jabat_komisi'),
            "panitia_kegiatan" => $this->input->post('kegiatan_gereja'),
            "minat_pelayanan_umum" => $this->input->post('minat_pelayanan_umum'),
            "pengalaman_organisasi" => $this->input->post('pengalaman_organisasi'),
            "pengalaman_melayani" => $this->input->post('pengalaman_melayani'),
            "gangguan_kesehatan" => $this->input->post('gangguan_kesehatan'),
            "pdt_nikah" => $this->input->post('pdt_nikah'),
            "pdt_baptis" => $this->input->post('pdt_baptis'),
            "pdt_sidhi" => $this->input->post('pdt_sidhi'),
            //Penginput
            "username" => $this->session->userdata('username'),
            "addedtime" => date("d-m-Y H:i:s"),
            "gerejaid" => $this->session->userdata('gereja_id'),
            "nmrbkinduk" => $kode_gereja.".".$this->input->post('NoInduk'),
            "no_induk" => $this->input->post('NoInduk'),
            "kode_gereja" => $kode_gereja
        );
        $this->M_Jemaat_Gereja->insertData($data);
        redirect('AdminGereja/Jemaat');
    }

   public function hapusData()
    {
        $this->M_Jemaat_Gereja->hapusData($this->input->post('kode'));
        redirect('AdminGereja/Jemaat');
    }

    public function FormEditJemaat($idJemaat)
    {
        $data['data']=$this->M_Jemaat_Gereja->DataListJemaatEdit($idJemaat);
        $data['pendidikan'] = $this->M_Jemaat_Gereja->Pendidikan();
        $data['pekerjaan'] = $this->M_Jemaat_Gereja->Pekerjaan();
        $data['peranDalamGereja'] = $this->M_Jemaat_Gereja->PeranDalamGereja();
        $data['minatPelayananUmum'] = $this->M_Jemaat_Gereja->MinatPelayanUmum();
        $data['minatPelayananGereja'] = $this->M_Jemaat_Gereja->MinatPelayananGereja();
        $data['pengalamanMelayaniMasyarakat'] = $this->M_Jemaat_Gereja->pengalamanMelayaniMasyarakat();
        $data['penghasilan'] = $this->M_Jemaat_Gereja->Penghasilan();
        $data['usiaJemaat'] = $this->M_Jemaat_Gereja->UsiaJemaat();
        $data['gereja']=$this->M_Jemaat_Gereja->gereja();
        $data['pepantan']=$this->M_Jemaat_Gereja->pepantan($this->session->userdata('gereja_id'));
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('userGereja/EditJemaat',$data);
        $this->load->view('template/footer');
    }

    public function editData(){
        $id = $this->input->post('idedit');
        $kode_gereja = $this->M_Jemaat_Gereja->getKodeGereja($this->session->userdata('gereja_id'));
        $data = array (
            "nama_lengkap" => $this->input->post('namaLengkap_edit'),
            "nama_panggilan" => $this->input->post('NamaPanggilan_edit'),
            "alamat_email" => $this->input->post('Email_edit'),
            "NoKTPEncrypt" => $this->encrypt->encode($this->input->post('NoKtp_edit')),
            "no_kk" => $this->input->post('NoKK_edit'),
            "jenis_kelamin" => $this->input->post('gender_edit'),
            "status_perkawinan" => $this->input->post('statusNikah_edit'),
            "tempat_lahir" => $this->input->post('tempatLahir_edit'),
            "tgl_lahir" => $this->input->post('tanggalLahir_edit'),
            "usia" => $this->input->post('usiaJemaat_edit'),
            "gol_darah" => $this->input->post('golonganDarah_edit'),
            "nama_ayah" => $this->input->post('namaAyah_edit'),             
            "namaIbuEncrypt" => $this->encrypt->encode($this->input->post('namaIbu_edit')),   
            "nama_suami" => $this->input->post('namaSuami_edit'), 
            "nama_istri" => $this->input->post('namaIstri_edit'), 
            "nama_anak" => $this->input->post('namaAnak_edit'), 
            "alamat_ktp" => $this->input->post('AlamatKTP_edit'), 
            "alamat_tinggal" => $this->input->post('AlamatTinggalSekarang_edit'),
            "telepon" => $this->input->post('NoTelp_edit'),
            "telepon_rumah" => $this->input->post('NoTelprumah_edit'), 
            "telepon_wa" => $this->input->post('NoTelpwa_edit'),    
            "status_rumah_tinggal" => $this->input->post('StatusRumahTinggal_edit'), 
            "pendidikan" => $this->input->post('PendidikanTerakhir_edit'), 
            "penghasilan" => $this->input->post('PenghasilanPerBulan_edit'), 
            "pekerjaan" => $this->input->post('PekerjaanPokok_edit'), 
            "pekerjaan_sampingan" => $this->input->post('PekerjaanSampingan_edit'),
            "minat_usaha" => $this->input->post('minatUsaha_edit'),
            "Pepantan_id" => $this->input->post('pepantan_edit'),
            "status_warga" => $this->input->post('StatusWargaGereja_edit'),
            "tempat_kebaktian" => $this->input->post('TempatKebaktian_edit'),
            "tgl_nikah" => $this->input->post('tanggalPernikahan_edit'),
            "tatacara_nikah" => $this->input->post('tataCaraPernikahan_edit'),
            "pdt_nikah" => $this->input->post('pdt_nikah_edit'),
            "pdt_baptis" => $this->input->post('pdt_baptis_edit'),
            "pdt_sidhi" => $this->input->post('pdt_sidhi_edit'),

            "status_keluarga" => $this->input->post('status_keluarga_edit'),
            // "jml_anak" => $this->input->post('jumlah_anak_edit'),
            "tempat_baptis" => $this->input->post('tempat_baptis_edit'),
            "tempat_sidhi" => $this->input->post('tempat_sidhi_edit'),
            "tgl_baptis" => $this->input->post('tanggal_baptis_edit'),
            "tgl_sidhi" => $this->input->post('tanggal_sidhi_edit'),
            "peran_gereja" => $this->input->post('perangereja_edit'),
            "lama_jabatan_majelis" => $this->input->post('jabat_majelis_edit'),
            "lama_pengurus_komisi" => $this->input->post('jabat_komisi_edit'),
            "panitia_kegiatan" => $this->input->post('kegiatan_gereja_edit'),
            "minat_pelayanan_umum" => $this->input->post('minat_pelayanan_umum_edit'),
            "pengalaman_organisasi" => $this->input->post('pengalaman_organisasi_edit'),
            "pengalaman_melayani" => $this->input->post('pengalaman_melayani_edit'),
            "gangguan_kesehatan" => $this->input->post('gangguan_kesehatan_edit'),
            //Penginput
            "addedtime" => date("Y-m-d H:i:s"),
            "nmrbkinduk" => $kode_gereja.".".$this->input->post('NoInduk_edit'),
            "no_induk" => $this->input->post('NoInduk_edit'),
            "kode_gereja" => $kode_gereja
        );
        $this->M_Jemaat_Gereja->updateData($id,$data);
        redirect('AdminGereja/Jemaat');
    }

    public function KematianJemaat(){
        $id = $this->input->post('kode');
        $status = 'Wafat';
        $data = array (
            "tanggal_kematian" => $this->input->post('tanggalKematian'),
            "kota_kematian" => $this->input->post('KotaKematian'),
            "status" => $status,
            "tempat_kematian" => $this->input->post('TempatKematian')
            
        );
        $this->M_Jemaat_Gereja->updateDataKematian($id,$data);
        redirect('AdminGereja/Jemaat');
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
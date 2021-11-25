<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nikah extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('group_id') !='9'){
            redirect(base_url("login"));
        }else {
          $this->load->model("M_nikah");
          $this->load->model("M_jemaat");
          $this->load->library('lib');
      }       

  }

  public function index()
  {
    $data['data']=$this->M_nikah->AkunList();
    $data['gereja']=$this->M_nikah->gereja();
    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('konten/nikah',$data);
    $this->load->view('template/footer');
}

public function insertData()
{
    // print_r($this->input->post());exit;
    $data = array(
        'state' => $this->input->post('pilih'),
        'nama_suami' => $this->input->post('nama_suami'),
        'nama_istri' => $this->input->post('nama_istri'),
        'tgl_nikah' => $this->input->post('tgl_pendaftaran')
    );
    $id = $this->input->post('id');

    $update = $this->M_nikah->insertData($data, $id);
    if($update) {
        $log = array(
            'id_user' => $id,
        );
        if($this->input->post('pilih') == 1){
            $log['id_user']   = $id;
            $this->db->query("DELETE FROM chat WHERE id_sender = '". $id ."' AND jenis_layanan = 4");
            $log['jenis_log'] = 'Permohonan Nikah Diterima, dengan saran tanggal pernikahan '.$this->input->post('tgl_pernikahan');
        } else {
            $log['id_user']   = $id;
            $log['jenis_log'] = 'Permohonan Nikah Anda Ditolak, dengan alasan '.$this->input->post('alasan');
        }
        $this->M_jemaat->dataAktifitas($log);
        $json = array('s' => 'sukses', 'm' => 'Proses Daftar Berhasil');
    } else {
        $json = array('s' => 'gagal', 'm' => 'Proses Daftar Gagal');
    }

    echo json_encode($json);
    
}

public function hapusData()
{
    $this->M_nikah->hapusData($this->input->post('kode'));
    redirect('Nikah');
}

function editData(){
    $username=$this->input->post('username_edit');
    $fullname=$this->input->post('fullname_edit');
    $status_aktif=$this->input->post('status_aktif_edit');
    $user_group=$this->input->post('user_group_edit');
    $telephone=$this->input->post('telephone_edit');
    $email=$this->input->post('email_edit');
    $gereja=$this->input->post('gereja_edit');
    $id=$this->input->post('idedit');
    $this->M_nikah->updateData($id,$username,$fullname,$status_aktif,$user_group,$telephone,$email,$gereja);
    redirect('Nikah');
}
}

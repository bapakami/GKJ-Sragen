<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atestasimasuk extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('group_id') !='9'){
            redirect(base_url("login"));
        }else {
          $this->load->model("M_atestasimasuk");
          $this->load->model("M_jemaat");
          $this->load->library('lib');
      }       

  }

  public function index()
  {
    $data['data']=$this->M_atestasimasuk->AkunList();
    $data['gereja']=$this->M_atestasimasuk->gereja();
    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('konten/atestasimasuk',$data);
    $this->load->view('template/footer');
}

public function insertData()
{
    // print_r($this->input->post());exit;
    $data = array(
        'gerejaid' => $this->input->post('id_gereja_baru'),
        'Pepantan_id' => $this->input->post('pepantan'),
    );
    $id = $this->input->post('id');
 
    $update = $this->M_atestasimasuk->insertData($data, $id);
    if($update) {
        $log = array(
            'id_user' => $id,
        );
        if($this->input->post('pilih') == 1){
            $log['jenis_log'] = 'Permohonan Astestasi Anda Diterima';
        } else {
            $log['jenis_log'] = 'Permohonan Astestasi Anda Ditolak, dengan alasan '.$this->input->post('alasan');
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
    $this->M_atestasimasuk->hapusData($this->input->post('kode'));
    redirect('Atestasimasuk');
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
    $this->M_atestasimasuk->updateData($id,$username,$fullname,$status_aktif,$user_group,$telephone,$email,$gereja);
    redirect('Atestasimasuk');
}
}

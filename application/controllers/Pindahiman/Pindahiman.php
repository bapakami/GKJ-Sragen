<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindahiman extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('group_id') !='9'){
            redirect(base_url("login"));
        }else {
          $this->load->model("M_pindahiman");
          $this->load->model("M_jemaat"); 
          $this->load->library('lib');
      }       

  }

  public function index()
  {
    $data['data']=$this->M_pindahiman->AkunList();
    $data['gereja']=$this->M_pindahiman->gereja();
    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('konten/pindahiman',$data);
    $this->load->view('template/footer');
}

public function insertData()
{
    $data = array(
        'state' => $this->input->post('pilih'),
        'alasan' => $this->input->post('alasan')
    );
    $iman = $this->input->post('id_iman');
    $id = $this->input->post('id');

    $update = $this->M_pindahiman->insertData($data, $id);
    if($update) {
        $log = array(
            'id_user' => $id,
        );
        if($this->input->post('pilih') == 1){
            $this->db->query("DELETE FROM chat WHERE id_sender = '". $id ."' AND jenis_layanan = 8");
            $log['jenis_log'] = 'Permohonan Pindah Iman Anda Diterima';
        } else {
            $log['jenis_log'] = 'Permohonan Pindah Iman Anda Ditolak, dengan alasan '.$this->input->post('alasan');
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
    $this->M_pindahiman->hapusData($this->input->post('kode'));
    redirect('Pindahiman');
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
    $this->M_pindahiman->updateData($id,$username,$fullname,$status_aktif,$user_group,$telephone,$email,$gereja);
    redirect('Pindahiman');
}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baptisanak extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('group_id') !='9'){
            redirect(base_url("login"));
        }else {
          $this->load->model("M_baptisanak");
          $this->load->model("M_jemaat");
          $this->load->library('lib');
      }       

  }

  public function index()
  {
    $data['data']=$this->M_baptisanak->AkunList();
    $data['gereja']=$this->M_baptisanak->gereja();
    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('bptanak/bptanak',$data);
    $this->load->view('template/footer');
}

public function insertData()
{
    $data = array(
        'state' => $this->input->post('pilih')
    );
    $id = $this->input->post('id');

    $update = $this->M_baptisanak->insertData($data, $id);
    if($update) {
        $log = array(
            'id_user' => $id,
        );
        if($this->input->post('pilih') == 1){
            $this->db->query("DELETE FROM chat WHERE id_sender = '". $id ."' AND jenis_layanan = 2");
            $log['jenis_log'] = 'Permohonan Baptis Anak Anda Diterima';
        } else {
            $log['jenis_log'] = 'Permohonan Baptis Anak Anda Ditolak, dengan alasan '.$this->input->post('alasan');
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
    $this->M_baptisanak->hapusData($this->input->post('kode'));
    redirect('Baptisanak');
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
    $this->M_baptisanak->updateData($id,$username,$fullname,$status_aktif,$user_group,$telephone,$email,$gereja);
    redirect('Baptisanak');
}
}

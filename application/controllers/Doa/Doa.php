<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('group_id') !='9'){
            redirect(base_url("login"));
        }else {
          $this->load->model("M_doa");
          $this->load->model("M_jemaat");
          $this->load->library('lib');
      }       

  }

  public function index()
  {
    $data['data']=$this->M_doa->AkunList();
    $data['gereja']=$this->M_doa->gereja();
    $this->load->view('template/header');
    $this->load->view('template/menu');
    $this->load->view('konten/doa',$data);
    $this->load->view('template/footer');
}

public function insertData()
{
    // print_r($this->input->post());exit;
    $data = array(
        'nama_pelayan1' => $this->input->post('pelayan1'),
        'nama_pelayan2' => $this->input->post('pelayan2'),
        'state' => $this->input->post('pilih')
    );
    $id = $this->input->post('id');

    $update = $this->M_doa->insertData($data, $id);
    if($update) {
        $log = array(
            'id_user' => $id,
        );
        if($this->input->post('pilih') == 1){
            $log['id_user']   = $id;
            $this->db->query("DELETE FROM chat WHERE id_sender = '". $id ."' AND jenis_layanan = 6");
            $log['jenis_log'] = 'Pelayan Doa anda Akan di pimpin oleh '.$this->input->post('pelayan1');
        } else {
            $log['id_user']   = $id;
            $log['jenis_log'] = 'Permohonan Baptis Dewasa Anda Ditolak, dengan alasan '.$this->input->post('alasan');
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
    $this->M_doa->hapusData($this->input->post('kode'));
    redirect('Doa');
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
    $this->M_doa->updateData($id,$username,$fullname,$status_aktif,$user_group,$telephone,$email,$gereja);
    redirect('Doa');
}
}

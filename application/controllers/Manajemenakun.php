<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemenakun extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }else {
          $this->load->model("M_manajemenakun");
        }       
        
    }

    public function index()
    {
        $data['data']=$this->M_manajemenakun->AkunList();
        $data['gereja']=$this->M_manajemenakun->gereja();
        $this->load->view('template/header');
        $this->load->view('template/menu');
        $this->load->view('konten/manajemenakun',$data);
        $this->load->view('template/footer');
    }

    public function insertData()
    {
        $data = array (
            "username" => $this->input->post('username'),
            "fullname" => $this->input->post('fullname'),
            "password" => md5($this->input->post('password')),
            "group_id" => $this->input->post('user_group'),
            "active" => $this->input->post('status'),
            "telpno" => $this->input->post('telephone'),
            "email" => $this->input->post('email'),
            "gereja_id" => $this->input->post('gereja') 
        );
        $this->M_manajemenakun->insertData($data);
        redirect('Manajemenakun');
    }

   public function hapusData()
    {
        $this->M_manajemenakun->hapusData($this->input->post('kode'));
        redirect('Manajemenakun');
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
        $this->M_manajemenakun->updateData($id,$username,$fullname,$status_aktif,$user_group,$telephone,$email,$gereja);
        redirect('Manajemenakun');
    }
}
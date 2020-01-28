<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemengambar extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model("M_manajemengambar");
        $this->load->model("M_datapersembahan");
        $this->load->library('pagination');
        $this->load->library('upload');
    }

    public function index()
    {
         //konfigurasi pagination
        $config['base_url'] = site_url('Manajemengambar/index'); //site url
        $config['total_rows'] = $this->db->count_all('news'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['isi'] = $this->M_manajemengambar->get_data_list($config["per_page"], $data['page']);           
        $data['gereja']=$this->M_datapersembahan->gereja();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('template/header');
        $this->load->view('template/menu_superadmin');
        $this->load->view('konten/manajemengambar', $data);
        $this->load->view('template/footer');

    } 

    public function insertData()
    {
        $config['upload_path'] = './gallery/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
 
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./gallery/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './gallery/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                $gereja=$this->input->post('gereja');
                $name=$this->input->post('name');
                $this->M_manajemengambar->insertData($gereja,$name,$gambar);
                echo "Image berhasil diupload";
                redirect('manajemengambar');
            }
                      
        }else{
            $gereja=$this->input->post('gereja');
                $name=$this->input->post('name');
                $this->M_manajemengambar->insertData($gereja,$name,'user-default.png');
                redirect('manajemengambar');
        }
    }

    public function updateData()
    {
        $config['upload_path'] = './gallery/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto_edit']['name'])){
 
            if ($this->upload->do_upload('filefoto_edit')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./gallery/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './gallery/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                $gereja=$this->input->post('gereja_edit');
                $name=$this->input->post('name_edit');
                $id=$this->input->post('idedit');
                $this->M_manajemengambar->updateData($id,$gereja,$name,$gambar);
                unlink('gallery/'.$this->input->post('old_name'));
                echo "Image berhasil diupload";
                redirect('manajemengambar');
            }
                      
        }else{
            $gambar=$this->input->post('old_name');
            $gereja=$this->input->post('gereja_edit');
            $name=$this->input->post('name_edit');
            $id=$this->input->post('idedit');
            $this->M_manajemengambar->updateData($id,$gereja,$name,$gambar);
            redirect('manajemengambar');
        }
    }

    public function hapusData()
    {
        $id=$this->input->post('kode');
        $row = $this->M_manajemengambar->get_delete_by_id($id);
        if ($row) {

                unlink('./gallery/'.$row->img_file);
              $data=$this->M_manajemengambar->hapus_data($id);
                echo json_encode($data);
        } else {
                $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
                redirect('manajemengambar');
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemenberita extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('group_id') !='6'){
            redirect(base_url("login"));
        }else {
           $this->load->model("M_manajemenberita");
		$this->load->library('upload');
        }		
	}

	public function index()
	{
		$data['data']=$this->M_manajemenberita->BeritaList();
		$data['gereja']=$this->M_manajemenberita->gereja();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('konten/manajemenberita',$data);
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
                $config['max_width']= 6000;
                $config['max_height']= 4000;
                $config['new_image']= './gallery/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                
                $data = array (
					"judul" => $this->input->post('judul'),
					"user_id" => $this->session->userdata('id'),
					"tanggal_berita" => date('Y-m-d H:i:s'),
					"status" => $this->input->post('status'),
					"isi_berita" => $this->input->post('isi_berita'),
					"image" => $gambar,
					"gerejaid" => $this->input->post('gereja')	     
				);
                $this->M_manajemenberita->insertData($data);
                //echo "Image berhasil diupload";
                redirect('manajemenberita');
            }else{
               echo $this->session->set_flashdata('msg','Gagal Upload! Ukuran Gambar harus di bawah 1 MB');
               redirect(base_url('manajemenberita'));                
            }
                    
        }else{
            	$data = array (
					"judul" => $this->input->post('judul'),
					"user_id" => $this->session->userdata('id'),
					"tanggal_berita" => date('Y-m-d H:i:s'),
					"status" => $this->input->post('status'),
					"isi_berita" => $this->input->post('isi_berita'),
					"gerejaid" => $this->input->post('gereja')
				);
                $this->M_manajemenberita->insertData($data);
                redirect('manajemenberita');
        }        
	}

	public function hapusData()
	{
		$this->M_manajemenberita->hapusData($this->input->post('kode'));
		redirect('Manajemenberita');
	}

	function editData(){
		
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
 				
               $data = array (
					"judul" => $this->input->post('judul_edit'),
					"user_id" => $this->session->userdata('id'),
					"tanggal_berita" => date('Y-m-d H:i:s'),
                    "status" => $this->input->post('status'),					
					"isi_berita" => $this->input->post('isi_berita_edit'),
					"image" => $gbr['file_name'],
					"gerejaid" => $this->input->post('gereja_edit')
						     
				);
                $id=$this->input->post('idedit');
                $this->M_manajemenberita->updateData($data,$id);
                unlink('gallery/'.$this->input->post('old_name'));
                echo "Image berhasil diupload";
                redirect('manajemenberita');
            }
            else{
               echo $this->session->set_flashdata('msg','Gagal Upload! Ukuran Gambar harus di bawah 1 MB');
               redirect(base_url('manajemenberita'));                
            }
                      
        }else{
        /*	echo "<pre>";
          die(print_r("user_group", TRUE));*/
           $data = array (
					"judul" => $this->input->post('judul_edit'),
					"user_id" => $this->session->userdata('id'),
					"tanggal_berita" => date('Y-m-d H:i:s'),
                    "status" => $this->input->post('status'),					
					"isi_berita" => $this->input->post('isi_berita_edit'),
					"gerejaid" => $this->input->post('gereja_edit')						     
				);
                $id=$this->input->post('idedit');
            $this->M_manajemenberita->updateData($data,$id);
            redirect('manajemenberita');
        }
	}
}
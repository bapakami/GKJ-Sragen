<?php  
/**
 * 
 */
class C_warga extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Warga');
	}
	function index(){
		$this->load->view('warga/Register');
	}
	function register(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'));
		$this->M_Warga->register($data);
		echo $this->session->set_flashdata('msg','Register Success');
		redirect(base_url('warga/C_warga'));
	}
	function login(){
		$this->load->view('warga/login');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('warga/c_warga/login'));
	}
	function login_action(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->M_Warga->cek_login($username,$password);
		if($query->num_rows() < 1){
			echo $this->session->set_flashdata('msg','Username or Password is Wrong');
			redirect(base_url('warga/C_warga/login'));
			return;
		}

		$data = $query->row_array();
		$id = $data['id'];
		$nama = $data['nama'];
		$username = $data['username'];
		$email = $data['email'];
		$nik = $data['nik'];

		$sessionDT = array(
			'id' => $id,
			'nama' => $nama,
			'username' => $Username,
			'email' => $email,
			'nik'	=> $nik);
		$this->session->set_userdata($sessionDT);
		//echo $this->session->set_flashdata('msg','Login Sukses');
		redirect(base_url('warga/C_warga/dasboard'));
		//redirect(base_url(''));
	}
	function resetPass($username){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'cendrawasihumkmtrial@gmail.com', // change it to yours
			 'smtp_pass' => 'wemben88', // change it to yours
			 'mailtype' => 'html',
			 'charset' => 'iso-8859-1',
			 'wordwrap' => TRUE
			);

		$x= $this->M_Warga->reset($username);
		$data = array('password' => $x->password);
		$message = $this->load->view('warga/letter.php',$data,true);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		 $this->email->from('noreply@cendrawasihumkmtrial.com','cendrawasihumkm'); // change it to yours
		 $this->email->to($x->email);// change it to yours
		 $this->email->subject('Password');
		 $this->email->message($message);
		 if($this->email->send())
		 {
		 	echo $this->session->set_flashdata('msg','Please Check Your Email');
		 }else{
		 	echo $this->session->set_flashdata('msg','User Not Register');
		 }
		 redirect(base_url('warga/C_warga/login'));
		}
		function fallogin(){
			$id = $this->session->userdata('id');
			if ($id == 0 || $id = '') {
				redirect(base_url('warga/c_warga/login'));
			}
		}
		function dasboard(){
			$this->fallogin();
			$id = $this->session->userdata('id');
			$query = $this->M_Warga->getAll($id);
			if ($query->num_rows() != 1) {
				$data['isi'] = "warga/insert";
				$this->load->view('layout/wrapper',$data);
			}else{
				$data['isi'] = "warga/profile";
				$data['data'] =  $this->M_Warga->detail($id);
				$data['dt'] = $this->M_Warga->det($id);
				$this->load->view('layout/wrapper',$data);
			}

		}

		function lengkapidata(){
			$config['upload_path'] = './assets/upload/image';
			$config['allowed_types'] = 'gif|png|jpg|jpeg|GIF|PNG|JPG|JPEG';
			$config['file_name']	= rand();
		// load library upload
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('passfoto')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('msg',$error);
				redirect(base_url('Warga/C_warga/dasboard'));
			} else {
		//$result = $this->upload->data();
				$id = $this->session->userdata('id');
				$x = $this->input;
				$upload_data = array('uploads' =>$this->upload->data());
				$data = array(
					'id_warga'		=> $id,
					'nama_depan' 	=> $x->post('namadepan'),
					'nama_belakang'	=> $x->post('namabelakang'),
					'tempat_lahir'	=> $x->post('tempatlahir'),
					'tanggal_lahir'	=> $x->post('tanggallahir'),
					'passfoto'		=> $upload_data['uploads']['file_name'],
					'alamat'		=> $x->post('alamat')
				);
				$this->M_Warga->insert($data);
				$this->session->set_flashdata('msg','user telah ditambah');
				redirect(base_url('Warga/C_warga/dasboard'));
			}


		}
		function viewEdit(){
			$id = $this->session->userdata('id');
			$det = $this->M_Warga->detail($id);
			$data = array(
				'data'		=> $det,
				'isi'		=> 'warga/update'
			);
			$this->load->view('layout/wrapper', $data);
		}

		function edit(){
			$config['upload_path'] = './assets/upload/image';
			$config['allowed_types'] = 'gif|png|jpg|jpeg|GIF|PNG|JPG|JPEG';
			$config['file_name']	= rand();
		// load library upload
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('passfoto')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('msg',$error);
				redirect(base_url('Warga/C_warga/dasboard'));
			} else {
		//$result = $this->upload->data();
				$id = $this->session->userdata('id');
				$x = $this->input;
				$upload_data = array('uploads' =>$this->upload->data());
				$data = array(
					'id_warga'		=> $id,
					'nama_depan' 	=> $x->post('namadepan'),
					'nama_belakang'	=> $x->post('namabelakang'),
					'tempat_lahir'	=> $x->post('tempatlahir'),
					'tanggal_lahir'	=> $x->post('tanggallahir'),
					'passfoto'		=> $upload_data['uploads']['file_name'],
					'alamat'		=> $x->post('alamat')
				);
				$this->M_Warga->edit($data);
				$this->session->set_flashdata('msg','data telah diubah');
				redirect(base_url('Warga/C_warga/dasboard'));
			}
		}

// end 
	}// end of class

	?>
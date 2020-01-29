<?php
class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->library(array('form_validation'));
		$this->load->helper('captcha');
	}

	function index()
	{
		// $data = array(
		//     'captcha' => $this->captcha->getWidget(), // menampilkan recaptcha
		//     'script_captcha' => $this->captcha->getScriptTag(), // javascript recaptcha ditaruh di head
		// );
		if ($this->input->post('submit')) {
			$inputCaptcha = $this->input->post('captcha');
			$sessCaptcha = $this->session->userdata('captchaCode');
			if ($inputCaptcha === $sessCaptcha) {
				echo 'Captcha code matched.';
			} else {
				echo 'Captcha code was not match, please try again.';
			}
		}

		// Captcha configuration
		$config = array(
			'img_path'      => 'captcha_images/',
			'img_url'       => base_url() . 'captcha_images/',
			'img_width'     => '150',
			'img_height'    => 50,
			'word_length'   => 3,
			'font_size'     => 16
		);
		$captcha = create_captcha($config);

		// Unset previous captcha and store new captcha word
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode', $captcha['word']);

		// Send captcha image to view
		$data['captchaImg'] = $captcha['image'];

		// Load the view
		$this->load->view('konten/loginNew', $data);
	}

	public function refresh()
	{
		// Captcha configuration
		$config = array(
			'img_path'      => 'captcha_images/',
			'img_url'       => base_url() . 'captcha_images/',
			'img_width'     => '150',
			'img_height'    => 50,
			'word_length'   => 3,
			'font_size'     => 16
		);
		$captcha = create_captcha($config);

		// Unset previous captcha and store new captcha word
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode', $captcha['word']);

		// Display captcha image
		echo $captcha['image'];
	}
	public function myform()
	{
		$this->load->library('mathcaptcha');
		$this->mathcaptcha->init();

		$data['math_captcha_question'] = $this->mathcaptcha->get_question();

		$this->form_validation->set_rules('math_captcha', 'Math CAPTCHA', 'required|callback__check_math_captcha');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('myform', $data);
		} else {
			$this->load->view('myform', $data);
		}
	}

	function _check_math_captcha($str)
	{
		if ($this->mathcaptcha->check_answer($str)) {
			$this->form_validation->set_message('_check_math_captcha', 'good');
			return TRUE;
		} else {
			$this->form_validation->set_message('_check_math_captcha', 'Enter a valid math captcha response.');
			redirect(base_url('login'));
		}
	}

	function aksi_login()
	{
		$inputCaptcha = $this->input->post('captcha');
		$sessCaptcha = $this->session->userdata('captchaCode');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		if ($inputCaptcha !== $sessCaptcha) {
			echo $this->session->set_flashdata('msg', 'Captcha Not Matched');
			redirect(base_url('login'));
			return;
		}

		$cek_login = $this->M_login->cek_login($username, $password);
		echo $this->db->last_query();
		if ($cek_login->num_rows() < 1) {
			echo $this->session->set_flashdata('msg', 'Username or Password is Wrong or Username is not active');
			redirect(base_url('login'));
			return;
		}

		$data  = $cek_login->row_array();
		$id 		= $data['id'];
		$name  = $data['fullname'];
		$username  = $data['username'];
		$email = $data['email'];
		$group_id = $data['group_id'];
		$gerejaid = $data['gereja_id'];
		// print_r($group_id);
		// exit;

		$sesdata = array(
			'id'		=> $id,
			'fullname'  => $name,
			'username'  => $username,
			'email'     => $email,
			'group_id'  => $group_id,
			'gereja_id' => $gerejaid,
			'logged_in' => TRUE
		);
		$this->session->set_userdata($sesdata);
		// access login for admin
		if ($group_id == 1) {
			redirect(base_url('AdminGereja/beranda'));

			// access login for staff
		} else if ($group_id == 6) {
			redirect(base_url("beranda/admin_aja"));

			//access login for pastor
		} else if ($group_id == 9) {
			redirect(base_url("pendetaa/pastorr"));

			// access login for author
		} else {
			redirect(base_url('login'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('landingpage'));
	}
}

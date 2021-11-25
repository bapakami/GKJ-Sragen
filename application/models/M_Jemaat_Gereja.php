<?php 
/**
 * 
 */
class M_Jemaat_Gereja extends CI_Model
{
	var $table = 'jemaats';
	var $column_order = array('nama_lengkap','alamat_tinggal'); 
	var $column_search = array('nama_lengkap' ,'alamat_tinggal'); 
	var $order = array('nama_lengkap' => 'asc');
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('PHPExcel');
	}

	function insertData($data){
		$this->db->insert("jemaats", $data);
	}
	
	function DataListJemaatEdit($idJemaat){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM jemaats a 
			LEFT JOIN gereja b ON b.id = a.gerejaid
			LEFT JOIN pepantans c ON c.id = a.pepantan_id
			WHERE a.id = $idJemaat and a.status = 'Hidup' and a.type = 1");
		return $query;
	}

	function DataListMeninggal($idgereja){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM  jemaats a 
			LEFT JOIN gereja b ON b.id = a.gerejaid
			LEFT JOIN pepantans c ON c.id = a.pepantan_id
			WHERE a.gerejaid = $idgereja and a.status = 'Wafat'");
		return $query;
	}

	function DetailJemaat($id){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan FROM jemaats a 
			LEFT JOIN gereja b ON b.id = a.gerejaid
			LEFT JOIN pepantans c ON c.id = a.pepantan_id
			WHERE a.id = $id");
		return $query;
	}
	
	function updateData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('jemaats',$data);
	}

	function updateDataKematian($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('jemaats',$data);
	}

	function pepantan($idGereja){
		$this->db->order_by('namapepantan','ASC');
		$this->db->where('gereja_id',$idGereja);
		$pepantan= $this->db->get('pepantans');
		return $pepantan->result_array();
	}

	function gereja(){
		$this->db->order_by('namagereja','ASC');
		$provinces= $this->db->get('gereja');
		return $provinces->result_array();
	}

	function Pendidikan(){
		$this->db->order_by('nama_strata','ASC');
		$pendidikan= $this->db->get('pendidikan');
		return $pendidikan->result_array();
	}
	function Status_nikah(){
		$this->db->order_by('nama_status','ASC');
		$status= $this->db->get('master_status');
		return $status->result_array();
	}

	function PeranDalamGereja(){
		$this->db->order_by('nama_peran','ASC');
		$pendidikan= $this->db->get('perangereja');
		return $pendidikan->result_array();
	}

	function UsiaJemaat(){
		$this->db->order_by('usia','ASC');
		$pendidikan= $this->db->get('usiajemaat');
		return $pendidikan->result_array();
	}

	function MinatPelayanUmum(){
		$this->db->order_by('nama_pu','ASC');
		$pendidikan= $this->db->get('pelayananumum');
		return $pendidikan->result_array();
	}

	function MinatPelayananGereja(){
		$this->db->order_by('nama_pg','ASC');
		$pendidikan= $this->db->get('pelayanangereja');
		return $pendidikan->result_array();
	}

	function pengalamanMelayaniMasyarakat(){
		$this->db->order_by('nama_pmm','ASC');
		$pendidikan= $this->db->get('pengalamanmelayanimas');
		return $pendidikan->result_array();
	}
	function Penghasilan(){
		$this->db->order_by('penghasilan_perbulan','ASC');
		$penghasilan= $this->db->get('penghasilan');
		return $penghasilan->result_array();
	}

	function Pekerjaan(){
		$this->db->order_by('nama_pp','ASC');
		$pekerjaan= $this->db->get('pekerjaanpokok');
		return $pekerjaan->result_array();
	}

	function GetKodeGereja($idGereja){
		$this->db->select('kode_gereja');
		$this->db->from('gereja');
		$this->db->where('id',$idGereja);
		return $this->db->get()->row()->kode_gereja;
	}
	function hapusData($data)
	{
		$hasil = $this->db->query("delete from Jemaats where id = $data");
		return $hasil;
	}

	function DataList($idgereja){
		$query = $this->db->query("SELECT a.*,b.namagereja,c.namapepantan, TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS usia FROM jemaats a 
			LEFT JOIN gereja b ON b.id = a.gerejaid
			LEFT JOIN pepantans c ON c.id = a.pepantan_id
			WHERE a.gerejaid = $idgereja and a.status = 'Hidup' and a.type = 1");
		return $query;
	}

	function _get_datatables_query($idgereja)
	{	
		$this->db->select('jemaats.*, gereja.namagereja, pepantans.namapepantan, TIMESTAMPDIFF(YEAR, jemaats.tgl_lahir, CURDATE()) AS usia');
		$this->db->join('gereja', 'gereja.id = jemaats.gerejaid', 'left');
		$this->db->join('pepantans', 'pepantans.id = jemaats.pepantan_id');
		$this->db->where('jemaats.gerejaid', $idgereja);
		$this->db->where('jemaats.status', 'hidup');
		$this->db->where('jemaats.type', 1);
		$this->db->from($this->table);

		$i = 0;	
		foreach ($this->column_search as $item)
		{
			if($_POST['search']['value']) 
			{
				
				if($i===0) // first loop
				{

					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

			}
			$i++;
		}		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($idgereja)
	{		
		$this->_get_datatables_query($idgereja);		
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$idgereja = $this->session->userdata('gereja_id');
		$this->_get_datatables_query($idgereja);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function import($filename)
	{

		ini_set('memory_limit', '-1');
		$inputFileName = 'assets_warga/import/'.$filename;
		try {
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		} catch(Exception $e) {
			die('Error loading file :' . $e->getMessage());
		}
		$worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$numRows = count($worksheet);
		$status = "gagal";
		$line_kosong 		= array();
		$line_bermasalah 	= array();
		$all = array();
		$current = strtotime(date('Y-m-d H:i:s'));
		$session_id = strtoupper(dechex($current));
		$this->session->set_userdata('session_import',$session_id);
		if($worksheet[2]["A"] == "No") {
			$start = 2;
		} else {
			$start = 1;
		}

		if(
			$worksheet[$start]["A"] != "No" OR $worksheet[$start]["B"] != "Nama Lengkap" OR 
			$worksheet[$start]["C"] != "Email" OR $worksheet[$start]["D"] != "No Ktp" OR 
			$worksheet[$start]["E"] != "No KK" OR $worksheet[$start]["F"] != "Tempat Lahir" OR 
			$worksheet[$start]["G"] != "Tanggal Lahir" OR $worksheet[$start]["H"] != "Jenis Kelamin" OR
			$worksheet[$start]["I"] != "Alamat di Ktp" OR $worksheet[$start]["J"] != "Alamat Tinggal Sekarang" OR
			$worksheet[$start]["K"] != "Nama Ayah" OR $worksheet[$start]["L"] != "Nama Ibu" 

		)
		{
			$msg = "Format salah 1";
			$status = "gagal";
			$array = array('status' => $status, 'pesan' => $msg);
			return $array;
			exit;
		} elseif(
			$worksheet[$start]["A"] != "No" OR $worksheet[$start]["B"] != "Nama Lengkap" OR 
			$worksheet[$start]["C"] != "Email" OR $worksheet[$start]["D"] != "No Ktp" OR 
			$worksheet[$start]["E"] != "No KK" OR $worksheet[$start]["F"] != "Tempat Lahir" OR 
			$worksheet[$start]["G"] != "Tanggal Lahir" OR $worksheet[$start]["H"] != "Jenis Kelamin" OR
			$worksheet[$start]["I"] != "Alamat di Ktp" OR $worksheet[$start]["J"] != "Alamat Tinggal Sekarang" OR
			$worksheet[$start]["K"] != "Nama Ayah" OR $worksheet[$start]["L"] != "Nama Ibu" 
		)
		{
			$msg = "Format salah 2";
			$status = "gagal";
			$array = array('status' => $status, 'pesan' => $msg);
			return $array;
			exit;
		} else {
			if($worksheet[2]["A"] == "No") {
				$start = 2;
			} else {
				$start = 1;
			}

			for ($i=$start; $i < ($numRows+1) ; $i++) { 
				if($worksheet[$i]["A"] == "No" OR $worksheet[$i]["A"] == "" OR $worksheet[$i]["B"] == ""){

				}else{					
					$random = substr(sha1(rand()), 0, 30);

					$data_jemaat['session_id'] 		= $session_id;
					$data_jemaat['nama_lengkap'] 	= isset($worksheet[$i]["B"]) ? $worksheet[$i]["B"] : "";
					$data_jemaat['alamat_email'] 	= isset($worksheet[$i]["C"]) ? $worksheet[$i]["C"] : "";
					$data_jemaat['no_ktp'] 			= isset($worksheet[$i]["D"]) ? $worksheet[$i]["D"] : "";
					$data_jemaat['no_kk'] 			= isset($worksheet[$i]["E"]) ? $worksheet[$i]["E"] : "";
					$data_jemaat['tempat_lahir']	= isset($worksheet[$i]["F"]) ? $worksheet[$i]["F"] : "";
					$tgl 						 	= isset($worksheet[$i]["G"]) ? $worksheet[$i]["G"] : "";
					$data_jemaat['tanggal_lahir']	= date('Y-m-d', strtotime($tgl));
					$data_jemaat['jenis_kelamin'] 	= isset($worksheet[$i]["H"]) ? $worksheet[$i]["H"] : "";
					$data_jemaat['alamat_ktp'] 		= isset($worksheet[$i]["I"]) ? $worksheet[$i]["I"] : "";
					$data_jemaat['alamat_tinggal']	= isset($worksheet[$i]["J"]) ? $worksheet[$i]["J"] : "";
					$data_jemaat['nama_ayah'] 		= isset($worksheet[$i]["K"]) ? $worksheet[$i]["K"] : "";
					$data_jemaat['nama_ibu'] 		= isset($worksheet[$i]["L"]) ? $worksheet[$i]["L"] : "";
					$data_jemaat['gerejaid'] 		= $this->session->userdata('gereja_id');
					$data_jemaat['type'] 			= 1;
					$data_jemaat['tanggal_entry'] 	= date("Y-m-d H:i:s");
					$error 	= array();

					if($worksheet[$i]["D"] != "") { // cek apakah nik ada atau tidak
						$ktp = $this->db->get_where('jemaats', array('no_ktp' => $worksheet[$i]["D"])); // cek nik di table jemaats
						if($ktp->num_rows() >= 1) { // kalau ada 
							$dataUser = array(
								'username' => $worksheet[$i]["D"],
								'password' => md5($worksheet[$i]["D"]),
								'group_id' => 8,
								'fullname' => $worksheet[$i]["D"],
								'email'    => $worksheet[$i]["C"],
								'telpno'   => 0,
								'status'   => 0,
								'active'   => 1,
							);
							$cek_email = $this->db->get_where('users', array('email' => $worksheet[$i]["C"]))->num_rows();  // cek email sudah ada belum
							if($cek_email <= 0) {								
								$simpan1 = $this->db->insert('users', $dataUser);
								$id_user = $this->db->insert_id();
								$insert_id = $ktp->row()->id;	
								$data_jemaat['id_user'] = $id_user;
								if($simpan1) {
									$data_jemaat['state'] 	= 1;
								} else {
									$data_jemaat['state'] 	= 0;
								}
								$data_jemaat['mail']  	= 2;
							} else {
								$data_jemaat['id_user'] = 0;
								$data_jemaat['state']   = 0;
								$data_jemaat['mail']    = 2;
								$error[]				= "Nik Sudah terdaftar, data tidak akan disimpan";
							}

						} else { // kalau tidak ada 
							if($worksheet[$i]["C"] != "") {
								$dataUser = array(
									'username' => $worksheet[$i]["D"],
									'password' => md5($worksheet[$i]["D"]),
									'group_id' => 8,
									'fullname' => $worksheet[$i]["D"],
									'email'    => $worksheet[$i]["C"],
									'telpno'   => 0,
									'status'   => 0,
									'active'   => 1,
								);
								$cek_email = $this->db->get_where('users', array('email' => $worksheet[$i]["C"]))->num_rows();  // cek email sudah ada belum
								if($cek_email <= 0) {
									$this->db->insert('users', $dataUser);
									$insert_id = $this->db->insert_id();

									$data = array(
										'nama' 		=> $worksheet[$i]["B"],
										'id_user'	=> $insert_id,
										'tujuan' 	=> 'Verifikasi Pendaftaran',
										'mail_to' 	=> $worksheet[$i]["C"],
										'token' 	=> $random,
									);								
									$data_jemaat['id_user'] = $insert_id;
									$this->db->insert('mail_log', $data);
									// $kirimEmail = $this->kirimEmailRegistrasi($random);
									$this->session->unset_userdata('token');
									$this->session->set_userdata('token', $random);
									$data_jemaat['state'] = 1;
									$data_jemaat['mail'] = 3;
								} else {
									$data_jemaat['id_user'] = 0;
									$data_jemaat['state']   = 1;
									$data_jemaat['mail']    = 3;
								}							
							}
						}
					} else {
						$error[] = 'Nik tidak diisi';
						$data_jemaat['state'] = 0;
						$data_jemaat['mail']  = 3;
					}

					$data_jemaat['error'] = implode(',',$error);
					$this->db->insert('temp_jemaat',$data_jemaat);
					$all[] = $data_jemaat;
				}	
			}
		}

		$msg = "Berhasil Import Data";
		$status = "sukses";
		$array = array('status' => $status, 'pesan' => $msg);
		return $array;
	}

	function kirimEmailRegistrasi()
	{
		$this->load->library('mailer');
		$dataMailer = $this->db->get_where('mail_log', array('token' => $this->session->userdata('token')))->row();

		$email_penerima = $dataMailer->mail_to;
		$data['nama'] = $dataMailer->nama;
		$data['link'] = $this->session->userdata('token');

		$content = $this->load->view('layout/email', $data, true); 
		$sendmail = array(
			'email_penerima' => $email_penerima,
			'content' => $content,
			'subject' => 'Verifikasi Pendaftaran',
		);
		$send = $this->mailer->send($sendmail);

		if ($send) {
			$sess = array(
				'status' => 'Sukses',
			);

			return $sess;
		} else {
			$sess = array(
				'status' => 'Gagal',
			);
			return $sess;
		}
	}

	function data_preview($session_id)
	{
		return $this->db->get_where('temp_jemaat', array('session_id' => $session_id));
	}
}
?>

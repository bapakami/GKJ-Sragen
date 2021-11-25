<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib {
	function katekesasi()
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');        
		$katekesasi = $CI->M_jemaat->dataLayanan($CI->session->userdata('id'));

		$kat = $katekesasi->num_rows();
		if ($kat == 1) {
			$kate = $katekesasi->row_array();
			$st = $kate['state'];
			if ($st == 1) {
				$marquee = "<marquee>Selamat Permohonan Katekesasi Anda Diterima</marquee>";
			} elseif ($st == 2) {
				$marquee = "<marquee>Mohon Maaf, Permohonan Katekesasi Anda Ditolak</marquee>";
			} elseif ($st == 3) {
				$marquee = "<marquee>Permohonan Katekesasi Anda Sedang Diproses</marquee>";
			}
		} else {
			$marquee = "Daftar Katekesasi";
		}

		return $marquee;
	}

	function baptis()
	{
		$CI =& get_instance();
		$CI->load->model('M_jemaat');
		$baptis = $CI->M_jemaat->dataBaptis($CI->session->userdata('id'));

		$kat = $baptis->num_rows();
		if ($kat == 1) {
			$kate = $baptis->row_array();
			$st = $kate['state'];
			if ($st == 1) {
				$marquee1 = "<marquee>Selamat Permohonan Katekesasi Anda Diterima</marquee>";
			} elseif ($st == 2) {
				$marquee1 = "<marquee>Mohon Maaf, Permohonan Baptis Anda Ditolak</marquee>";
			} elseif ($st == 3) {
				$marquee1 = "<marquee>Permohonan Baptis Anda Sedang Diproses</marquee>";
			}
		} else {
			$marquee1 = "Daftar Baptis";
		}

		return $marquee1;
	}

	function sidi()
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');        
		$katekesasi = $CI->M_jemaat->dataSidi($CI->session->userdata('id'));

		$kat = $katekesasi->num_rows();
		if ($kat == 1) {
			$kate = $katekesasi->row_array();
			$st = $kate['state'];
			if ($st == 1) {
				$marquee = "<marquee>Selamat Permohonan Sidi Anda Diterima</marquee>";
			} elseif ($st == 2) {
				$marquee = "<marquee>Mohon Maaf, Permohonan Sidi Anda Ditolak</marquee>";
			} elseif ($st == 3) {
				$marquee = "<marquee>Permohonan Sidi Anda Sedang Diproses</marquee>";
			}
		} else {
			$marquee = "Daftar Sidi";
		}

		return $marquee;
	}

	function nikahan()
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');        
		$katekesasi = $CI->M_jemaat->dataNikah($CI->session->userdata('id'));
		// echo $CI->db->last_query();exit;

		$kat = $katekesasi->num_rows();
		if ($kat == 1) {
			$kate = $katekesasi->row_array();

			$st = $kate['state'];
			if ($st == 1) {
				$marquee = "<marquee>Selamat Permohonan Nikah Anda Diterima</marquee>";
			} elseif ($st == 2) {
				$marquee = "<marquee>Mohon Maaf, Permohonan Nikah Anda Ditolak</marquee>";
			} elseif ($st == 3) {
				$marquee = "<marquee>Permohonan Nikah Anda Sedang Diproses</marquee>";
			}
		} else {
			$marquee = "Daftar Nikah";
		}

		return $marquee;
	}

	function doa()
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');        
		$katekesasi = $CI->M_jemaat->dataDoa($CI->session->userdata('id'));
		// echo $CI->db->last_query();exit;

		$kat = $katekesasi->num_rows();
		if ($kat == 1) {
			$kate = $katekesasi->row_array();

			$st = $kate['state'];
			if ($st == 1) {
				$marquee = "<marquee>Selamat Permohonan Pelayanan Doa Anda Diterima</marquee>";
			} elseif ($st == 2) {
				$marquee = "<marquee>Mohon Maaf, Permohonan Pelayanan Doa Anda Ditolak</marquee>";
			} elseif ($st == 3) {
				$marquee = "<marquee>Permohonan Pelayanan Doa Anda Sedang Diproses</marquee>";
			}
		} else {
			$marquee = "Daftar Pelayanan Doa";
		}

		return $marquee;
	}

	function pindah_iman()
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');        
		$katekesasi = $CI->M_jemaat->dataIman($CI->session->userdata('id'));
		// echo $CI->db->last_query();exit;

		$kat = $katekesasi->num_rows();
		if ($kat == 1) {
			$kate = $katekesasi->row_array();

			$st = $kate['state'];
			if ($st == 1) {
				$marquee = "<marquee>Selamat Permohonan Pindah Iman Anda Diterima</marquee>";
			} elseif ($st == 2) {
				$marquee = "<marquee>Mohon Maaf, Permohonan Pindah Iman Anda Ditolak</marquee>";
			} elseif ($st == 3) {
				$marquee = "<marquee>Permohonan Pindah Iman Anda Sedang Diproses</marquee>";
			}
		} else {
			$marquee = "Daftar Pindah Iman";
		}

		return $marquee;
	}

	function nama_gereja($idgereja)
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');
		$namaGereja = $CI->M_jemaat->get_gereja($idgereja);

		echo $namaGereja['namagereja'];
	}

	function nama_pepantan($idpepantan)
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');
		$namaPepantan = $CI->M_jemaat->get_pepantans($idpepantan);

		echo $namaPepantan['namapepantan'];
	}

	function nama_lengkap($namalengkap)
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');
		$namaLengkap = $CI->M_jemaat->get_jemaats($namalengkap);

		echo $namaLengkap['namalengkap'];
	}

	function nama_lengkap2($namalengkap)
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');
		$namaLengkap = $CI->db->get_where('users', array('id' => $namalengkap))->row();

		return $namaLengkap->fullname;
	}

	function nama_iman($idiman)
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');
		$namaIman = $CI->M_jemaat->get_iman($idiman);

		echo $namaIman['agama'];
	}

	function getImage($id)
	{
		$CI = & get_instance();
		$CI->load->model('M_jemaat');
		$namaLengkap = $CI->db->get_where('users', array('id' => $id))->row();
		$foto = $namaLengkap->foto;
		if($foto == '') {
			$foto = 'assets/img/avatar5.png';
		}

		return $foto;
	}

	function color($id)
	{
		$color = '';
		switch ($id) {
			case '1':
				$color = 'green';
				break;
			case '2':
				$color = 'yellow';
				break;
			case '3':
				$color = 'aqua';
				break;
			case '4':
				$color = 'blue';
				break;
			case '5':
				$color = 'purple';
				break;
			case '6':
				$color = 'pink';
				break;
			case '7':
				$color = 'pink';
				break;
			case '8':
				$color = 'orange';
				break;
			
			default:
				$color = '';
				break;
		}

		return $color;
	}

	function cekChat($id, $jenis)
	{
		$CI = & get_instance();
		$cekCahttingan = $CI->db->get_where('chat', array('jenis_layanan' => $jenis, 'id_sender' => $id))->num_rows();
		$jumlah = '';
		if($cekCahttingan > 0) {
			$jumlah = '<img src="'.base_url("assets/img/mail2.gif").'" style="width: 30px;" onclick="startChat('. $id .')"></span>';
		}

		echo $jumlah;
	}

	function cekDataJemaat($id, $jenis)
	{
		$CI = & get_instance();
		$getData = $CI->db->query("SELECT ". $jenis ." FROM tb_dokumen_warga WHERE id_warga = '$id'")->row();
		$result = '';
		if(isset($getData) && $getData->$jenis != '') {
			$exp = explode('/', $getData->$jenis);
			$result = '<a download="'. $exp[2] .'" href="'. base_url().$getData->$jenis.'" title="dokumen">Download</a>';
		}

		return $result;
	}

}

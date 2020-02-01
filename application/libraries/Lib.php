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
				$marquee1 = "<marquee>Mohon Maaf, Permohonan Katekesasi Anda Ditolak</marquee>";
			} elseif ($st == 3) {
				$marquee1 = "<marquee>Permohonan Katekesasi Anda Sedang Diproses</marquee>";
			}
		} else {
			$marquee1 = "Daftar Katekesasi";
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
			$marquee = "Daftar Sidi";
		}

		return $marquee;
	}

}

<?php

class M_jemaat extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getDataUser($id)
    {
        return $this->db->select('users.*, jemaats.id as id_jemaats, jemaats.alamat_tinggal, jemaats.tgl_lahir, jemaats.tempat_lahir')->join('jemaats', 'jemaats.id_user = users.id')->get_where('users', array('users.id' => $id))->row_array();
    }
    function dataJemaat($id)
    {
        $this->db->select('*, jemaats.id as id_jemaats')->from('jemaats')->join('users', 'jemaats.id_user = users.id')->where('jemaats.id_user =', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }
    function editDataJemaat($data, $id)
    {
        return $this->db->where('id', $id)->update('jemaats', $data);
    }
    function saveFoto($jenis, $link, $id)
    {
        $cekUser = $this->db->get_where('tb_dokumen_warga', array('id_warga' => $id))->num_rows();
        return $cekUser;
    }
    function saveFile($jenis, $link, $id)
    {
        $data = array(
            'id_warga' => $id,
            $jenis => $link,
        );
        return $this->db->insert('tb_dokumen_warga', $data);
    }
    function editFile($jenis, $link, $id)
    {
        return $this->db->set($jenis, $link)->where('id_warga', $id)->update('tb_dokumen_warga');
    }
    function editFotoProfile($data)
    {
        return $this->db->where('id', $this->session->userdata('id'))->update('users', $data);
    }
    function getDokumen($id)
    {
        return $this->db->get_where('tb_dokumen_warga', array('id_warga' => $id))->row_array();
    }
    function dataLayanan($id)
    {
        $this->db->select('*')->from('jemaats a')->join('katekesasi b', 'a.id_user = b.id_jemaat')->where('a.id_user', $id);
        return $this->db->get();
    }
    function daftarKatekesasi($data)
    {
        return $this->db->insert('katekesasi', $data);
    }
    function nonJemaat($id)
    {
        return $this->db->get_where('jemaats', array('relasi_jemaat' => $id));
    }
    function dataBaptis($id)
    {
        return $this->db->get_where('tb_baptisan', array('id_warga' => $id));
    }
    function daftarBaptis($data)
    {
        return $this->db->insert('tb_baptisan', $data);
    }
    function dataSidi($id)
    {
        $this->db->select('*')->from('jemaats a')->join('data_sidi b', 'a.id_user = b.id_jemaat')->where('a.id_user', $id);
        return $this->db->get();
    }
    function daftarSidi($data)
    {
        return $this->db->insert('data_sidi', $data);
    }
    function dataNikah($id)
    {
        return $this->db->get_where('tb_pernikahan', array('id_warga' => $id));
    }
    function simpanNikah($data)
    {
        return $this->db->insert('tb_pernikahan', $data);
    }
    function getPepantan($idgereja)
    {
        return $this->db->get_where('pepantans', array('gereja_id' => $idgereja))->result_array();
    }
    function editDataGerejawi($data, $data2, $id) 
    {   
        $this->db->where('id', $id)->update('users', $data2);
        return $this->db->where('id_user', $id)->update('jemaats', $data);
    }
    function dataDoa($id)
    {
        $this->db->select('*')->from('jemaats a')->join('pelayanan_doa b', 'a.id_user = b.id_jemaat')->where('a.id_user', $id);
        return $this->db->get();
    }
    function daftarDoa($data)
    {
        return $this->db->insert('pelayanan_doa', $data);
    }
    function updateUser($user, $jemaat, $id) 
    {
        $this->db->where('id_user', $id)->update('jemaats', $jemaat);
        return $this->db->where('id', $id)->update('users', $user);
    }
    function dataAktifitas($data) 
    {
        $this->db->insert('log_aktivitas', $data);
    }
    function dataTimeLine($id)
    {
        return $this->db->limit(6)->order_by('id', 'desc')->get_where('log_aktivitas', array('id_user' => $id));
    }
    function get_gereja($idgereja)
    {
        return $this->db->get_where('gereja', array('id' => $idgereja))->row_array();
    }

    function get_iman($idiman){
        return $this->db->get_where('iman', array('id' => $idiman))->row_array();
    }

    function get_pepantans($idgereja)
    {
        return $this->db->get_where('pepantans', array('id' => $idgereja))->row_array();
    }

    function get_jemaats($idgereja)
    {
        return $this->db->get_where('jemaats', array('id' => $idgereja))->row_array();
    }

    function astestasiKeluar($data)
    {
        return $this->db->insert('astestasi', $data);
    }
    function dataAstestasi($id)
    {
        return $this->db->get_where('astestasi', array('id_jemaat' => $id));
    }
    function cekAtestasi($id)
    {
        return $this->db->get_where('astestasi', array('id_jemaat' => $id, 'state' => 2));
    }
    function astestasiKeluarUpdate($data, $id)
    {
        return $this->db->where('id_jemaat', $id)->where('state', 2)->update('astestasi', $data);
    }
    function dataIman($id)
    {
        $this->db->select('*')->from('jemaats a')->join('pindah_iman b', 'a.id_user = b.id_jemaat')->where('a.id_user', $id);
        return $this->db->get();
    }
    function daftarIman()
    {
        return $this->db->get('iman')->result_array();
    }
    function daftarPindahIman($data)
    {
        return $this->db->insert('pindah_iman', $data);
    }
    
}

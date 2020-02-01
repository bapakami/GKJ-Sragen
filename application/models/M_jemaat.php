<?php

class M_jemaat extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
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
        // $jumlah = $cekUser->num_rows();
        // if ($jumlah <= 0) {
        //     $data = array(
        //         $jenis => $link,
        //     );
        //     return $this->db->insert('tb_dokumen_warga', $data);
        // } else {
        //     $files = $cekUser->row();
        //     if ($files->$jenis == '') {
        //         return $this->db->set($jenis, $link)->where('id_warga', $id)->update('tb_dokumen_warga');
        //     }
        // }
    }
    function saveFile($jenis, $link)
    {
        $data = array(
            $jenis => $link,
        );
        return $this->db->insert('tb_dokumen_warga', $data);
    }
    function editFile($jenis, $link, $id)
    {
        return $this->db->set($jenis, $link)->where('id_warga', $id)->update('tb_dokumen_warga');
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
}

<?php 
/**
 * 
 */
class M_datajemaat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("jemaats", $data);
	}

	function get_data_list($limit, $start){
	$this->db->select('a.id as id, a.nama_lengkap as nama, a.nama_panggilan as namapanggilan, a.no_ktp as ktp, a.no_kk as kk, a.tempat_lahir as tempat_lahir,a.tgl_lahir as tgl_lahir,a.jenis_kelamin as gender,b.namagereja as namagereja,a.telepon as notelp,a.nmrbkinduk as buku_induk,a.alamat_tinggal as alamat');
    $this->db->from('jemaats a');
    $this->db->join('gereja b','b.id=a.gerejaid','LEFT');
    $this->db->order_by('a.id','DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
	}

	function editData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('jemaats',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from jemaats where id = $data");
		return $hasil;
	}



}
?>
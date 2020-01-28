<?php 
/**
 * 
 */
class M_pendidikanterakhir extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("pendidikan", $data);
	}

	function get_data_list(){
		$query = $this->db->query("Select * From pendidikan");
		return $query;
	// $this->db->select('*');
 //    $this->db->from('pendidikan');
 //    $this->db->order_by('idx','DESC');
 //    $this->db->limit($limit, $start);
 //    $query = $this->db->get();
 //    return $query->result();
	}
	
	/*function get_data_list($limit, $start){
	$this->db->select('a.id as id, a.nama_lengkap as nama, b.namagereja as namagereja, a.pendidikan as pendidikan ,a.alamat_tinggal as alamat');
    $this->db->from('jemaats a');
    $this->db->join('gereja b','b.id=a.gerejaid','LEFT');
    $this->db->order_by('a.id','DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
	}*/

	function editData($id,$data)
	{
		$this->db->where('idx',$id);
		return $this->db->update('pendidikan',$data);
	}

	function hapusData($data)
	{
		$hasil = $this->db->query("delete from pendidikan where idx = $data");
		return $hasil;
	}



}
?>
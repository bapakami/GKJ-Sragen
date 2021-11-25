<?php 

class M_jemaats extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("pepantans", $data);
	}

	function DataList(){
        // $query = $this->db->query("SELECT * FROM jemaats Where gerejaid = $gerejaid order by id ASC");
        $query = $this->db->select('a.*')
                ->join('pepantans b', 'b.id = a.pepantan_id')
                ->join('gereja c', 'c.id = a.gerejaid')
                ->where('a.status','hidup')
				->where('a.type','1')
				->get('jemaats a');
        return $query;
	}

	function editData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('jemaats',$data);
	}
	
	function hapusData($data)
	{
		$hasil = $this->db->query("delete from pepantans where id = $data");
		return $hasil;
	}



}
?>
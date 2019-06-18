<?php 
/**
 * 
 */
class M_datapersembahan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insertData($data){
		$this->db->insert("persembahans", $data);
	}

	function get_barang_by_kode($id){
		$hsl=$this->db->query("SELECT a.*,b.namagereja FROM persembahans a LEFT JOIN gereja b ON b.id = a.gereja_id WHERE a.id='$id'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id,
					'tgl_persembahan' => $data->tgl_persembahan,
					'mingguan' => $data->mingguan,
					'bulanan' => $data->bulanan,
					'syukur' => $data->syukur,
					'perpuluhan' => $data->perpuluhan,
					'khusus_mirunggan' => $data->khusus_mirunggan,
					'pembangunan' => $data->pembangunan,
					'gereja_id' => $data->gereja_id,
					'namagereja' => $data->namagereja,
					);
			}
		}
		return $hasil;
	}
	function update_data($id,$tgl,$mingguan,$bulanan,$syukur,$perpuluhan,$khusus,$pembangunan,$gereja){
        $hasil=$this->db->query("UPDATE persembahans SET tgl_persembahan='$tgl',mingguan='$mingguan',bulanan='$bulanan',syukur='$syukur',perpuluhan='$perpuluhan',khusus_mirunggan='$khusus',pembangunan='$pembangunan',gereja_id='$gereja' WHERE id='$id'");
        return $hasil;
    }

    function get_data_list($limit, $start){
		$this->db->select('a.id as id_persembahan,a.gereja_id as idgereja,a.tgl_persembahan as tgl,a.mingguan as mingguan,a.bulanan as bulanan,b.namagereja as nama_gereja,a.khusus_mirunggan as khusus,a.perpuluhan as perpuluhan,a.pembangunan as pembangunan,a.syukur as syukur');
	    $this->db->from('persembahans a');
	    $this->db->join('gereja b','b.id=a.gereja_id','LEFT');
	    $this->db->order_by('a.id','DESC');
	    $this->db->limit($limit, $start);
	    $query = $this->db->get();
	    return $query->result();
	}

	function hapus_data($id){
        $hasil=$this->db->query("DELETE FROM persembahans WHERE id='$id'");
        return $hasil;
    }
	function gereja(){
    $this->db->order_by('namagereja','ASC');
    $provinces= $this->db->get('gereja');
    return $provinces->result_array();
    }

	function editData($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('persembahans',$data);
	}

}
?>
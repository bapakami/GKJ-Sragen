<?php 

class M_manajemenaktifan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getPDF($query)
	{
		 
		// for ($i=0; $i < count($gereja); $i++) { 
		// 	if($i = 0){
		// 		$query .= "AND a.gerejaid = $gereja[$i] ";
		// 	}else{
		// 		$query .= "OR a.gerejaid = $gereja[$i] ";
		// 	}

		// }
		// $query .= "order by namagereja";
		
		// echo "".$query;
		 $hasil=$this->db->query("$query");
		 // print_r($query);
		 // die();
		 return $hasil->result();
	}
	
	function getNamaGereja($gereja)
	{
		
		 $hasil=$this->db->query("Select namagereja from gereja where id=$gereja");	 
		 return $hasil->result();
	}
}
?>
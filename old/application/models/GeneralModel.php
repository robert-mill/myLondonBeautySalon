<?php
class GeneralModel extends CI_Model{
	
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		/*parent::Model();
		$this->load->database();
		$query = $this->db->get('mlbs_services_category');
		return $query->result();
		*/
		public function getPageText($page){
			$query = $this->db->query('call pageText("'.$page.'")');
			mysqli_next_result($this->db->conn_id);
			return $query->result();
		}
		
		
}
?>
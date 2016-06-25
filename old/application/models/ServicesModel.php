<?php
class ServicesModel extends CI_Model{
	
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		/*parent::Model();
		$this->load->database();
		$query = $this->db->get('mlbs_services_category');
		return $query->result();
		*/
		public function getData(){
			$query = $this->db->query('call all_items_and_courses()');
			mysqli_next_result($this->db->conn_id);
			return $query->result();
		}
		public function getMenu(){
			$result = $this->db->query('call menuList()');
			mysqli_next_result($this->db->conn_id);
			return $result->result();
		}
		
}
?>
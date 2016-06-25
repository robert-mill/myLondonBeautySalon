<?php
class Manipulation_model extends CI_Model {
	public function __construct(){
        $this->load->database();
    }
	public function get_categories($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null){
		$this->db->select('*');
		$this->db->from('mlbs_services_category');
		if($search_string){
			$this->db->like('title', $search_string);
		}
		$this->db->group_by('id');
		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}
		if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }
		$query = $this->db->get();
		
		return $query->result_array(); 
	}
	public function get_item_by_id($id){
		$query = $this->db->query('call items_and_courses('.$id.')');
		echo 'UPloaded';
			mysqli_next_result($this->db->conn_id);
		return $query->result();
    }
	public function add_image($dataIn){
		echo $dataIn;
		$query = $this->db->query('call addImageToItems('.$dataIn.')');
		mysqli_next_result($this->db->conn_id);
		return $query->result();
	}
	public function get_items($category_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end){
		if( $category_id != null && $category_id !=0 ){
			
			$query = $this->db->query('call items_and_courses('.$category_id.')');
			mysqli_next_result($this->db->conn_id);
			return $query->result();
			
		}else{
			$query = $this->db->query('call all_items_and_courses()');
			mysqli_next_result($this->db->conn_id);
			return $query->result();
		}
	}
	public function new_courses($data){
		$query = $this->db->query('call addNewCourse_sproc('.$data.'  )');
		mysqli_next_result($this->db->conn_id);
		return $query->num_rows();
	}

	public function get_courses($course_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end){
		if( $course_id != null && $course_id !=0 ){
			$query = $this->db->query('call getCourseFilter('.$course_id.')');
			mysqli_next_result($this->db->conn_id);
		}else{
			$query = $this->db->query('call getCourses()');
			mysqli_next_result($this->db->conn_id);
			return $query->result();
		}
	}
	public function delete_course($id){	

		$query = $this->db->query('call removeCourse('.$id.')');
		mysqli_next_result($this->db->conn_id);
		return $query->num_rows();	
	}
	public function get_courses_array($course_id){
		
			$query = $this->db->query('call getServicesArray_sproc('.$course_id.')');
			mysqli_next_result($this->db->conn_id);
			return $query->result();
	}	
	
	
	public function get_courses_by_id($id){
		$query = $this->db->query('call getCourses_by_id('.$id.')');
			mysqli_next_result($this->db->conn_id);
		return $query->result();
	}
	
	public function add_item($data){
		$query = $this->db->query('call itemsAdd_sproc('.$data.'  )');
		mysqli_next_result($this->db->conn_id);
		return $query->num_rows();
	}
	
	public function update_course(){
		$query = $this->db->query('call courseUpdate_sproc('.$id.','.$data.'  )');
			mysqli_next_result($this->db->conn_id);
		return $query->num_rows();
	}
	
	
	public function update_item($id, $data){	
	
		
		//$this->db->where('id', $id);
		//$this->db->update('mlbs_services_category', $data);
		$query = $this->db->query('call itemspdater_sproc('.$id.','.$data.'  )');
			mysqli_next_result($this->db->conn_id);
		//echo $query->num_rows()
		return $query->num_rows();
		
		//$report = array();
	//	$report['error'] = $this->db->_error_number();
	////	$report['message'] = $this->db->_error_message();
	//	if($report !== 0){
	//		return true;
	//	}else{
	//		return false;
	//	}
	}
	
	function count_items($category_id=null, $search_string=null, $order=null){
		if( $category_id != null && $category_id !=0 ){
			$query = $this->db->query('call servicesMoreUpdate('.$id.')');
			mysqli_next_result($this->db->conn_id);
			return $query->num_rows();
		}else{
			$query = $this->db->query('call servicesMore()');
			mysqli_next_result($this->db->conn_id);
			return $query->num_rows();
		}
		
	}

	function delete_item($id){
			$query = $this->db->query('call removeItem('.$id.')');
			mysqli_next_result($this->db->conn_id);
			return $query->num_rows();	
		
		//$this->db->where('id', $id);
		//$this->db->delete('mlbs_item_title'); 
	}
	
	
	
	
}	
?>
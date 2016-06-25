<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_services extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_table() {
		$table = "mlbs_services";
		return $table;
	}
       
        
        function getService($cid){ 
                $mysql_query = "SELECT 
                    mlbs_categories.id as cids,
                    mlbs_categories.title as head,
                    mlbs_services.id,
                    mlbs_services.title as title, 
                    mlbs_services.description,
                    mlbs_services.image,
                    mlbs_services.price,
                    mlbs_services.discount_price,
                    mlbs_services.time as time,
                     mlbs_options.description, 
                     mlbs_options.price,
                     mlbs_options.promotional_price,
                     mlbs_options.id as cid          
                    FROM mlbs_services 
                    LEFT JOIN mlbs_categories ON  mlbs_services.cat_id = mlbs_categories.id
                    LEFT JOIN mlbs_options  ON mlbs_options.service_id_fk = mlbs_services.id
                    
                    WHERE mlbs_categories.id = ".$cid;
               return $this->_custom_query($mysql_query);
              
        }
        function getAllHold($order_by) {
		$data=[];
                $mysql_query = "SELECT 
                    mlbs_categories.id as cids,
                    mlbs_categories.title as head,
                    mlbs_services.id,
                    mlbs_services.title as title, 
                    mlbs_services.description,
                    mlbs_services.image,
                    mlbs_services.price,
                    mlbs_services.discount_price,
                    mlbs_services.time as time,
                     mlbs_courses.title_desc as course, 
                     mlbs_courses.course_price,
                     mlbs_courses.course_discount_price,
                     mlbs_courses.id as cid          
                    FROM mlbs_services 
                    LEFT JOIN mlbs_categories ON  mlbs_services.cat_id = mlbs_categories.id
                    LEFT OUTER JOIN mlbs_courses ON  mlbs_courses.service_id_fk = mlbs_services.id";
		return $this->_custom_query($mysql_query);
	}
        
	function get($order_by) {
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$table = $this->get_table();
		$this->db->limit($limit, $offset);
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}

	function get_where($id) {
		$table = $this->get_table();
		$this->db->where('id', $id);
		$query=$this->db->get($table);
		return $query;
	}

	function get_where_custom($col, $value) {
		$table = $this->get_table();
		$this->db->where($col, $value);
		$query=$this->db->get($table);
		return $query;
	}

	function _insert($data) {
		$table = $this->get_table();
		$this->db->insert($table, $data);
	}

	function _update($id, $data) {
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

	function _delete($id) {
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

	function count_where($column, $value) {
		$table = $this->get_table();
		$this->db->where($column, $value);
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function count_all() {
		$table = $this->get_table();
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function get_max() {
		$table = $this->get_table();
		$this->db->select_max('id');
		$query = $this->db->get($table);
		$row=$query->row();
		$id=$row->id;
		return $id;
	}
        function get_cats(){
            $data=[];
           return   $data['categories']= Modules::run("Categories/getAllCategories",$data);
           //return $data;
       }
	function _call_all_sproc() {
		$sprocall = "call all_items_and_courses_2()";
		$query = $this->db->query($sprocall);
		return $query;
	}
        
        function _call_by_id_sproc($cid){
           
            $sprocById = "call all_items_and_courses_by_cat2($cid)";
            $query = $this->db->query($sprocById);
           
	    return $query;
        }
        
	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}

}
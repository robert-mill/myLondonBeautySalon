<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_categories extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_table() {
		$table = "mlbs_categories";
		return $table;
	}
        function getAllCategories(){
            $table = $this->get_table();
            $order_by="id";
            $query=$this->db->get($table);
            $this->db->order_by($order_by);
            return $query->result_array();
        }
         function getCurrentCategories(){
             $mysql_query = "SELECT 
                        mlbs_categories.id,
                        mlbs_categories.title as head
                    FROM 
			mlbs_services 
                    LEFT JOIN mlbs_categories ON
                        mlbs_services.cat_id = mlbs_categories.id
                    LEFT OUTER JOIN mlbs_courses ON
                        mlbs_courses.service_id_fk = mlbs_services.id
                    GROUP BY mlbs_categories.title";
            return $this->_custom_query($mysql_query)->result_array();
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
	function _call_all_sproc() {
		$sprocall = "call all_items_and_courses()";
		$query = $this->db->query($sprocall);
		return $query;
	}
	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}

}
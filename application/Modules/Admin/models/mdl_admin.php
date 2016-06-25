<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_admin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "tasks";
        return $table;
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
        //$table = $this->get_table();
        
        $query = $this->db->query("call itemspdater_sproc($data)");
        //$this->db->where('id', $id);
        //$this->db->update($table, $data);
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
        $query = $this->db->query("call all_items_and_courses()");
        return $query->result_array();
    }
    function _call_item_by_id_sproc($id){
        
        $query = $this->db->query("call items_and_courses($id)");
        return $query->result_array();
    }
    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }
    function get_all_categories(){
         $table = 'mlbs_services_category';
         $this->db->select('*');
        $query = $this->db->get($table);
        return $query; 
        
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

}
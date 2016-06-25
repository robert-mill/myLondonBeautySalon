<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends MX_Controller{
	function __construct() {
		parent::__construct();
	}
	public function index(){	
		$this->load->model("Mdl_categories");
		$data['query'] = $this->_call_all_sproc();
		$data["res"]="adasd";
		$data['module'] = "tasks";
		$data['view_file'] = "display";

		echo Modules::run('templates/main_page', $data);
		
		
	}
        function getCurrentCategories(){
         $this->load->model("Mdl_categories"); 
            $query = $this->Mdl_categories->getCurrentCategories();
            return $query;
        }
         function getAllCategories(){
            $this->load->model("Mdl_categories"); 
            $query = $this->Mdl_categories->getAllCategories();

            return $query;
        }
	function get($order_by) {
		$this->load->model("Mdl_categories");
		$query = $this->Mdl_categories->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model("Mdl_categories");
		$query = $this->Mdl_categories->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model("Mdl_categories");
		$query = $this->Mdl_categories->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model("Mdl_categories");
		$query = $this->Mdl_categories->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model("Mdl_categories");
		$this->Mdl_categories->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model("Mdl_categories");
		$this->Mdl_categories->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model("Mdl_categories");
		$this->Mdl_categories->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_categories');
		$count = $this->Mdl_categories->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model("Mdl_categories");
		$max_id = $this->Mdl_categories->get_max();
		return $max_id;
	}
	function _call_all_sproc(){
		$this->load->model("Mdl_categories");
		$sprocall = "call all_items_and_courses()";
		$query = $this->Mdl_categories->_call_all_sproc($sprocall);
		return $query;
	}
	function _custom_query($mysql_query) {
		$this->load->model("Mdl_categories");

		$query = $this->Mdl_categories->_custom_query($mysql_query);
		return $query;
	}

}
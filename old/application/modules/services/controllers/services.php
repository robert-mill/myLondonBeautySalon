<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Services extends MX_Controller{
	function __construct() {
		parent::__construct();
	}
	public function index(){	
		$this->load->model("mdl_services");
		$data['query'] = $this->_call_all_sproc();
		$data["res"]="adasd";
		$data['module'] = "services";
		$data['view_file'] = "display";

		echo Modules::run('templates/main_page', $data);
		
		
	}
	function get($order_by) {
		$this->load->model('mdl_services');
		$query = $this->mdl_services->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('mdl_services');
		$query = $this->mdl_services->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('mdl_services');
		$query = $this->mdl_services->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('mdl_services');
		$query = $this->mdl_services->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('mdl_services');
		$this->mdl_services->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('mdl_services');
		$this->mdl_services->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('mdl_services');
		$this->mdl_services->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('mdl_services');
		$count = $this->mdl_services->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('mdl_services');
		$max_id = $this->mdl_services->get_max();
		return $max_id;
	}
	function _call_all_sproc(){
		$this->load->model('mdl_services');
		$sprocall = "call all_items_and_courses()";
		$query = $this->mdl_services->_call_all_sproc($sprocall);
		return $query;
	}
	function _custom_query($mysql_query) {
		$this->load->model('mdl_services');

		$query = $this->mdl_services->_custom_query($mysql_query);
		return $query;
	}

}
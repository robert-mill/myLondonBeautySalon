<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MX_Controller{
	function __construct() {
		parent::__construct();
	}
	public function index(){
		$this->load->model("Mdl_home");
		$data['query'] = $this->get('title');
		$data["res"]="adasd";
		$data['module'] = "Home";
		$data['view_file'] = "Display";
                echo Modules::run('Templates/home_page', $data);
		
		
	}
	function get($order_by) {
		$this->load->model('Mdl_home');
		$query = $this->Mdl_home->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_home');
		$query = $this->Mdl_home->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_home');
		$query = $this->Mdl_home->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_home');
		$query = $this->Mdl_home->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_home');
		$this->Mdl_home->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_home');
		$this->Mdl_home->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_home');
		$this->Mdl_home->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_home');
		$count = $this->Mdl_home->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_home');
		$max_id = $this->Mdl_home->get_max();
		return $max_id;
	}
	function _call_all_sproc(){
		$this->load->model('Mdl_home');
		$sprocall = "call all_items_and_courses()";
		$query = $this->Mdl_home->_call_all_sproc($sprocall);
		return $query;
	}
	function _custom_query($mysql_query) {
		$this->load->model('Mdl_home');

		$query = $this->Mdl_home->_custom_query($mysql_query);
		return $query;
	}

}
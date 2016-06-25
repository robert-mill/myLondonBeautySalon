<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
class About extends MX_Controller{
	function __construct() {
		parent::__construct();
	}
	public function index(){
		$this->load->model("Mdl_about");
		$data['query'] = $this->get('title');
		$data["res"]="adasd";
		$data['module'] = "About";
		$data['view_file'] = "Display";
                echo Modules::run('Templates/main_page', $data);
		
		
	}
	function get($order_by) {
		$this->load->model('Mdl_about');
		$query = $this->Mdl_about->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_about');
		$query = $this->Mdl_about->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_about');
		$query = $this->Mdl_about->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_about');
		$query = $this->Mdl_about->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_about');
		$this->Mdl_about->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_about');
		$this->Mdl_about->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_about');
		$this->Mdl_about->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_about');
		$count = $this->Mdl_about->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_about');
		$max_id = $this->Mdl_about->get_max();
		return $max_id;
	}
	function _call_all_sproc(){
		$this->load->model('Mdl_about');
		$sprocall = "call all_items_and_courses()";
		$query = $this->Mdl_about->_call_all_sproc($sprocall);
		return $query;
	}
	function _custom_query($mysql_query) {
		$this->load->model('Mdl_about');

		$query = $this->Mdl_about->_custom_query($mysql_query);
		return $query;
	}

}
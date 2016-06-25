<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends MX_Controller{
	function __construct() {
		parent::__construct();
	}
	public function index(){
		$this->load->model("Mdl_contact");
		$data['query'] = $this->get('title');
		$data["res"]="adasd";
		$data['module'] = "Contact";
		$data['view_file'] = "Display";
                echo Modules::run('Templates/main_page', $data);
		
		
	}
	function get($order_by) {
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_contact');
		$count = $this->Mdl_contact->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_contact');
		$max_id = $this->Mdl_contact->get_max();
		return $max_id;
	}
	function _call_all_sproc(){
		$this->load->model('Mdl_contact');
		$sprocall = "call all_items_and_courses()";
		$query = $this->Mdl_contact->_call_all_sproc($sprocall);
		return $query;
	}
	function _custom_query($mysql_query) {
		$this->load->model('Mdl_contact');

		$query = $this->Mdl_contact->_custom_query($mysql_query);
		return $query;
	}

}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Options extends MX_Controller{
	function __construct() {
		parent::__construct();
	}
	public function index(){	
		$this->load->model("Mdl_options");
		$data['query'] = $this->_call_all_sproc();
		$data["res"]="adasd";
		$data['module'] = "tasks";
		$data['view_file'] = "display";

		echo Modules::run('templates/main_page', $data);
		
		
	}
        function getCurrentOptions(){
         $this->load->model("Mdl_options"); 
            $query = $this->Mdl_options->getCurrentOptions();
            return $query;
        }
        function getAll(){
            $this->load->model("Mdl_options"); 
            $query = $this->Mdl_options->getAllOptions();
            return $query;
        }
        
        
	function get($order_by) {
		$this->load->model("Mdl_options");
		$query = $this->Mdl_options->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model("Mdl_options");
		$query = $this->Mdl_options->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model("Mdl_options");
		$query = $this->Mdl_options->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model("Mdl_options");
		$query = $this->Mdl_options->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model("Mdl_options");
		$this->Mdl_options->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model("Mdl_options");
		$this->Mdl_options->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model("Mdl_options");
		$this->Mdl_options->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_options');
		$count = $this->Mdl_options->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model("Mdl_options");
		$max_id = $this->Mdl_options->get_max();
		return $max_id;
	}
	
	function _custom_query($mysql_query) {
		$this->load->model("Mdl_options");

		$query = $this->Mdl_options->_custom_query($mysql_query);
		return $query;
	}

}
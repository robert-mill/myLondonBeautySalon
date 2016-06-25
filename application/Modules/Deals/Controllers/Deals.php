<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Deals extends MX_Controller{
	function __construct() {
		parent::__construct();
	}
	public function index(){	
		$this->load->model("Mdl_deals");
		$data['query'] = $this->_call_all_sproc();
		$data["res"]="adasd";
		$data['module'] = "Deals";
		$data['view_file'] = "Display";

		echo Modules::run('templates/main_page', $data);
		
		
	}
        function getCurrentDeals(){
         $this->load->model("Mdl_deals"); 
            $query = $this->Mdl_deals->getCurrentDeals();
            return $query;
        }
        function getAll(){
            $this->load->model("Mdl_deals"); 
            $query = $this->Mdl_deals->getAll();
            return $query;
        }
        function _call_all_sproc() {
        $this->load->model("Mdl_deals");
        $query = $this->Mdl_deals->_call_all_sproc();
        return $query;
        }
        
	function get($order_by) {
		$this->load->model("Mdl_deals");
		$query = $this->Mdl_deals->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model("Mdl_deals");
		$query = $this->Mdl_deals->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model("Mdl_deals");
		$query = $this->Mdl_deals->get_where($id);
		return $query;
	}
        function getbyfk($sid){
            echo 'ghgghhhghgh'.$cid;
           $this->load->model("Mdl_deals");
           $query = $this->Mdl_deals->getbyfk($cid);
	   return $query;
        }
	function get_where_custom($col, $value) {
		$this->load->model("Mdl_deals");
		$query = $this->Mdl_deals->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model("Mdl_deals");
		$this->Mdl_deals->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model("Mdl_deals");
		$this->Mdl_deals->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model("Mdl_deals");
		$this->Mdl_deals->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_deals');
		$count = $this->Mdl_deals->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model("Mdl_deals");
		$max_id = $this->Mdl_deals->get_max();
		return $max_id;
	}
	
	function _custom_query($mysql_query) {
		$this->load->model("Mdl_deals");

		$query = $this->Mdl_deals->_custom_query($mysql_query);
		return $query;
	}

}
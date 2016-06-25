<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Perfectcontroller extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get($order_by) {
$this->load->model('mdl_perfectmodel');
$query = $this->mdl_perfectmodel->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_perfectmodel');
$query = $this->mdl_perfectmodel->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('mdl_perfectmodel');
$query = $this->mdl_perfectmodel->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_perfectmodel');
$query = $this->mdl_perfectmodel->get_where_custom($col, $value);
return $query;
}

function _insert($data) {
$this->load->model('mdl_perfectmodel');
$this->mdl_perfectmodel->_insert($data);
}

function _update($id, $data) {
$this->load->model('mdl_perfectmodel');
$this->mdl_perfectmodel->_update($id, $data);
}

function _delete($id) {
$this->load->model('mdl_perfectmodel');
$this->mdl_perfectmodel->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_perfectmodel');
$count = $this->mdl_perfectmodel->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_perfectmodel');
$max_id = $this->mdl_perfectmodel->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_perfectmodel');
$query = $this->mdl_perfectmodel->_custom_query($mysql_query);
return $query;
}

}
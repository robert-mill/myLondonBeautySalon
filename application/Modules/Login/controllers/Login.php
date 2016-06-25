<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MX_Controller
{

function __construct() {
    parent::__construct();
}
function index(){
    if($this->session->userdata('is_logged_in')){
                    $this->load->view('login');
    }else{
            $this->load->view('login');	
    }
}
function __encrip_password($password) {
        return md5($password);
    }
function validate_credentials(){
    $this->load->model('Mdl_loginmodel');

    $user_name = $this->input->post('user_name');
    $password = $this->__encrip_password($this->input->post('password'));
    $is_valid = $this->Mdl_loginmodel->validate($user_name,$password);
    if($is_valid){
            $data = array(
                    'user_name' => $user_name,
                    'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('Mlbs_services');
    }else{
            $data['message_error'] = TRUE;
           // echo $user_name . " " . $password .$is_valid; 
            $this->load->view('login', $data);	
    }
}

function get($order_by) {
$this->load->model('Mdl_loginmodel');
$query = $this->Mdl_loginmodel->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('Mdl_loginmodel');
$query = $this->Mdl_loginmodel->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('Mdl_loginmodel');
$query = $this->Mdl_loginmodel->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('Mdl_loginmodel');
$query = $this->Mdl_loginmodel->get_where_custom($col, $value);
return $query;
}

function _insert($data) {
$this->load->model('Mdl_loginmodel');
$this->Mdl_loginmodel->_insert($data);
}

function _update($id, $data) {
$this->load->model('Mdl_loginmodel');
$this->Mdl_loginmodel->_update($id, $data);
}

function _delete($id) {
$this->load->model('Mdl_loginmodel');
$this->Mdl_loginmodel->_delete($id);
}

function count_where($column, $value) {
$this->load->model('Mdl_loginmodel');
$count = $this->Mdl_loginmodel->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('Mdl_loginmodel');
$max_id = $this->Mdl_loginmodel->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('Mdl_loginmodel');
$query = $this->Mdl_loginmodel->_custom_query($mysql_query);
return $query;
}

}
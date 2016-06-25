<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_courses extends MX_Controller
{

function __construct() {
    parent::__construct();
    }
    public function index(){
            $this->load->model("mdl_mlbs_courses");
            $data['query'] = $this->mdl_mlbs_courses->get('id');
            
            $data['module'] = "mlbs_courses";
            $data['view_file'] = "display";
        echo Modules::run('templates/admin', $data);


    }
    function get_courses($id){
        $this->load->model('mdl_mlbs_courses');
        $query = $this->mdl_mlbs_courses->get_where($id);
        return $query;
    }
    function create(){
            $update_id = $this->uri->segment(3);
            if(!is_numeric($update_id)){
                    $update_id = $this->input->post('update_id',TRUE);
            }
            if(is_numeric($update_id) ){
                    $data = $this->get_data_from_db($update_id);
                    $data['update_id'] = $update_id;
            }else{
                    $data = $this->get_data_from_post();
            }

            $data['module']="mlbs_courses";
            $data['view_file'] = "form";

            echo Modules::run('templates/admin',$data);
    }
    function get_data_from_post(){
            $data['cat_id'] =$this->input->post('cat_id', TRUE);
            $data['title'] =$this->input->post('title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['time'] = $this->input->post('time', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['discount_price'] = $this->input->post('discount_price', TRUE);
            $data['image'] = $this->input->post('image', TRUE);
            return $data;
    }
    function get_data_from_db($update_id){
            $query = $this->get_where($update_id);
            foreach($query->result() as $row){
                    $data['id'] = $row->id;
                    $data['cat_id'] = $row->cat_id;
                    $data['title'] = $row->title;
                    $data['description'] = $row->description;
                    $data['time'] = $row->time;
                    $data['price'] = $row->price;
                    $data['discount_price'] = $row->discount_price;
                    $data['image'] = $row->image;
            }
            return $data;
    }
    function submit(){
            if($this->load->library('form_validation')){
                    echo 'validating';
            }else{
                    echo 'Not loaded';

            }
            $this->form_validation->set_rules('title','Title', 'required|min_length[3]');
            $update_id = $this->input->post('update_id',TRUE);
            if($this->form_validation->run()==FALSE){
                    $this->create();
                    //$this->load->view('myform');
            }else{
                    $data = $this->get_data_from_post();
                    if(is_numeric($update_id)){
                            $this->_update($update_id,$data);
                    }else{
                            $this->_insert($data);
                    }
                    redirect("services");
            }
    }
    
    
    function get($order_by) {
        $this->load->model('mdl_mlbs_courses');
        $query = $this->mdl_mlbs_courses->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_mlbs_courses');
        $query = $this->mdl_mlbs_courses->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_mlbs_courses');
        $query = $this->mdl_mlbs_courses->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_mlbs_courses');
        $query = $this->mdl_mlbs_courses->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_mlbs_courses');
        $this->mdl_mlbs_courses->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_mlbs_courses');
        $this->mdl_mlbs_courses->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_mlbs_courses');
        $this->mdl_mlbs_courses->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_mlbs_courses');
        $count = $this->mdl_mlbs_courses->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_mlbs_courses');
        $max_id = $this->mdl_mlbs_courses->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_mlbs_courses');
        $query = $this->mdl_mlbs_courses->_custom_query($mysql_query);
        return $query;
    }

}
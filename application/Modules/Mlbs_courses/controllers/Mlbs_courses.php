<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_courses extends MX_Controller
{

function __construct() {
    parent::__construct();
    }
    public function index(){
            $this->load->model("Mdl_mlbs_courses");
            $data['query'] = $this->Mdl_mlbs_courses->get('id');
            
            $data['module'] = "Mlbs_courses";
            $data['view_file'] = "display";
        echo Modules::run('templates/admin', $data);


    }
    function get_courses($id){
        $this->load->model('Mdl_mlbs_courses');
        $query = $this->Mdl_mlbs_courses->get_where($id);
        return $query;
    }
    function create(){
            $update_id = $this->uri->segment(3);
            if(!is_numeric($update_id)){
                    $update_id = $this->input->post('service_id_fk',TRUE);
            }
            if(is_numeric($update_id) ){
                    $data = $this->get_data_from_db($update_id);
                    $data['service_id_fk'] = $update_id;
                    
            }else{
               
                    $data = $this->get_data_from_post();
            }
            
            $this->load->model("Mdl_mlbs_courses");
            $data['module']="Mlbs_courses";
            $data['view_file'] = "form";

            echo Modules::run('Templates/admin',$data);
            
           
            
            
            
    }
    function get_data_from_post(){
            $data['service_id_fk'] =$this->input->post('service_id_fk', TRUE);
            $data['title_desc'] =$this->input->post('title_desc', TRUE);
            $data['course_price'] = $this->input->post('course_price', TRUE);
            $data['course_discount_price'] = $this->input->post('course_discount_price', TRUE);
            return $data;
    }
    function get_data_from_db($update_id){
            $query = $this->get_where($update_id);
            $data=[];
            foreach($query->result() as $row){
                    $data['id'] = $row->id;
                    $data['service_id_fk'] = $row->service_id_fk; 
                    $data['title_desc'] = $row->title_desc;
                    $data['course_price'] = $row->course_price;
                    $data['course_discount_price'] = $row->course_discount_price;
            }
            return $data;
    }
    function submit(){
            if($this->load->library('form_validation')){
                    //echo 'validating';
            }else{
                   // echo 'Not loaded';
            }
            $this->form_validation->set_rules('title_desc','Title_desc', 'required|min_length[3]');
            $update_id = $this->input->post('update',TRUE);
            if($this->form_validation->run()==FALSE){
                    $this->create();
                    
                    //$this->load->view('myform');
            }else{
                    $data = $this->get_data_from_post();
                    if(is_numeric($update_id)){
                            $this->_update($update_id,$data);
                            redirect("Mlbs_courses/create");
                    }else{
                        
                            $this->_insert($data);
                            redirect("Mlbs_courses/create");
                    }
                    
            }
    }
    
    
    function get($order_by) {
        $this->load->model('Mdl_mlbs_courses');
        $query = $this->Mdl_mlbs_courses->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('Mdl_mlbs_courses');
        $query = $this->Mdl_mlbs_courses->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('Mdl_mlbs_courses');
        $query = $this->Mdl_mlbs_courses->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('Mdl_mlbs_courses');
        $query = $this->Mdl_mlbs_courses->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('Mdl_mlbs_courses');
        $this->Mdl_mlbs_courses->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('Mdl_mlbs_courses');
        $this->Mdl_mlbs_courses->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('Mdl_mlbs_courses');
        $this->Mdl_mlbs_courses->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('Mdl_mlbs_courses');
        $count = $this->Mdl_mlbs_courses->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('Mdl_mlbs_courses');
        $max_id = $this->Mdl_mlbs_courses->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('Mdl_mlbs_courses');
        $query = $this->Mdl_mlbs_courses->_custom_query($mysql_query);
        return $query;
    }

}
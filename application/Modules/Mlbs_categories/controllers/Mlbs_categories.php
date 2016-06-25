<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_categories extends MX_Controller
{

function __construct() {
    parent::__construct();
    }
    public function index(){
            if(!$this->session->userdata('is_logged_in')){
                redirect('Login');
            } 
        $this->load->model("Mdl_mlbs_categories");
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_categories";
            $data['query'] = $this->Mdl_mlbs_categories->get('id');
            $data['categories']= Modules::run("Mlbs_categories/getAllCategories",$data);
            
            $data['view_file'] = "Display";
            echo Modules::run('Templates/admin', $data);
    }
    function add(){
        $data['module'] = "Mlbs_categories";
         $data['view_file'] = "DisplayAdd";
            echo Modules::run('Templates/admin', $data);
    }
    function edit_category(){
        $data = $this->get_data_from_post();
        $id = $data['id'];
        $this->_update($id, $data);
        $page = "/Mlbs_categories"; 
        redirect($page);
        
        
    }
    function process(){
        $data = $this->get_data_from_post();
        $update_string= $this->uri->segment(3);
        $updateId = $this->uri->segment(4);
        $page = "Mlbs_categories";
        if($update_string==="add_category"){
            $this->_insert($data);
            redirect($page); 
        }
        if($update_string==="edit"){
           $this->editCat($updateId);
        }
        if($update_string==="delete"){
           $this->_delete($updateId); 
           redirect($page); 
        }
    }
    function editCat($id){
            $data["query"] = $this->get_data_from_db($id);
            $data['module'] = "Mlbs_categories";
            $data['view_file'] = "DisplayEdit";
            echo Modules::run('Templates/admin', $data);
        
    }
    function getAllCategories(){
       $this->load->model('mdl_mlbs_categories'); 
       $query = $this->mdl_mlbs_categories->getAllCategories();
       
       return $query;
    }
    function get_categories($id){
        $this->load->model('mdl_mlbs_categories');
        $query = $this->mdl_mlbs_categories->get_where($id);
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

            $data['module']="mlbs_categories";
            $data['view_file'] = "form";

            echo Modules::run('templates/admin',$data);
    }
    function get_data_from_post(){
            $data['id'] = $this->input->post('id', TRUE);
            $data['title'] = $this->input->post('title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);            
            return $data;
    }
    function get_data_from_db($update_id){
            $query = $this->get_where($update_id);
            foreach($query->result() as $row){
                    $data['id'] = $row->id;                   
                    $data['title'] = $row->title;
                    $data['description'] = $row->description;
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
        $this->load->model('mdl_mlbs_categories');
        $query = $this->mdl_mlbs_categories->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_mlbs_categories');
        $query = $this->mdl_mlbs_categories->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_mlbs_categories');
        $query = $this->mdl_mlbs_categories->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_mlbs_categories');
        $query = $this->mdl_mlbs_categories->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_mlbs_categories');
        $this->mdl_mlbs_categories->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_mlbs_categories');
        $this->mdl_mlbs_categories->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_mlbs_categories');
        $this->mdl_mlbs_categories->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_mlbs_categories');
        $count = $this->mdl_mlbs_categories->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_mlbs_categories');
        $max_id = $this->mdl_mlbs_categories->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_mlbs_categories');
        $query = $this->mdl_mlbs_categories->_custom_query($mysql_query);
        return $query;
    }

}
<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_services extends MX_Controller
{

function __construct() {
    parent::__construct();
    }
    public function index(){
           // $this->load->model("Mlbs_categories/Mdl_mlbs_categories");
        
                if(!$this->session->userdata('is_logged_in')){
                    redirect('Login');
                }
            
            $this->load->model("Mdl_mlbs_services");
            $data['query'] = $this->Mdl_mlbs_services->get('id');
            $data['categories']=$this->Mdl_mlbs_services->get_cats();
         
            $i=0;
            foreach($data['query']as $ky=>$vl){
               $datac = $this->getCourses($vl['id']);
               
               if(count($datac)>1){
                    $data['courses'][$i]= $datac;
                   
               }else{
                    $data['courses'][$i]= [];
               }
               
               
               $i++;
            }
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_services";
            $data['view_file'] = "display";
            echo Modules::run('Templates/admin', $data);


    }
    function process(){
     $update_id = $this->uri->segment(3);
     $data = $this->get_data_from_post();
        
      if($update_id=='upload_img'){
        $this->getimg($data);    
      }
      if($this->input->post('addImage',TRUE)){
         $this->getimg($data);
        
      }
      if($this->input->post('submitForm',TRUE)){
         $this->submit(); 
      }
      if($this->input->post('save_file',TRUE)){
          if($this->_update($data['id'] , $data)){
                $data['data']=$data;
                $data['courses'] = $this->getCourses($data['id']);
                $data['module'] = "mlbs_services";
                $data['view_file'] = "success";
              echo Modules::run('templates/admin', $data);
              
          }else{
              echo 'oops';
              
          }
                  
          
      }
      
    }
    function getimg($data){
       $dat = $this->get_data_from_post();
       $config['upload_path']= "./assets/uploaded_images";
       $config['allowed_types']= 'jpg|jpeg|JPG|JPEG|PNG|png|gif|GIF';
       $this->load->library("upload",$config);
       if(!$this->upload->do_upload()){
           $data['errors'] = array('error'=>$this->upload->display_errors());
           $this->load->view("imgfold",$dat);
       }else{
           $data['file_data'] = $this->upload->data();
           foreach($dat as $key=>$val){
             $data["'".$key."'"] = "'".$val."'";
           }
       }
        $this->load->view("imgfold",$data);
    }
    function create(){
            $data=[];
            Modules::run("Mlbs_categories/getAllCategories",$data);
            $update_id = $this->uri->segment(3);
            if(!is_numeric($update_id )){
                    $update_id = $this->input->post('id',TRUE);
            }
            if(is_numeric($update_id) ){
                    $data = $this->get_data_from_db($update_id);
                    $data['id'] = $update_id;
            }else{
                    $data = $this->get_data_from_post();
            }
            $data['categories']= Modules::run("mlbs_categories/getAllCategories",$data);
            $this->load->model("Mdl_mlbs_services");
            $data['module']="Mlbs_services";
            $data['view_file'] = "form";
            echo Modules::run('Templates/admin',$data);
    }
    function get_data_from_post(){
            $data['id'] =$this->input->post('id', TRUE);
            $data['cat_id'] =$this->input->post('cat_id', TRUE);
            $data['title'] =$this->input->post('title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['time'] = $this->input->post('time', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['discount_price'] = $this->input->post('discount_price', TRUE);
            $data['image'] = $this->input->post('image', TRUE);
            $data['cat_id'] = $this->input->post('cat_id', TRUE);
            return $data;
    }
    function get_data_from_db($update_id){
            $update_id = $this->uri->segment(3);
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
                    $data['cat_id'] = $row->cat_id;
                    $data['courses'] = $this->getCourses($data['id']);
                    
                    
            }
            return $data;
    }
    function delete_service(){
       $delete_id = $this->uri->segment(3); 
       $this->_delete($delete_id);
       redirect("mlbs_services");
    }
    function delete_image(){
       
        $update_id = $this->uri->segment(3);
        $query = $this->get_where($update_id);
            foreach($query->result() as $row){
                    $data['id'] = $row->id;
                    $data['cat_id'] = $row->cat_id;
                    $data['title'] = $row->title;
                    $data['description'] = $row->description;
                    $data['time'] = $row->time;
                    $data['price'] = $row->price;
                    $data['discount_price'] = $row->discount_price;
                    $data['image'] = "";
                    //$data['courses'] = $this->getCourses($data['id']);
                    
            }
            
        $this->_update($update_id , $data);
        redirect("mlbs_services");
    }
    function get_cats(){
         $data=[];
               $this->load->model('mdl_mlbs_services');
            $data = $this->mdl_mlbs_services->get_cats();
         
         //return Modules::run("Mlbs_categories/getAllCategories",$data);
        return $data;
    }
    function getCourses($id){
        $this->load->model("Mdl_mlbs_services");
        $query = $this->Mdl_mlbs_services->get_courses($id);
        return $query;
    }
    function submit(){            
            $this->form_validation->set_rules('title','Title', 'required|min_length[3]');
            $update_id = $this->input->post('id',TRUE);
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
                    redirect("mlbs_services");
            }
    }
    
    function get($order_by) {
        $this->load->model('mdl_mlbs_services');
        $query = $this->mdl_mlbs_services->get($order_by);
        
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_mlbs_services');
        $query = $this->mdl_mlbs_services->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_mlbs_services');
        $query = $this->mdl_mlbs_services->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_mlbs_services');
        $query = $this->mdl_mlbs_services->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_mlbs_services');
        $this->mdl_mlbs_services->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_mlbs_services');
       if($this->mdl_mlbs_services->_update($id, $data)){
           return true;
       }else{
           return false;
       }
    }

    function _delete($id) {
        $this->load->model('mdl_mlbs_services');
        $this->mdl_mlbs_services->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_mlbs_services');
        $count = $this->mdl_mlbs_services->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_mlbs_services');
        $max_id = $this->mdl_mlbs_services->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_mlbs_services');
        $query = $this->mdl_mlbs_services->_custom_query($mysql_query);
        return $query;
    }

}
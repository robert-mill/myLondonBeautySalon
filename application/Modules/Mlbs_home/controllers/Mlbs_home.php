<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_home extends MX_Controller
{

function __construct() {
    parent::__construct();
    }
    public function index(){
            if(!$this->session->userdata('is_logged_in')){
                redirect('Login');
            }           
            $this->load->model("Mdl_mlbs_home");
            $data['query'] = $this->Mdl_mlbs_home->get('id');
            
            
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_home";
            $data['view_file'] = "display";
            echo Modules::run('Templates/admin', $data);


    }
    function edit(){
      $update_id = $this->uri->segment(3); 
      $this->load->model("Mdl_mlbs_home");
      $data['module'] = "Mlbs_home";
      $data["query"] = $this->get_where($update_id);
      $data['view_file'] = "displayEdit";
      $data['error']=array('error'=>'');
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
       if($update_id=='edit'){
          $dataw = $this->get_data_from_post();
          //var_dump($dataw);
          $imagePost = $this->getimg($dataw);
          
          //var_dump($imagePost);
          if(isset($imagePost)){
              $dataIN = $imagePost;
          }else{
              $dataIN = $dataw;
          }
          foreach($dataw as $row){
                    $data['id'] = $dataIN['id'];
                    $data['title'] = $dataIN['title'];
                    $data['sub_title'] = $dataIN['sub_title'];
                    $data['description'] = $dataIN['description'];
                    $data['image'] = ($dataIN['image'])?$dataIN['image']:$dataIN["file_name"];
                    //$data['courses'] = $this->getCourses($data['id']);
            }
      }
      if($update_id=='save'){
          $dataw = $this->get_data_from_post();
          $imagePost = $this->getimg($dataw);
          if(isset($imagePost)){
              $dataIN = $imagePost;
          }else{
              $dataIN = $dataw;
          }
          foreach($dataw as $row){
                    $data['id'] = $dataw['id'];
                    $data['title'] = $dataw['title'];
                    $data['sub_title'] = $dataw['sub_title'];
                    $data['description'] = $dataw['description'];
                    $data['image'] = (isset($dataIN["file_name"]))?$dataIN["file_name"]:$dataw['image'];
                    //$data['courses'] = $this->getCourses($data['id']);
            }
            if($this->_update($data['id'] , $data)){
             $page = "Mlbs_home";
            
            }
            redirect($page); 
      }
      if($this->input->post('save_file',TRUE)){
          if($this->_update($data['id'] , $data)){
                $data['data']=$data;
                
                $data['module'] = "Mlbs_home";
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
       $data['file_data'] =[];
       $this->load->library("upload",$config);
       if(!$this->upload->do_upload()){
           $data['errors'] = array('error'=>$this->upload->display_errors());
           $this->load->view("imgfold",$dat);
       }else{
           $data['file_data'] = $this->upload->data();
           
          // var_dump($data['file_data']);
           
           foreach($dat as $key=>$val){
             $data["'".$key."'"] = "'".$val."'";
           }
       }
        $this->load->view("imgfold",$data);
        return $data['file_data'];
    }
    function create(){
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
            $data['module']="Mlbs_home";
            $data['view_file'] = "form";
            echo Modules::run('Templates/admin',$data);
    }
    function get_data_from_post(){
            $data['id'] =$this->input->post('id', TRUE);
            $data['title'] =$this->input->post('title', TRUE);
            $data['sub_title'] = $this->input->post('sub_title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['image'] = $this->input->post('image', TRUE);
            return $data;
    }
    function get_data_from_db($update_id){
           $update_id = $this->uri->segment(3);
            $query = $this->get_where($update_id);
            foreach($query->result() as $row){
                    $data['id'] = $row->id;
                    $data['title'] = $row->title;
                    $data['sub_title'] = $row->sub_title;
                    $data['description'] = $row->description;
                    $data['image'] = $row->image;
            }
            
            return $data;
    }
    function delete_service(){
       $delete_id = $this->uri->segment(3); 
       $this->_delete($delete_id);
       redirect("Mlbs_home");
    }
    function delete_image(){
       
        $update_id = $this->uri->segment(3);
        $query = $this->get_where($update_id);
            foreach($query->result() as $row){
                    $data['id'] = $row->id;
                    $data['title'] = $row->title;
                    $data['sub_title'] = $row->sub_title;
                    $data['description'] = $row->description;
                    $data['image'] = "";
                    //$data['courses'] = $this->getCourses($data['id']);
                    
            }
            
        $this->_update($update_id , $data);
        redirect("Mlbs_home");
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
                    redirect("Mlbs_home");
            }
    }
    
    function get($order_by) {
        $this->load->model('Mdl_mlbs_home');
        $query = $this->Mdl_mlbs_home->get($order_by);
        
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('Mdl_mlbs_home');
        $query = $this->Mdl_mlbs_home->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('Mdl_mlbs_home');
        $query = $this->Mdl_mlbs_home->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('Mdl_mlbs_home');
        $query = $this->Mdl_mlbs_home->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        foreach($data as $ky=>$vl){
            echo $vl;
        }
        $this->load->model('Mdl_mlbs_home');
        $this->Mdl_mlbs_home->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('Mdl_mlbs_home');
       if($this->Mdl_mlbs_home->_update($id, $data)){
           return true;
       }else{
           return false;
       }
    }

    function _delete($id) {
        $this->load->model('Mdl_mlbs_home');
        $this->Mdl_mlbs_home->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('Mdl_mlbs_home');
        $count = $this->Mdl_mlbs_home->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('Mdl_mlbs_home');
        $max_id = $this->Mdl_mlbs_home->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('Mdl_mlbs_home');
        $query = $this->Mdl_mlbs_home->_custom_query($mysql_query);
        return $query;
    }

}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_services extends MX_Controller
{
    public $load;
    public $Mlbs_options;
    function __construct() {
        parent::__construct();
    }
    public function index(){
            if(!$this->session->userdata('is_logged_in')){
                redirect('Login');
            } 
        $this->load->model("Mdl_mlbs_services");
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_services";
            $data['query'] = $this->Mdl_mlbs_services->get('id');
            $data['categories']= Modules::run("Mlbs_categories/getAllCategories",$data);
            $data['view_file'] = "Display";
            echo Modules::run('Templates/admin', $data);
    }
    public function redirect($url){
        redirect($url);  
    }
    public function add(){
       $this->load->model("Mdl_mlbs_services"); 
       $data['module'] = "Mlbs_services";
       $data['categories']= Modules::run("Mlbs_categories/getAllCategories",$data);
       $data['view_file'] = "DisplayAdd";
            echo Modules::run('Templates/admin', $data);
    }
    public function edit(){
            $this->load->model("Mdl_mlbs_services");
            
            $update_id = $this->uri->segment(3);
            
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_services";
            $value = $data['id'] = $update_id ;
            $col = "service_id_fk";
             $opdata = array(
                 
                'service_id_fk' => $data['id'],
            );
            $data["service_id_fk"] = $data['id'];
            //$data['options']= Modules::run("Mlbs_options/get","id");
            $data['options'] = Modules::run("Mlbs_options/getAll",$data);
          
            $data['query'] = $this->get_data_from_db($update_id);
            $data['categories']= Modules::run("Mlbs_categories/getAllCategories",$data);
            $data['view_file'] = "DisplayEdit";
            echo Modules::run('Templates/admin', $data);
    }
     
   
     function get($order_by) {
        $this->load->module('Mlbs_services');
        $query = $this->Mlbs_services->get($order_by);
        
        return $query;
    }
    function deleteCourse($delId){
        echo $delId;
    }
    function get_data_from_db($update_ids){
            $update_id = $update_ids?$update_ids:$this->uri->segment(4);
            $query = $this->get_where($update_id);
           
            $data=[];
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
                   // $data['courses'] = $this->getCourses($data['id']);
                    
                    
            }
            return $data;
    }
    function delete_deal(){
      $update_id = $this->uri->segment(4);
       $this->load->module("Mlbs_deals");
       Modules::run("Mlbs_deals/_delete",$update_id);
       $page = "Mlbs_services/edit/".$this->uri->segment(3);
       redirect($page); 
       
    }
    function process(){
     $update_id = $this->uri->segment(3);
     $data = $this->get_data_from_post();
        if($update_id=='add'){
            $this->load->model("Mdl_mlbs_services");
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_services";
            $data['categories']= Modules::run("Mlbs_categories/getAllCategories",$data);
            $data['view_file'] = "DisplayAdd";
            echo Modules::run('Templates/admin', $data);
        }
        if($update_id=='deleteOption'){
            $delId = $this->uri->segment(5);
            $this->deleteOption($delId);
            $page = "Mlbs_services/edit/".$this->uri->segment(4);
            redirect($page); 
            
        }
        if($update_id=='deleteCourse'){
            $delId = $this->uri->segment(4);
            $this->deleteCourse($delId);
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_services";
            $data['view_file'] = "DisplayAdd";
            echo Modules::run('Templates/admin', $data); 
        }
        if($update_id=='add_service'){
            $exData = $this->get_data_from_post();
            $retData = $this->getimg($exData);
            $imgIn = (isset($retData["file_data"]["file_name"]))?$retData["file_data"]["file_name"]:$retData['image'];
            $queryData = array(
                'id' => $exData["id"],
                'cat_id' => $exData["cat_id"],
                'title' => $exData["title"],
                'description' => $exData["description"],
                'time' => $exData["time"],
                'price' => $exData["price"],
                'discount_price' => $exData["discount_price"],
                'image' => $imgIn
            );  
            $this->_insert($queryData);
            $this->load->model("Mdl_mlbs_services");
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_services";
            $data['categories']= Modules::run("Mlbs_categories/getAllCategories",$data);
            $data['view_file'] = "DisplayAdd";
            echo Modules::run('Templates/admin', $data);
            $page = "Mlbs_services/edit/".$exDatas['id'];
            redirect($page); 
        }
        if($update_id=='upload_img'){
           $data['error']=array('error'=>'');
              $data['module'] = "Mlbs_services";
              $data['query'] = $this->get_data_from_db($data["id"]);
              $data['categories']= Modules::run("Mlbs_categories/getAllCategories",$data);
              $data['view_file'] = "DisplayEdit";
              echo Modules::run('Templates/admin', $data);
        }
        if($update_id=='add_deal'){
            $data=[];
            Modules::run("Mlbs_deals/add_deals",$data);
            $data['deals'] = Modules::run("Mlbs_deals/Mlbs_deals/get","id");
            redirect('Mlbs_services/edit/'.$this->uri->segment(4));
        }
        if($update_id=='add_options'){
            $prams=[];
            $data['module'] = "Mlbs_services";
            $data['options'] = Modules::run("Mlbs_options/getAll",$prams);
            $data['categories']= Modules::run("Mlbs_categories/getAllCategories",$data);
            
            $data['query'] = $this->get_data_from_db($data["id"]);
            $exDatas = $this->get_data_from_post();
            $opdata = array(
                'service_id_fk' => $exDatas['id'],
                'description' => $exDatas['description'],
                'price' => $exDatas['price'],
                'promotional_price' => $exDatas['promotional_price']
            );
            Modules::run("Mlbs_options/Mlbs_options/insert",$opdata);
            $this->load->model('Mdl_mlbs_options');
           $var =  $this->Mdl_mlbs_options->_insert($opdata);
            $page = "Mlbs_services/edit/".$exDatas['id'];
            redirect($page); 
        }
      
      if($update_id=='addImage'){
            $retData = $this->getimg($data);
            $exData = $this->get_data_from_post();
            $data =[];
            $imgIn = (isset($retData["file_data"]["file_name"])&&$retData["file_data"]["file_name"]!="")?$retData["file_data"]["file_name"]:$exData['image'];
            $queryData = array(
                'id' => $exData["id"],
                'cat_id' => $exData["cat_id"],
                'title' => $exData["title"],
                'description' => $exData["description"],
                'time' => $exData["time"],
                'price' => $exData["price"],
                'discount_price' => $exData["discount_price"],
                'image' => $imgIn
            );  
            $this->_update($exData["id"] , $queryData);
            
            
            $data["query"] = $queryData;
            $data["categories"] = Modules::run("Mlbs_categories/getAllCategories",$data);
            $data['module'] = "Mlbs_services";
            $data['view_file'] = "DisplayEdit";
            //$this->session->set_flashdata('mydata',$data);
            $page = "/Mlbs_services/edit/".$exData["id"];
           // echo "hjhjhj".$updates;
            $this->redirect($page);
            
                //redirect(site_url($page));  
            
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
    function deleteOption($id){
        Modules::run("Mlbs_options/_delete",$id);
       
        return true;
       
    }
    function delete(){
        $delete_id = $this->uri->segment(3);
           $this->delete_service($delete_id);
    }
    function getimg($data){
       $dat = $this->get_data_from_post();
       $config['upload_path']= "./assets/uploaded_images";
       $config['allowed_types']= 'jpg|jpeg|JPG|JPEG|PNG|png|gif|GIF';
       $delData = $this->get_data_from_db($dat["id"]);
    if($delData["image"]){
       $this->load->helper("file");
       $path = "assets/uploaded_images/".$delData["image"];
       //unlink("assets/uploaded_images/".$delData["image"]);
       delete_files($path);
    }  
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
       return $data;
        //.$this->load->view("imgfold",$data);
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
            $data['module']="Mdl_services";
            $data['view_file'] = "form";
            echo Modules::run('Templates/admin',$data);
    }
    function get_data_from_post(){
            $data['id'] =$this->input->post('id', TRUE);
            $data['cat_id'] =$this->input->post('cat_id', TRUE);
            $data['title'] =$this->input->post('title', TRUE);
            $data['sub_title'] = $this->input->post('sub_title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['time'] =$this->input->post('time', TRUE);
            $data['price'] =$this->input->post('price', TRUE);            
            $data['discount_price'] =$this->input->post('discount_price', TRUE);
            $data['promotional_price'] = $this->input->post('promotional_price', TRUE);
            $data['image'] = $this->input->post('image', TRUE);
            $data['userfile'] = $this->input->post('image', TRUE);
            return $data;
    }
   
    function delete_service($delete_id){
       $this->_delete($delete_id);
       redirect("Mlbs_services");
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
        redirect("Mdl_services");
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
                    redirect("Mdl_services");
            }
    }
    
  
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('Mdl_mlbs_services');
        $query = $this->Mdl_mlbs_services->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
   
    function get_where($id) {
        $this->load->model('Mdl_mlbs_services');
        $query = $this->Mdl_mlbs_services->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('Mdl_mlbs_services');
        $query = $this->Mdl_mlbs_services->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        foreach($data as $ky=>$vl){
            echo $vl;
        }
        $this->load->model('Mdl_mlbs_services');
        $this->Mdl_mlbs_services->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('Mdl_mlbs_services');
       if($this->Mdl_mlbs_services->_update($id, $data)){
           return true;
       }else{
           return false;
       }
    }

    function _delete($id) {
        $this->load->model('Mdl_mlbs_services');
        $this->Mdl_mlbs_services->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('Mdl_mlbs_services');
        $count = $this->Mdl_mlbs_services->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('Mdl_mlbs_services');
        $max_id = $this->Mdl_mlbs_services->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('Mdl_mlbs_services');
        $query = $this->Mdl_mlbs_services->_custom_query($mysql_query);
        return $query;
    }
}
<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_contact extends MX_Controller
{

function __construct() {
     if(!$this->session->userdata('is_logged_in')){
                redirect('Login');
            } 
    parent::__construct();
    }
    public function index(){
            if(!$this->session->userdata('is_logged_in')){
                redirect('Login');
            }           
            $this->load->model("Mdl_mlbs_contact");
            $data['query'] = $this->Mdl_mlbs_contact->get('id');
            
            
            $data['error']=array('error'=>'');
            $data['module'] = "Mlbs_contact";
            $data['view_file'] = "display";
            echo Modules::run('Templates/admin', $data);


    }
    function edit(){
        $update_id = $this->uri->segment(3);
        $data['query'] = $this->get_data_from_db($update_id);
        $data['module'] = "Mlbs_contact";
        $data['view_file'] = "displayEdit";
        echo Modules::run('Templates/admin', $data);
        
    }
    function process(){
     $update_id = $this->uri->segment(3);
     $query = $this->get_data_from_post();    
      if($update_id=='upload_img'){
        $this->getimg($query);    
      }
      if($this->input->post('addImage',TRUE)){
         $this->getimg($query);        
      }
      if($update_id=="edit"){
         if($this->_update($query['id'] , $query)){               
              redirect("/Mlbs_contact/edit/".$query['id']);
          }
      }
      if($this->input->post('submitForm',TRUE)){
         $this->submit(); 
      }
      if($this->input->post('save_file',TRUE)){
          if($this->_update($query['id'] , $query)){
                $data['data']=$query;
                $data['module'] = "Mlbs_contact";
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
            $data['module']="Mlbs_contact";
            $data['view_file'] = "form";
            echo Modules::run('Templates/admin',$data);
    }
    function get_data_from_post(){
            $data['id'] =$this->input->post('id', TRUE);
            $data['title'] =$this->input->post('title', TRUE);            
            $data['description'] = $this->input->post('description', TRUE);
            $data['address_1'] =$this->input->post('address_1', TRUE); 
            $data['address_2'] =$this->input->post('address_2', TRUE); 
            $data['address_3'] =$this->input->post('address_3', TRUE); 
            $data['post_code'] =$this->input->post('post_code', TRUE); 
            $data['email'] =$this->input->post('email', TRUE); 
            $data['phone'] =$this->input->post('phone', TRUE); 
            $data['mobile'] =$this->input->post('mobile', TRUE); 
            $data['web_address'] =$this->input->post('web_address', TRUE);
            $data['image'] = $this->input->post('image', TRUE);
            return $data;
    }
    function get_data_from_db($update_id){
           $update_id = $this->uri->segment(3);
            $query = $this->get_where($update_id);
            foreach($query->result() as $row){
                    $data['id'] = $row->id;
                    $data['title'] = $row->title;                    
                    $data['description'] = $row->description;
                    $data['address_1'] = $row->address_1;
                    $data['address_2'] = $row->address_2;
                    $data['address_3'] = $row->address_3;
                    $data['post_code'] = $row->post_code;
                    $data['email'] = $row->email;
                    $data['phone'] = $row->phone;
                    $data['mobile'] = $row->mobile;
                    $data['web_address'] = $row->web_address;
                    $data['image'] = $row->image;
            }
            
            return $data;
    }
    function delete_service(){
       $delete_id = $this->uri->segment(3); 
       $this->_delete($delete_id);
       redirect("Mlbs_contact");
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
        redirect("Mlbs_contact");
    }    
    function submit(){            
           //$this->form_validation->set_rules('title','Title', 'required|min_length[3]');
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
                    return true;
            }
    }
    
    function get($order_by) {
        $this->load->model('Mdl_mlbs_contact');
        $query = $this->Mdl_mlbs_contact->get($order_by);
        
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('Mdl_mlbs_contact');
        $query = $this->Mdl_mlbs_contact->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('Mdl_mlbs_contact');
        $query = $this->Mdl_mlbs_contact->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('Mdl_mlbs_contact');
        $query = $this->Mdl_mlbs_contact->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        foreach($data as $ky=>$vl){
            echo $vl;
        }
        $this->load->model('Mdl_mlbs_contact');
        $this->Mdl_mlbs_contact->_insert($data);
    }

    function _update($id, $data) {
        
        $this->load->model('Mdl_mlbs_contact');
       if($this->Mdl_mlbs_contact->_update($id, $data)){
          
           return true;
       }else{
           return false;
       }
    }

    function _delete($id) {
        $this->load->model('Mdl_mlbs_contact');
        $this->Mdl_mlbs_contact->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('Mdl_mlbs_contact');
        $count = $this->Mdl_mlbs_contact->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('Mdl_mlbs_contact');
        $max_id = $this->Mdl_mlbs_contact->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('Mdl_mlbs_contact');
        $query = $this->Mdl_mlbs_contact->_custom_query($mysql_query);
        return $query;
    }

}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_deals extends MX_Controller
{

function __construct() {
    parent::__construct();
    }
    public function index(){
            $this->load->model("Mdl_mlbs_deals");
            $data['query'] = $this->Mdl_mlbs_deals->get('id');
            
            $data['module'] = "Mlbs_deals";
            $data['view_file'] = "display";
        echo Modules::run('templates/admin', $data);


    }
    function add_deals(){
        
        $this->load->model("Mdl_mlbs_deals");
      $data = $this->get_data_from_post();
     
      $this->_insert($data);  
      return true;
    }
    function get_courses($id){
        $this->load->model('Mdl_mlbs_deals');
        $query = $this->Mdl_mlbs_deals->get_where($id);
        return $query;
    }
    function getAll($id){
        $this->load->model('Mdl_mlbs_deals'); 
        $query = $this->Mdl_mlbs_deals->get_where_custom("service_id_fk",$id["id"]);
        return $query;
    }
            function create(){
            $update_id = $this->uri->segment(3);
            if(!is_numeric($update_id)){
                    $update_id = $this->input->post('id',TRUE);
            }
            if(is_numeric($update_id) ){
                    $data = $this->get_data_from_db($update_id);
                    $data['id'] = $update_id;
                    
            }else{
               
                    $data = $this->get_data_from_post();
            }
            
            $this->load->model("Mdl_mlbs_deals");
            $data['module']="Mlbs_deals";
            $data['view_file'] = "form";

            echo Modules::run('Templates/admin',$data);
            
           
            
            
            
    }
    function get_data_from_post(){
            $data['id'] =$this->input->post('id', TRUE);
            $data['service_id_fk'] =$this->input->post('service_id_fk', TRUE);
            $data['text'] =$this->input->post('text', TRUE);
            $data['time'] =$this->input->post('time', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['promotional_price'] = $this->input->post('promotional_price', TRUE);
            $data['sessiontype'] = $this->input->post('sessiontype', TRUE);
            return $data;
    }
    function get_data_from_db($update_id){
            $query = $this->get_where($update_id);
            $data=[];
            foreach($query->result() as $row){
                    $data['id'] = $row->id;
                    $data['service_id_fk'] = $row->service_id_fk; 
                    $data['text'] = $row->text;
                    $data['time'] = $row->text;
                    $data['price'] = $row->price;
                    $data['promotional_price'] = $row->promotional_price;
            }
            return $data;
    }
    function submit(){
            if($this->load->library('form_validation')){
                    //echo 'validating';
            }else{
                   // echo 'Not loaded';
            }
            $this->form_validation->set_rules('text','text', 'required|min_length[3]');
            $update_id = $this->input->post('update',TRUE);
            if($this->form_validation->run()==FALSE){
                    $this->create();
                    
                    //$this->load->view('myform');
            }else{
                    $data = $this->get_data_from_post();
                    if(is_numeric($update_id)){
                            $this->_update($update_id,$data);
                            redirect("Mlbs_deals/create");
                    }else{
                        
                            $this->_insert($data);
                            redirect("Mlbs_deals/create");
                    }
                    
            }
    }
    
    
    function get($order_by) {
        $this->load->model('Mdl_mlbs_deals');
        $query = $this->Mdl_mlbs_deals->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('Mdl_mlbs_deals');
        $query = $this->Mdl_mlbs_deals->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('Mdl_mlbs_deals');
        $query = $this->Mdl_mlbs_deals->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
       
        $this->load->model('Mdl_mlbs_deals');
        $query = $this->Mdl_mlbs_deals->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        var_dump($data);
        $this->load->model('Mdl_mlbs_deals');
        $this->Mdl_mlbs_deals->_insert($data);
        return true;
    }

    function _update($id, $data) {
        $this->load->model('Mdl_mlbs_deals');
        $this->Mdl_mlbs_deals->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('Mdl_mlbs_deals');
        $this->Mdl_mlbs_deals->_delete($id);
        return true;
    }

    function count_where($column, $value) {
        $this->load->model('Mdl_mlbs_deals');
        $count = $this->Mdl_mlbs_deals->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('Mdl_mlbs_deals');
        $max_id = $this->Mdl_mlbs_deals->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('Mdl_mlbs_deals');
        $query = $this->Mdl_mlbs_deals->_custom_query($mysql_query);
        return $query;
    }

}
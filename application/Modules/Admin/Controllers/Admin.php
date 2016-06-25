<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MX_Controller{

    function __construct() {
        parent::__construct();
    }
    public function index(){	
           /* $this->load->model("mdl_admin");
            //$data['query'] = $this->mdl_tasks->get('priority');
            
            $data['categories'] = $this->mdl_admin->get_categories();
            $data['items'] = $this->_call_all_sproc();
            $data["res"]="adasd";
            $data['module'] = "admin";
            $data['view_file'] = "display";
            $page = $this->uri->segment(3);
            echo Modules::run('templates/admin', $data);
            
            */
        echo 'Hi';

    }
    function create(){
                $this->load->model("mdl_admin");
                
		$update_id = $this->uri->segment(3);
                $this->load->model("mdl_admin");
                $dataCat = $this->get_categories();
                foreach($dataCat as $key=>$val){
                    echo $val["id"];
                    echo $val["title"];
                }
                
		if(!is_numeric($update_id)){
			$update_id = $this->input->post('update_id',TRUE);
		}
		if(is_numeric($update_id) ){
                        $data = $this->_call_item_by_id_sproc($update_id);
			//$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		}else{
			$data = $this->get_data_from_post();
		}
		$data['cats']=$dataCat;
		$data['module']="admin";
		$data['view_file'] = "item_form";
		
		echo Modules::run('templates/admin',$data);
                
    }
    
    function submit(){
                $this->load->model("mdl_admin");
                $dataCat = $this->get_categories();
                foreach($dataCat as $key=>$val){
                    echo $key."NN";
                }
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
			
			
			redirect("admin");
		}
	}
    
    
    function get_data_from_post(){
            $data['title'] =$this->input->post('title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['time'] = $this->input->post('time', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['dprice'] = $this->input->post('dprice', TRUE);
            $data['category_id_fk'] = $this->input->post('cat_id', TRUE);
            
            
            return $data;
    }
    function _call_item_by_id_sproc($id){        
        $query = $this->db->query("call items_and_courses($id)");
        foreach($query->result() as $row){
                    $data['id'] = $row->id;
                    $data['title'] = $row->title;
                    $data['description'] = $row->description;
                    $data['pic'] = $row->pic;
                    $data['price'] = $row->price;
                    $data['mdprice'] = $row->mdprice;
                    $data['time'] = $row->time;
                    $data['mdprice'] = $row->mdprice;
                    $data['course'] = $row->course;
                    $data['cprice'] = $row->cprice; 
                    $data['dprice'] = $row->dprice; 
                    $data['dprice'] = $row->dprice; 
                    $data['category_id_fk'] = $row->category_id_fk; 
            }
        return $data;
    }
    function get_data_from_db($update_id){
            $query = $this->get_where($update_id);
            foreach($query->result() as $row){
                    $data['title'] = $row->title;
                    $data['priority'] = $row->priority;
            }
            return $data;
    }    
        
    function get($order_by) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_admin');
        $this->mdl_admin->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_admin');
        $this->mdl_admin->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_admin');
        $this->mdl_admin->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_admin');
        $count = $this->mdl_admin->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_admin');
        $max_id = $this->mdl_admin->get_max();
        return $max_id;
    }
    
    function _call_all_sproc(){
        $this->load->model('mdl_admin');
        $sprocall = "call all_items_and_courses()";
        $query = $this->mdl_admin->_call_all_sproc($sprocall);
        return $query;
    }
    
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_admin');
        $query = $this->mdl_admin->_custom_query($mysql_query);
        return $query;
    }
    function get_categories($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null){
            $this->load->model('mdl_admin');
            
            //$query = $this->mdl_admin->get_categories($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null);
            $query = $this->mdl_admin->get_categories();
            /*
            $this->db->select('*');
            $this->db->from('mlbs_services_category');
            if($search_string){
                    $this->db->like('title', $search_string);
            }
            $this->db->group_by('id');
            if($order){
                    $this->db->order_by($order, $order_type);
            }else{
                $this->db->order_by('id', $order_type);
            }
            if($limit_start && $limit_end){
                $this->db->limit($limit_start, $limit_end);	
            }

            if($limit_start != null){
              $this->db->limit($limit_start, $limit_end);    
            }
        $query = $this->db->get();
        */
        return $query; 
    }

}
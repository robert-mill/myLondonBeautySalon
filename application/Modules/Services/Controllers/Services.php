<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends MX_Controller{
	function __construct() {
            
		parent::__construct();
	}
	public function index(){
		$this->load->model("Mdl_services");
                $cid = $this->uri->segment(3);
                $dd=[];
                $data['categories']= Modules::run("Categories/getAllCategories",$dd);
                //$data['categories']= $this->get_cats();
               $order_by = "id";
                if(!$cid){
                  //$data['services'] = $this->_call_all_sproc();
                }else{
                 // $data['services'] = $this->_call_by_id_sproc();  
                }  
                
                
                //$data['services'] = $this->get($order_by);
                $data['services'] = $this->get_where_custom("cat_id",1);
                //$data['services'] = $this->_custom_query($mysql_query);
                
		$data["res"]="adasd";
		$data['module'] = "Services";
		$data['view_file'] = "Display";
                echo Modules::run('Templates/main_page', $data);
		
		
	}
	function get($order_by) {
		$this->load->model('Mdl_services');
		$query = $this->Mdl_services->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_services');
		$query = $this->Mdl_services->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_services');
		$query = $this->Mdl_services->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_services');
		$query = $this->Mdl_services->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_services');
		$this->Mdl_services->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_services');
		$this->Mdl_services->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_services');
		$this->Mdl_services->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_services');
		$count = $this->Mdl_services->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_services');
		$max_id = $this->Mdl_services->get_max();
		return $max_id;
	}
        function getService($cid){ 
            
                $data=[];
                $this->load->model("Mdl_services");
                $cid = $this->uri->segment(3)?$this->uri->segment(3):4;                
                $mysql_query = "SELECT        
                    mlbs_services.id, 
                    mlbs_categories.title as head,
                            mlbs_services.title as title, 
                            mlbs_services.description,
                    mlbs_services.image,
                    mlbs_services.price,
                    mlbs_services.discount_price,
                    mlbs_services.time as time,
                     mlbs_courses.title_desc as course, 
                     mlbs_courses.course_price,
                     mlbs_courses.course_discount_price,
                     mlbs_courses.id as cid          
                    FROM 
			mlbs_services 
                    LEFT JOIN mlbs_categories ON
                        mlbs_services.cat_id = mlbs_categories.id
                    LEFT OUTER JOIN mlbs_courses ON
                        mlbs_courses.service_id_fk = mlbs_services.id
                     WHERE mlbs_categories.id = ".$cid;
                $data['services'] = $this->_custom_query($mysql_query);
                
               // $data['services'] = $this->get($order_by);
                if($cid){
                  // $data["services"] = $this->_call_by_id_sproc(); 
                }else{
                  // $data["services"] = $this->_call_all_sproc();  
                }
                
               // $data['categories'] = $this->_call_all_sproc();
               // $data['categories']= Modules::run("Categories/getAllCategories",$data);
                
                
                $data['module'] = "Services";
		$data['view_file'] = "Display";
                echo Modules::run('Templates/main_page', $data);
            
        }
        function callServices(){
            $sql ="";
            
        }
	function _call_all_sproc(){
		$this->load->model('Mdl_services');
		$sprocall = "call all_items_and_courses_2()";
		$query = $this->Mdl_services->_call_all_sproc($sprocall);
                
		return $query;
	}
        function _call_by_id_sproc(){
                $cid = $this->uri->segment(3);
                $data=[];
		$query = $this->Mdl_services->_call_by_id_sproc($cid);
		return $query;
	}
        
	function _custom_query($mysql_query) {
		$this->load->model('Mdl_services');
		$query = $this->Mdl_services->_custom_query($mysql_query);
		return $query;
	}
        function get_cats(){
            $data=[];
            return Modules::run("Categories/Categories/getAllCategories",$data);
        }

}
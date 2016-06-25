<?php
class Admin_items extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('items_model');
		$this->load->model('categories_model');
		$this->load->library('image_lib');
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
	}
	public function index(){
	    $category_id = $this->input->post('category_id'); 
		$item_id = $this->input->post('item_id'); 
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type');
		$config['per_page'] = 5;
        $config['base_url'] = base_url().'admin/items';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
		$page = $this->uri->segment(3);
		$limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }
		if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }else{
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                $order_type = 'Asc';    
            }
        }
		$data['order_type_selected'] = $order_type; 
		if($category_id !== false && $search_string !== false && $order !== false || $this->uri->segment(3) == true){
			if($category_id !== 0){
                $filter_session_data['category_selected'] = $category_id;
            }else{
                $category_id = $this->session->userdata('category_selected');
            }
			$data['category_selected'] = $category_id;
			if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;
            if($order){
                $filter_session_data['order'] = $order;
            }else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;
			$this->session->set_userdata($filter_session_data);
			$data['categories'] = $this->categories_model->get_categories();
			$data['count_items']= $this->items_model->count_items($category_id, $search_string, $order);
			$config['total_rows'] = $data['count_items'];
			if($search_string){
                if($order){
                    $data['items'] = $this->items_model->get_items($category_id, $search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['items'] = $this->items_model->get_items($category_id, $search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['items'] = $this->items_model->get_items($category_id, '', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['items'] = $this->items_model->get_items($category_id, '', '', $order_type, $config['per_page'],$limit_end);        
                }
            }
			
		}else{
			$filter_session_data['category_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);
			$data['search_string_selected'] = '';
            $data['category_selected'] = 0;
            $data['order'] = 'id';
			
			$data['categories'] = $this->categories_model->get_categories();
            $data['count_items']= $this->items_model->count_items();
            $data['items'] = $this->items_model->get_items('', '', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_items'];
		}
		$id = $this->uri->segment(4);
		//$data['courses'] = $this->items_model->items_and_courses(25);
		$this->pagination->initialize($config);
		$data['main_content'] = 'admin/items/list';
		$this->load->view('includes/template', $data); 
	}
	public function new_course(){
		$itemId = $this->uri->segment(4);
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_rules('cprice', 'cprice', 'required');
			echo $this->input->post('item_id').",".$this->input->post('title').$this->input->post('cprice').$this->input->post('cdprice');
			
				echo $this->input->post('item_id').",".$this->input->post('title').$this->input->post('cprice').$this->input->post('cdprice');
		
			if ($this->form_validation->run()){
				$data_to_store= '"'.$this->input->post('item_id').'","'.$this->input->post('title').'","'.$this->input->post('cprice').'","'.$this->input->post('cdprice').'"';
					
			}
		
			if($this->items_model->new_courses($data_to_store)){
				$data['flash_message'] = TRUE; 
			}else{
				$data['flash_message'] = FALSE; 
			}
		}
		
		
		//$data['courses'] = $this->items_model->get_courses($id);
 
		$data['main_content'] = 'admin/items/new_course';
		$this->load->view('includes/template', $data); 
	}
/*	public function manipulation(){
		$id = $this->uri->segment(4);
		$data['categories'] = $this->categories_model->get_categories();
		//$data['courses'] = $this->items_model->get_courses($id);
		$data['main_content'] = 'admin/items/manipulation';
		$this->load->view('includes/template', $data); 
	}
	*/
	public function delImg(){
		$id = $this->uri->segment(4);
		$img = $this->uri->segment(5);
		$path = "uploads/".$img ;
		if(file_exists($path)){
			unlink($path);
			delete_files($path);
			$this->items_model->deleteImage($id);
			$data["delerror"] = "File deleted";
			$this->load->helper('url');
			if (condition == TRUE) {
			   redirect('admin_items/index');
			}
		}else{
			$this->items_model->deleteImage($id);
			$data["delerror"] = "An error has occured";
			if (condition == TRUE) {
			   redirect('admin_items/index');
			}
		}
	}
	public function add(){

		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			if ($this->form_validation->run()){
				$data_to_store_old = array(
                    'title' => $this->input->post('title'),
					'desc' => $this->input->post('desc'),
					'time' => $this->input->post('time'),
					'price' => $this->input->post('price'),
					'dprice' => $this->input->post('dprice'),
					'category_id' => $this->input->post('category_id')
					
                );
				//$data_to_store='"'.$this->input->post('time').'","'.$this->input->post('cprice').'","'.$this->input->post('cprice').'","'.;
				$data_to_store='"' . $this->input->post('title'). '","' . $this->input->post('desc').'","'.$this->input->post('time').'","'.$this->input->post('price').'","'.$this->input->post('dprice').'","'.$this->input->post('category_id').'"' ;  
				
				
				if($this->items_model->add_item($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
			}
		}
		$id = $this->uri->segment(4);
		$data['categories'] = $this->categories_model->get_categories();
		//$data['courses'] = $this->items_model->get_courses($id);
		$data['main_content'] = 'admin/items/add';
		$this->load->view('includes/template', $data); 
	}
	public function delCourse(){
		$id = $this->uri->segment(4);
		$this->items_model->delete_course($id);
		
        redirect('admin/items');
	}
	
	public function update(){
		$category_id = $this->uri->segment(4);
		$order_type = 'desc';
		$data['categories'] = $this->categories_model->get_categories();
		//$data['items'] = $this->items_model->get_items($category_id, '', '', $order_type, 2,2);        
                
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('title', 'title', 'required');
			if ($this->form_validation->run()){
				$data_to_store_old = array(
                    'title' => $this->input->post('title'),
					'desc' => $this->input->post('desc'),
					'time' => $this->input->post('time'), 
					'price' =>  $this->input->post('price'),
					'dprice' =>  $this->input->post('dprice'),
					'category_id' => $this->input->post('category_id')
                );
				
				$data_to_store = "'".$this->input->post('title')."','".$this->input->post('desc')."','".$this->input->post('time')."',".$this->input->post('price').",".$this->input->post('mdprice').",".$this->input->post('category_id');
				
				if($this->items_model->update_item($category_id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/items/update/'.$category_id.'');
			}
		}
		$data['items'] = $this->items_model->get_item_by_id($category_id);
		$data['main_content'] = 'admin/items/edit';
        $this->load->view('includes/template', $data);
	}
	
	public function delete(){
        $id = $this->uri->segment(4);
        $this->items_model->delete_item($id);
        redirect('admin/items');
    }
}
?>
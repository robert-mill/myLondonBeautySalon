<?php
class Admin_categories extends CI_Controller {
	const VIEW_FOLDER = 'admin/categories';
	public function __construct(){
		parent::__construct();
		$this->load->model('categories_model');
		if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
	}
	public function index(){
		$search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type');
		$config['per_page'] = 5;
		$config['base_url'] = base_url().'admin/categories';
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
		if($search_string !== false && $order !== false || $this->uri->segment(3) == true){ 
			if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;
            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;
			if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
			$data['count_categories']= $this->categories_model->count_categories($search_string, $order);
            $config['total_rows'] = $data['count_categories'];
			if($search_string){
				if($order){
                    $data['categories'] = $this->categories_model->get_categories($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['categories'] = $this->categories_model->get_categories($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }				
			}else{
                if($order){
                    $data['categories'] = $this->categories_model->get_categories('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['categories'] = $this->categories_model->get_categories('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }
		}else{
			$filter_session_data['category_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);
			
			$data['search_string_selected'] = '';
            $data['order'] = 'id';
			
			$data['count_categories']= $this->categories_model->count_categories();
            $data['categories'] = $this->categories_model->get_categories('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_categories'];
		}
		$this->pagination->initialize($config);
		$data['main_content'] = 'admin/categories/list';
		$this->load->view('includes/template', $data); 
	}
	public function add(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			if ($this->form_validation->run()){
				$data_to_store = array(
                    'title' => $this->input->post('title'),
					'desc' => $this->input->post('desc')
                );
				if($this->categories_model->store_category($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }
			}
		}
		$data['main_content'] = 'admin/categories/add';
		$this->load->view('includes/template', $data); 
	}
	public function update(){
		$id = $this->uri->segment(4);
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->form_validation->set_rules('title', 'title', 'required');
			if ($this->form_validation->run()){
				$data_to_store = array(
                    'title' => $this->input->post('title'),
					'desc' => $this->input->post('desc')
                );
				if($this->categories_model->update_category($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/categories/update/'.$id.'');
			}
		}
		$data['categories'] = $this->categories_model->get_category_by_id($id);
		$data['main_content'] = 'admin/categories/edit';
        $this->load->view('includes/template', $data);
	}
	public function delete(){
        $id = $this->uri->segment(4);
        $this->categories_model->delete_category($id);
        redirect('admin/categories');
    }
}
?>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller {
	
	function view($page = 'home'){
		$this->load->helper('url');
		
		if(strpos(strtolower($page),"admin")!==false){
			if( ! file_exists( 'application/views/pages/'.$page.'_view.php' )){
				show_404();
			}
			
			$data['categories'] = $this->categories_model->get_categories();
			$data['main_content'] = 'pages/admin/pages/items/list';
			
			$this->load->view("templates/template.php",$data);
			
			//$this->load->view("templates/admin_master_header_view",$data);
			//$this->load->view("pages/".$page."_view",$data);
			//$this->load->view("templates/admin_master_footer_view",$data);
		}else{	
		
			if( ! file_exists( 'application/views/pages/'.$page.'_view.php' )){
				show_404();
			}
			$this->load->model('ServicesModel');
			$this->load->model('GeneralModel');
			$data['services'] = $this->ServicesModel->getData();
			$data['title'] = $page;
			$data['menuList'] = $this->ServicesModel->getMenu();
			$data['pageText'] = $this->GeneralModel->getPageText($page);
			$this->load->view("templates/header",$data);
			$this->load->view("templates/nav");
			$this->load->view("pages/".$page."_view",$data);
			$this->load->view("templates/footer");
		}
	}
	
}
?>
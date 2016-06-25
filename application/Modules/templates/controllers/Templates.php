<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends MX_Controller {
            
	public function one_col($data){
		$this->load->view('one_col', $data);
		
	}
	public function two_col($data){
		$this->load->view('two_col', $data);
		
	}
	public function admin($data){
            $this->load->view('admin_header');
                $this->load->view('nav_admin');
		$this->load->view('admin', $data);
            $this->load->view('admin_footer');
		
	}
        public function home_page($data){
            $this->load->view('header');
		$this->load->view('nav');
		$this->load->view('innerHead');
		$this->load->view('body', $data);
		$this->load->view('footer');
        }
	public function main_page($data){
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('innerHeadMain');
		$this->load->view('body', $data);
		$this->load->view('footer');	
	}
       
	
	
}

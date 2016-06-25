<?php
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('is_logged_in')){
			echo 'hi';
           // redirect('admin/login');
        }else{
			 redirect('admin/items');
		}
	}
}
?>
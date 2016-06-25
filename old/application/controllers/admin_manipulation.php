<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Admin_manipulation extends CI_Controller {

// Load Library.
function __construct() {
	parent::__construct();
	$this->load->model('items_model');
	$this->load->model('categories_model');
	$this->load->model('manipulation_model');
	$this->load->library('image_lib');
	$this->load->helper(array('form', 'url'));
}

// View "manipulation_view" Page.
public function index() {
		
		$data['main_content'] = 'admin/manipulation/manipulation';
		$this->load->view('includes/template', $data); 
}
public function addImage(){
	$this->input->post("submit");
	$image = $this->input->post("uploadedImg");
	$itemId = $this->input->post("uploadedID"); 
	
	$dataimg = '"' . $itemId . '","' . $image.'"';
	$this->manipulation_model->add_image($dataimg);
	$this->load->helper('url');
	if (condition == TRUE) {
	   redirect('admin_items/index');
	}
	
}
public function deleteImage(){
	$this->load->helper("file");
	$this->load->helper("url");
	$image = $this->input->post("uploadedImg");
	$itemId = $this->input->post("uploadedID"); 
	$path = "uploads/".$image;
	if(file_exists($path)){
		unlink($path);
		delete_files($path);
		$data["delerror"] = "File deleted";
	}else{
		$data["delerror"] = "An error has occured";
	}
	//delete_files($path);
	$data["delerror"] = $path;
	$data["success"]="Successfully deleted".$path;
	$data['main_content'] = 'admin/manipulation/manipulation';
	$this->load->view('includes/template', $data);
}

public function upload(){
	$this->input->post("submit");
        //set preferences
       $config = array(
			'overwrite'=>true,
			'upload_path' => "uploads/",
			'upload_url' => base_url() . "uploads/",
			'allowed_types' => "gif|GIF|jpg|JPG|JPEG|jpeg|png|PNG|pdf|PDF"
		);
/*
	file_name__jessica2.jpg
	file_type__image/jpeg
	file_path__C:/xampp/htdocs/ci-my-admin/uploads/
	full_path__C:/xampp/htdocs/ci-my-admin/uploads/jessica2.jpg
	raw_name__jessica2
	orig_name__jessica2.jpg
	client_name__jessica2.jpg
	file_ext__.jpg
	file_size__271.34
	is_image__1
	image_width__500
	image_height__750
	image_type__jpeg
	image_size_str__width="500" height="750"
*/
        //load upload class library
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()){
			
            // case - failure
            $data["error"]= array('error' => $this->upload->display_errors());
			$data['main_content'] = 'admin/manipulation/manipulation';
			$this->load->view('includes/template', $data);
        }else{
            // case - success
			$upload_data = $this->upload->data();
			$data['main_content'] = 'admin/manipulation/manipulation';
			$data['uploadedimg'] = $upload_data['file_name'];
			$data['imgId'] = $this->input->post("itemId");
			$data['uploadedpath'] = base_url() . "uploads/".$data['uploadedimg'];
            $data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
            $this->load->view('includes/template', $data);
        }
    }
}
?>
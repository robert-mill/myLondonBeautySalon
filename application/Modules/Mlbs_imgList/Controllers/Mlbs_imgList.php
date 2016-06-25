<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_imgList extends MX_Controller{

    function __construct() {
        parent::__construct();
    }
    public function index(){	
          //  $this->load->model("Mlbs_imgList");
            //$data['query'] = $this->mdl_tasks->get('priority');
            
           // $data['categories'] = $this->mdl_admin->get_categories();
          //  $data['items'] = $this->_call_all_sproc();
           
            $data['module'] = "Mlbs_imgList";
            $page = $this->uri->segment(3);
            $data['view_file'] = "Display";
            echo Modules::run('Templates/admin', $data);
            
         

    }
   

}
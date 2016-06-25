<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlbs_admin extends MX_Controller{

    function __construct() {
        parent::__construct();
    }
    public function index(){	
          // $this->load->model("mdl_admin");
            //$data['query'] = $this->mdl_tasks->get('priority');
            
           // $data['categories'] = $this->mdl_admin->get_categories();
          //  $data['items'] = $this->_call_all_sproc();
            $data["res"]="adasd";
            $data['module'] = "admin";
            $data['view_file'] = "display";
            $page = $this->uri->segment(3);
          //  echo Modules::run('templates/admin', $data);
            
           
        echo 'Hi';

    }
   

}
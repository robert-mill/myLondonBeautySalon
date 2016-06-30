<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends MX_Controller{

    private $email;

    function __construct() {
		parent::__construct();
	}
	public function index(){
		$this->load->model("Mdl_contact");
		$data['query'] = $this->get('title');
		$data["res"]="adasd";
		$data['module'] = "Contact";
		$data['view_file'] = "Display";
                echo Modules::run('Templates/main_page', $data);
		
		
	}
	function get($order_by) {
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id) {
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('Mdl_contact');
		$query = $this->Mdl_contact->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data) {
		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_update($id, $data);
	}

	function _delete($id) {
		$this->load->model('Mdl_contact');
		$this->Mdl_contact->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('Mdl_contact');
		$count = $this->Mdl_contact->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('Mdl_contact');
		$max_id = $this->Mdl_contact->get_max();
		return $max_id;
	}
	function _call_all_sproc(){
		$this->load->model('Mdl_contact');
		$sprocall = "call all_items_and_courses()";
		$query = $this->Mdl_contact->_call_all_sproc($sprocall);
		return $query;
	}
	function _custom_query($mysql_query) {
		$this->load->model('Mdl_contact');

		$query = $this->Mdl_contact->_custom_query($mysql_query);
		return $query;
	}
        
        function smail(){
            
           $dataIn = $this->get_data_from_post();
           $data["query"] = $dataIn;
            $message = $dataIn["message"];
            $data["query"]["toName"] = "Cintia";
            $to = $data["query"]["toEmail"] = "cintia@mylondonbeautysalon.co.uk";
            $subject = $dataIn["subject"];
            $fromEmail = $dataIn["fromEmail"];
            $name = $dataIn["name"];
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: ". $name . " <" . $fromEmail . ">\r\n";
            $headers .= 'Reply-To: ' . $fromEmail. "\r\n";
            $headers .= 'X-Mailer: PHP/' . $fromEmail;
            
            
            if(mail($to,$subject,$message,$headers)){
                $data["query"]["sent"] = 1;
                $data['module'] = "Contact";
		$data['view_file'] = "responseToEmail";
                echo Modules::run('Templates/main_page', $data);
                
                
            }else{
                
                
                echo 'oops an error has occured please try again in a moment';
            }
           
           
          /*     $this->load->library('email');

            $name = $this->input->post('name');
            $email = $this->input->post('email');
           $message= $this->input->post('message');

            $this->email->from($email, $name);
            $this->email->to('you@domain.com');

            $this->email->subject('Subject');
            $this->email->message($message);
            if($this->email->send())
            {
                echo $this->email->print_debugger();
                //redirect('contact-us/thanks', 'location');
            }
           else
           {
            echo 'Something went wrong...';
           }*/
            
            
            
            
        }
        function get_data_from_post(){
           
            $data['name'] =$this->input->post('name', TRUE);
            $data['fromEmail'] =$this->input->post('fromEmail', TRUE);
            $data['subject'] = $this->input->post('subject', TRUE);
            $data['message'] = $this->input->post('message', TRUE);
            return $data;
    }

}
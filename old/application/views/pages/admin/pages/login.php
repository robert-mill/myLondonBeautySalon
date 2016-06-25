<!DOCTYPE html> 
<html lang="en-US">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container login">
      <?php 
      $attributes = array('class' => 'form-signin');
	  if($this->session->userdata('is_logged_in')){	
			echo "<div class='col-md-3' style='border:2px solid #000; padding:20px'>";
			echo anchor('admin/signup', '<div class="btn btn-large btn-primary">Add User!</div>');
			echo '</div>';
		}else{
		  echo form_open('ci-my-admin/admin/login/validate_credentials', $attributes);
			
				
			
				  echo '<h2 class="form-signin-heading">Login</h2>';
				  echo form_input('user_name', '', 'placeholder="Username"');
				  echo form_password('password', '', 'placeholder="Password"');
				  if(isset($message_error) && $message_error){
					  echo '<div class="alert alert-error">';
						echo '<a class="close" data-dismiss="alert">×</a>';
						echo '<strong>Oh snap!</strong> Change a few things up and try submitting again.';
					  echo '</div>';             
				  }
				  echo "<br />";
				  echo "<br />";
				  echo "<br />";
				echo form_submit('submit', 'Login', 'class="btn btn-large btn-primary"');
		  echo form_close();
	  }
      ?>      
    </div><!--container-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>    
    
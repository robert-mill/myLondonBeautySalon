<div class="container top">
	<ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url("Mlbs_categories"); ?>">
			<?php echo ucfirst($this->uri->segment(1));?>
		</a>
                <span class="divider">/</span>
            </li>
            <li class="active">
		  <?php echo ucfirst($this->uri->segment(2));?>
	    </li>
        </ul>
    	<div class="page-header users-header">
		<h2>
                    <a  href="/Mlbs_categories/add" class="btn btn-success">Add a new!</a>
                </h2>
	</div>
    <div class="row">
        <div class="span12 columns">
            <div class="well">
              <?php
                    $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
                    $data = array('enctype' => 'multipart/form-data');  
            
                
                echo form_open('Mlbs_categories/process/add_category', $data); 
                    echo "".form_hidden('id');
                    echo "<br>Title".form_input('title');
                    echo "<br>Desc".form_textarea("description"). '<br>';
                   
                  
                   echo form_submit('submit', 'Add category', "class='submit'");
                echo form_close();
              ?>
            </div>
            
            
        </div>
    </div>
    
</div>
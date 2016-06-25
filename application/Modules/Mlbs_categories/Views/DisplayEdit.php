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
		
	</div>
    <div class="row">
        <div class="span12 columns">
            <div class="well">
              <?php
                    $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
                    $data = array('enctype' => 'multipart/form-data');  
                $cat_id = isset($query["id"])?$query["id"]:0;
                $title = isset($query["title"])?$query["title"]:"";
                $desc = isset($query["description"])?$query["description"]:"";
                echo form_open('Mlbs_categories/edit_category', $data); 
                    echo "".form_input('id',$cat_id);
                    echo "<br>Title".form_input('title',$title);
                    echo "<br>Desc".form_textarea("description",$desc). '<br>';
                   
                  
                   echo form_submit('submit', 'Edit category', "class='submit'");
                echo form_close();
              ?>
            </div>
            
            
        </div>
    </div>
    
</div>
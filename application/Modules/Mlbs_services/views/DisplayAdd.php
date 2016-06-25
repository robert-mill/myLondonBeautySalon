<div class="container top">
	<ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url("Mlbs_services"); ?>">
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
			<?php echo ucfirst($this->uri->segment(2));?> 
			<!--<a  href="<?php echo site_url("Mlbs_services").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>-->
                    <a  href="/Mlbs_services/add" class="btn btn-success">Add a new!</a>
                </h2>
	</div>
    <div class="row">
        <div class="span12 columns">
            <div class="well">
              <?php
                    $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
                    $data = array('enctype' => 'multipart/form-data');  
                   
                foreach ($categories as $row):
                    
                    $options_category[$row['id']] = $row['title'];
                endforeach;
                
                echo form_open('Mlbs_services/process/add_service', $data); 
                    echo "".form_hidden('id');
                    echo "<br>TITLE".form_input('title');
                    echo form_textarea("description"). '<br>';
                    echo '<select id="cidss" name="cat_id">';
                        foreach ($categories as $item){
                            echo "<option value='".$item['id']."'>".$item['title']."</option>"; 
                        } 
                    echo '</select><br>';
                        
                    echo "Time:".form_input("time")."<br>";
                    echo '<div>';
                    echo "Price:".form_input("price")." ";
                    echo " Discount Price:".form_input("discount_price")."</div>";
                   if(isset($file_data)){
                        echo form_input("image",$file_data['file_name']);   
                   }
                   echo '<input type="file" name="userfile"  /><div id="result_show"></div>';
                    if(isset($file_data)){
                        echo form_input("image",$file_data['file_name']);   
                    }
                   echo form_submit('submit', 'Add new', "class='submit'");
                echo form_close();
              ?>
            </div>
            
            
        </div>
    </div>
    
</div>
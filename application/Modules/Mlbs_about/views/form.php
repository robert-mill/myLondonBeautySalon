<?php
	echo validation_errors("<p style='color:red;'>",'</p>');
	echo form_open("/Mlbs_about/process");
	echo "Title!";
	echo form_input('title', $title);
	echo "<br>";
	echo "Sub title: ";
	echo form_input('sub_title',$sub_title);
        echo "Body Text:xx";
	echo form_textarea('description', $description);
        
	if(isset($update_id)){
		echo form_input('id',$id);
	}else{
                echo form_input('id',$this->uri->segment(3));
        }
        
      
	echo "<br>";
        echo form_submit('addImage','Add Image');
	echo form_submit('submitForm','Submit');
	echo form_close();
<?php
	echo validation_errors("<p style='color:red;'>",'</p>');
	echo form_open("/Mlbs_about/process");
	echo "Title";
	echo form_input('title', $title);
	echo "<br>";
	echo "Sub text: ";
	echo form_input('sub_text',$sub_text);
        echo "Body text: ";
        echo form_textarea('body_text',$body_text);
        
        echo "<br>";       
	if(isset($update_id)){
		echo form_input('id',$id);
	}else{
                echo form_input('id',$this->uri->segment(3));
        }
      
	echo "<br>";
        echo form_submit('addImage','Add Image');
	echo form_submit('submitForm','Submit');
	echo form_close();
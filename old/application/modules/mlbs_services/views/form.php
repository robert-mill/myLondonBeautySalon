<?php
	echo validation_errors("<p style='color:red;'>",'</p>');
	echo form_open("/mlbs_services/process");
	echo "Title";
	echo form_input('title', $title);
	echo "<br>";
	echo "Description: ";
	echo form_textarea('description',$description);
        echo "<br>";
        echo form_input('cat_id', $cat_id);
	if(isset($update_id)){
		echo form_input('id',$id);
	}else{
                echo form_input('id',$this->uri->segment(3));
        }
        echo "Time";
	echo form_input('time', $time);
        echo "Price";
	echo form_input('price', $price);
	echo "<br>";
        echo "Discount Price";
	echo form_input('discount_price', $price);
	echo "<br>";
        echo form_submit('addImage','Add Image');
	echo form_submit('submitForm','Submit');
	echo form_close();
<?php
	echo validation_errors("<p style='color:red;'>",'</p>');
	echo form_open("services/submit");
	echo "Title";
	echo form_input('title', $title);
	echo "<br>";
	echo "Description: ";
	echo form_textarea('description',$description);
        echo "<br>";
	if(isset($update_id)){
		echo form_hidden('update_id',$update_id);
	}
        echo "Price";
	echo form_input('price', $price);
	echo "<br>";
	echo form_submit('submit','submit');
	echo form_close();
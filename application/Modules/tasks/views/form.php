<?php
	echo validation_errors("<p style='color:red;'>",'</p>');
	echo form_open("tasks/submit");
	echo "Title";
	echo form_input('title', $title);
	echo "<br>";
	echo "Priority: ";
	echo form_input('priority',$priority);
	if(isset($update_id)){
		echo form_hidden('update_id',$update_id);
	}
	echo "<br>";
	echo form_submit('submit','submit');
	echo form_close();
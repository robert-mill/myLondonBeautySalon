<?php
	echo validation_errors("<p style='color:red;'>",'</p>');
	echo form_open("admin/submit");
        echo "ID";
	echo form_input('id', $id);
	echo "Title";
	echo form_input('title', $title);
	echo "<br>";
	echo "Description: ";
	echo form_input('description',$description);
        echo "time: ";
	echo form_input('time',$time);
        echo "price ";
	echo form_input('price',$price);
        echo "dprice ";
	echo form_input('dprice',$dprice);
        echo "<select name='cat_id' id='cat_id'>";
            foreach($cats as $key=>$val){
            echo "<option val='".$val["id"]."'>".$val["title"]."</option>";
            }
	echo "</select>";
       
        
        
        
        if(isset($update_id)){
		echo form_hidden('update_id',$update_id);
	}
	echo "<br>";
	echo form_submit('submit','submit');
	echo form_close();
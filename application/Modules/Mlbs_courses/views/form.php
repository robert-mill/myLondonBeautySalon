<?php
        //echo "XYZ" . $service_id_fk;
	echo validation_errors("<p style='color:red;'>",'</p>');
	echo form_open("Mlbs_courses/submit");
	echo "Service ID";
	echo form_input('service_id_fk', $service_id_fk);
	echo "<br>";
	echo "Title/Description: ";
        
            echo form_input('title_desc');
	
        echo "<br>";
	
        echo "Course Price";
	echo form_input('course_price');
        echo "Discount Price";
	echo form_input('course_discount_price');
         
         
	echo "<br>";
	echo form_submit('submit','submit');
	echo form_close();
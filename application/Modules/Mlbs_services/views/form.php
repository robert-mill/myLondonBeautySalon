<?php
    echo '<div class="col-lg-12 col-sm-6 offset-0">';
	echo validation_errors("<p id='errorMsg' style='color:red;'>",'</p>');
	echo form_open("/Mlbs_services/process");
        echo '<div class="col-lg-12 col-sm-6 offset-0" >';
	echo "Title: ";
	echo form_input('title', $title);
	echo "</div>";
        echo '<div class="col-lg-12 col-sm-6 offset-0" >';
            echo '<div class="col-lg-5 col-sm-3 offset-0" >';
                echo "Description: ";
                echo form_textarea('description',$description);
            echo "</div>";
            echo '<div class="col-lg-5 col-sm-3 offset-0" >';
                echo "Image: ";
                echo form_hidden('image',$image);
                if($image){
                    echo '<img src="'.base_url().'assets/uploaded_images/'.$image.'"/>';
                }
                
            echo "</div>";
        echo "</div>";
        
        
        echo '<div class="col-lg-12 col-sm-6 offset-0" >';


        //echo form_input('cat_id', $cat_id);
	
        if(isset($update_id)){
		echo form_hidden('id',$id);
	}else{
                echo form_hidden('id',$this->uri->segment(3));
        }
        $catArr=[];
        foreach($categories as $row){
          $catArr[$row['id']]= $row['title'];  
        }
        
        
        echo "</div>";
        echo '<div class="col-lg-12 col-sm-6 offset-0" >';
            echo "Category: ".form_dropdown('cat_id',$catArr, $cat_id);
        echo "</div>"; 
        echo '<div class="col-lg-12 col-sm-6 offset-0" >';
        echo "Time:". form_input('time', $time);
        
                echo "  Price: ".form_input('price', $price);
                echo "  Discount Price: ".form_input('discount_price', $price);
        echo "</div>"; 
        echo "<div class='col-lg-12 col-sm-6 offset-0' ><div class='col-lg-6 col-sm-3 offset-0 addImgBtn' >".form_submit('addImage','Add Image');
	echo "</div><div  class='col-lg-6 col-sm-3 offset-1 frmSubmitBtn' >".form_submit('submitForm','Submit')."</div></div>";
	echo form_close();
    echo '</div>';

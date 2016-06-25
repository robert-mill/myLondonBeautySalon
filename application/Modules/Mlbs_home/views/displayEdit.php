<?php

echo anchor('Mlbs_home/create', '<p class="btn btn-success">Add Home Article</p>');
  ///echo '<h1>Just changing a few things 24/6/16</h1>';  
echo '<ul>';
$i=0; 
//var_dump($query->result());

//var_dump($query->result());
 foreach($query->result() as $key=>$val){
     
     $vid = isset($val->id)?$val->id:0;
     $vtitle = isset($val->title)?$val->title:"";
     $vsubTitle = isset($val->sub_title)?$val->sub_title:"";
     $vdescription = isset($val->description)?$val->description:"";
     $vimage = isset($val->image)?$val->image:"";
 echo '<li>';
 echo "<div class='row'>";
    echo '<div class="col-lg-5 col-sm-2 ">';
        echo "<div class='span5 col-lg-5 col-sm-2'><h2>".$vtitle.'</h2></div>';
        echo "<div class='span5 col-lg-5 col-sm-2'>".$vsubTitle.'</div>';
        echo "<div class='span5 col-lg-5 col-sm-2'>".$vdescription.'</div>';
        echo form_open('Mlbs_home/process/save/'.$vid);
            echo "<br>Image: ".form_input('id',$vid); 
            echo "<br>Title: ".form_input('title',$vtitle);
            echo "<br>Sub Title: ".form_input('sub_title',$vsubTitle);
            
            echo "<br>Description: ".form_textarea('description',$vdescription);
        if($vimage!==""){
            echo "<br>Image: ".form_input('image',$vimage);
           
            
            
            echo '<br><img src="'.base_url()."assets/uploaded_images/".$vimage.'" style="width:75px;"/>'; 
        }
        echo '<p>Select/Change Image<input type="file" name="userfile" value="'.$vimage.'" /></p><div id="result_show"></div>';
        
        echo form_submit('addImage','Update'); 
       echo form_close();
       //echo '<a href="/Mlbs_home/process/edit/'.$vid.'" >Edit</a>';
    echo '</div>';
 echo '</div>';
 echo '</li>';
 }
echo '</ul>';
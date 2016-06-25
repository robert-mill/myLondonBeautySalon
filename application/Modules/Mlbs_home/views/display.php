<?php

echo anchor('Mlbs_home/create', '<p class="btn btn-success">Add Home Article</p>');
  echo '<h1>Just changing a few things 20/6/16</h1>';  
echo '<ul>';
$i=0; 
 foreach($query as $key=>$val){
     $vid = isset($val['id'])?$val['id']:0;
     $vtitle = isset($val['title'])?$val['title']:"";
     $vsubTitle = isset($val["sub_title"])?$val["sub_title"]:"";
     $vdescription = isset($val['description'])?$val['description']:"";
     $vimage = isset($val['image'])?$val['image']:"";
 echo '<li>';
 echo "<div class='row'>";
    echo '<div class="col-lg-5 col-sm-2 ">';
        echo "<div class='span5 col-lg-5 col-sm-2'><h2>".$vtitle.'</h2></div>';
        echo "<div class='span5 col-lg-5 col-sm-2'>".$vsubTitle.'</div>';
        echo "<div class='span5 col-lg-5 col-sm-2'>".$vdescription.'</div>';
        if($vimage!==""){
            echo '<img src="'.base_url()."assets/uploaded_images/".$vimage.'" style="width:75px;"/>'; 
        }
       echo '<a href="Mlbs_home/edit/'.$vid.'" >Edit</a>';
    echo '</div>';
 echo '</div>';
 echo '</li>';
 }
echo '</ul>';
<?php

echo anchor('Mlbs_about/create', '<p class="btn btn-success">Add  About Article</p>');
    foreach($query as $ky=>$val){
        foreach($val as $data){
            echo $data;
        }
        
    }
    
/*echo '<ul>';
$i=0;
    foreach($query as $key=>$val){
        echo '<li>';
          echo '<div class="col-lg-4 col-sm-6 offset-0">';
           
            
            echo "<div class='col-lg-3 col-sm-2'>".$val['title'].'</div>';
            echo "<div>".$val['description'].'</div>';
            echo "<div>".$val['time'].'</div>';
            echo "<div>".$val['price'].' _ ';
            echo "".$val['discount_price'].'</div>';
            ///echo $val['image'];
                echo '<div class="courses col-lg-3 col-sm-2">';
                  
                    
                foreach($courses as $keyt=>$valt){
                    
                    if(count($valt)>0){
                        echo '<h4  class="courses col-lg-3 col-sm-2">Courses</h4>';
                        //echo "bbb". count($valt[$keyt]['title_desc']);
                        foreach($valt as $kt=>$vt){

                            if($val["id"]==$vt['service_id_fk']){
                              echo $vt['title_desc']."<br>";
                            }
                        }
                    }
                   
                }
                echo '</div>';
           
            $i++;
            echo '</div>'; 
            if($val['image']){
                 echo '<img src="'.base_url()."assets/uploaded_images/".$val['image'].'" style="width:75px;"/>';
            }else{
               // echo '<a href="mlbs_about/process/add_Image" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Image</a>';  
               echo form_open("Mlbs_about/process/addImage");
               
                if(isset($update_id)){
                        echo form_input('id',$id);
                }elseif( is_numeric($this->uri->segment(3)) ){
                        echo form_input('id',$this->uri->segment(3));
                }else{
                    
                    echo form_input('id',$val['id']);
                }
                echo form_input('title',$val['title']);
                echo form_input('cat_id',$val['cat_id']);
                echo form_input('description',$val['description']);
                echo form_input('time',$val['time']);
                echo form_input('price',$val['price']);
                echo form_input('discount_price',$val['discount_price']);
                echo form_submit('addImage','Add Image');
                echo form_close();
                
            }
        echo '<div class="button_box col-lg-3 col-sm-2 offset-1">';
        echo '<div class="image_box col-lg-2 col-sm-2 ">';
        echo '<a href="Mlbs_about/delete_Image/'.$val["id"].'" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i> Image</a>';
        echo '</div>';
        echo '<div class="image_box  col-lg-2 col-sm-2 ">';
        echo '<a href="Mlbs_about/delete_service/'.$val["id"].'" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i> Service</a><a href="create/'.$val["id"].'" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a><a href="mlbs_about/create/'.$val["id"].'" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Course</a>';
        echo '</div>';
        echo '</div></li>';
    }
echo '</ul>';
 * 
 */
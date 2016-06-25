<?php

//echo anchor('Mlbs_about/create', '<p class="btn btn-success">Add Home Article</p>');
    
    
echo '<ul>';
$i=0;
    foreach($query as $key=>$val){
        echo '<li>';
          echo '<div class="col-lg-12 col-sm-6">';
           
            
            echo "<div class='col-lg-3 col-sm-2'>".$val['title'].'</div>';
            echo "<div class='col-lg-3 col-sm-2'>".$val['sub_title'].'</div>';
            echo "<div>".$val['description'].'</div>';
            
            
            //echo $val['image'];
               
           
            $i++;
            echo '</div>'; 
            echo '<div class="col-lg-12 col-sm-6">';
           // if($val['image']){
           //      echo '<img src="'.base_url()."assets/uploaded_images/".$val['image'].'" style="width:75px;"/>';
           // }else{
               // echo '<a href="mlbs_services/process/add_Image" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Image</a>';  
              
            echo form_open("Mlbs_about/process/updateAbout/".$val['id']);
               
                if(isset($update_id)){
                        echo form_hidden('id',$id);
                }elseif( is_numeric($this->uri->segment(3)) ){
                        echo form_hidden('id',$this->uri->segment(3));
                }else{
                    
                    echo form_hidden('id',$val['id']);
                }
              if($val['image']){
                echo '<div><img src="'.base_url()."assets/uploaded_images/".$val['image'].'" style="width:75px;"/></div>';
              }
              
              $vimage = isset($val['image'])?$val['image']:"";
              $vtitle = isset($val['title'])?$val['title']:"";
              $vsub_title = isset($val['sub_title'])?$val['sub_title']:"";
              $vdescription = isset($val['description'])?$val['description']:"";
              
              ?>

                <div class="content-section-a">    
                       <div class="container">
                        
                            <div class="row">
                                <div class="col-lg-5 col-sm-6">
                                    <!--<div>Image : <?=form_input('image',$vimage)?></div>-->
                                </div>
                                <div class="col-lg-5 col-sm-6">
                                    <div>Title : <?=form_textarea('title',$vtitle)?></div>
                                </div>
                                <div class="col-lg-5 col-sm-6">
                                    <div>Sub Title : <?=form_input('sub_title',$vsub_title )?></div>
                                </div>
                                <div class="col-lg-5 col-sm-6">
                                    <div>Description : <?=form_textarea('description',$vdescription)?></div>
                                </div>
                            </div>
                       </div>                          
                </div>
<?php
              
               // echo "<div><Image: ".form_input('image',$val['image'])."</div>";
                //echo "Title..: ".form_input('title',$val['title']);
                //echo "Sub Title".form_input('sub_title',$val['sub_title']);
               // echo "Description: ".form_textarea('description',$val['description']);
                echo form_submit('addImage','Update About');
                echo form_close();
                echo '</div>';
          //  }
       
        echo '</div></li>';
    }
echo '</ul>sss';

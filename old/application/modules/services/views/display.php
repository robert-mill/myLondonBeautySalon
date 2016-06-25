<?php
	$i=0;
		//echo anchor('tasks/create', '<p>Create new Tasks</p>');
        $idArray = array();
        $divClassA = "content-section-a";
        $servId =0;
        $servId2 =0;
         $course=""; 
		foreach($query->result() as $row){
                     
                                    $servId = $row->id;
                                    foreach($query->result() as $crow){
                                          if($servId===$crow->id){
                                              if($crow->course){


                                             $course = $course."<div class='course_price'>".$crow->course." &nbsp;&nbsp;&nbsp; Price:&#163;<span class='price'>".$crow->course_price."</span> &nbsp;&nbsp;&nbsp; <span class='course_discount_price'>Now:&#163;".$crow->course_discount_price."</span></div>"; 
                                              }

                                          }
                                    }
                            
                            
                                    if(array_key_exists("id_".$row->id, $idArray)){

                                    }else{ 
                                                if(($i%2)<1){
                                                    $i++;
                                                    echo '<div class="content-section-a">';
                                                ?>
                                                    <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-sm-6">
                                                            
                                                            <div class="clearfix"></div>                                                
                                                                <?php
                                                                    echo "<h2 class='section-heading'>" . $row->title . "</h2>";
                                                                    echo "<p class='lead'>".$row->description."</p>"; 
                                                                    echo "<div class='time_price'><p><span class='time'>Time ".$row->time."mins </span> &nbsp;&nbsp;&nbsp; <span class='price'>Price &#163;".$row->price."</span> <span class='discount_price'>Now &#163;".$row->price."</span></p></div>";
                                                                    echo $course;
                                                                ?>
                                                        </div>      
                                                        <div class="col-lg-5 col-lg-offset-2 col-sm-6"> 
                                                            <img class="servImg" src="<?php echo base_url();?>assets/uploaded_images/<?php echo $row->image;?>" />
                                                        </div>   

                                                    </div>       
                                                </div><!-- /.container -->
                                            </div><!-- /.content-section-a -->
                                            <?php
                                                }else{
                                                    $i=0;
                                                    echo '<div class="content-section-b">';
                                            ?>
                                                    <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                                                            
                                                            <div class="clearfix"></div>                                                
                                                                <?php
                                                                    echo "<h2 class='section-heading'>" . $row->title . "</h2>";
                                                                    echo "<p class='lead'>".$row->description."</p>"; 
                                                                    echo "<div class='time_price'><p><span class='time'>Time ".$row->time."mins </span> &nbsp;&nbsp;&nbsp; <span class='price'>Price &#163;".$row->price."</span> <span class='discount_price'>Now &#163;".$row->price."</span></p></div>";
                                                                    echo $course;
                                                                ?>
                                                        </div>      
                                                        <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                                                            <img class="servImg" src="<?php echo base_url();?>assets/uploaded_images/<?php echo $row->image;?>" />
                                                        </div>   

                                                    </div>       
                                                </div><!-- /.container -->
                                            </div><!-- /.content-section-a -->
                                            <?php
                                                } 
                                            ?> 
                                             
                                           
                                            
                                                


                                            <?php
                                        $idArray["id_".$row->id]="id_".$row->id;  
                                    }
                                                
                           $course="";          
                        
                        //echo "<hr>";
                    }	
		
		
		
?>
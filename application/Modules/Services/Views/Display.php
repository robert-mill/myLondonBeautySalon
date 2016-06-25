<div id="topBx" ></div>
<?php
	$i=0;
		//echo anchor('tasks/create', '<p>Create new Tasks</p>');
        $idArray = array();
        $headArray= array();
        $catArray =array();
        $arrArrblk = array();
        $divClassA = "content-section-a";
        $servId =0;
        $servId2 =0;
        $course="";
        $prams=[];
        $optionArray = Modules::run("Options/getAll",$prams);
        $arrArrass = Modules::run("Deals/getCurrentDeals","id");
        $params = array("service_id_fk"=>44);
        
       
        $prams =[];
        setlocale(LC_MONETARY, 'en_GB.UTF-8');
        $cid =$this->uri->segment(3);
        $collink =  isset($cid)?$cid:1;
        ?>
<style>
    .sel<?=$collink?>{
        color:blueviolet;
    }
</style>
    
        <?php
        
        
        echo '<div class="container">';
        
          
          foreach(Modules::run("Categories/getCurrentCategories",$prams) as $key=>$srvd){
         
                echo "<span class='col-lg-3 col-sm-2 subNav sel".$srvd['id']."' id=".$srvd['id'].">".$srvd['head']."</span>";
              
               
            }
        
        echo '</div>';        
        echo '<div class="container">';         
                foreach($services->result() as $key=>$rowa){
                   // echo "".$rowa->head."..<br>";
                 //   if(!in_array($rowa->head,  $headArray)){
                 //      echo "<span class='col-lg-3 col-sm-2 confHead' id='".$rowa->head."'>".$rowa->head."</span>";
                 //      array_push($headArray, $rowa->head);
                 //   }
                  
                }
                
            echo '</div>';
          $optArr =[];  
        foreach($services->result() as $row){
            $servId = $row->id;
          
            if(array_key_exists("id_".$row->id, $idArray)){

            }else{ 
                if(($i%2)<1){
                    $i++;
                    $areaBox = "<div class='col-lg-12 col-sm-6' style='border:1px solid #ccc;'>";
                    
                    
                    $areaBox .= "</div>";
                    
                    $optArrBox = "<div class='col-lg-12 col-sm-6' style='border:1px solid #ccc;'>";
                     foreach ($optionArray as $optss):
                       
                        if($optss['service_id_fk']==$row->id):
                         $optArr[$row->id]= array(
                             'description'=>$optss['description'],
                             'price'=>$optss['price'],
                             'promotional_price'=>$optss['promotional_price'] ,
                         ); 
                        $optArrBox = $optArrBox ."<span class='opdesc'>".$optArr[$row->id]['description'] ." </span>&nbsp;&nbsp;&nbsp;&nbsp; <span class='opPrice'> ".money_format("%n",$optArr[$row->id]['price'])."</span> <span class='opProPrice'>".money_format("%n",$optArr[$row->id]['promotional_price'])."</span><br>";
                        endif;
                    endforeach;
                   $optArrBox =  $optArrBox. "</div>"; 
                   
                  $arrArrblk = "<div class='col-lg-12 col-sm-6' style='border:1px solid #ccc;'>";
                   
                   foreach ($arrArrass as $arrs):
                        if($arrs['service_id_fk']==$row->id):
                            $time ="";
                            $isicp ="";
                            $sessType="";
                            $price="";
                            $time = (isset($arrs["time"])&&$arrs["time"]!==null&&$arrs["time"]>0)?"<span class='optime'>".$arrs["time"]."mins</span> ":"";
                            $isicp = (isset($arrs["promotional_price"])&&$arrs["promotional_price"]>0.00&&$arrs["promotional_price"]!="")?"<span class='opdescP'>now ".money_format("%n",$arrs["promotional_price"])."</span>":"";
                            $sessType = (isset($arrs["sessiontype"])&&$arrs["sessiontype"]!="")?"<span class='sessType'>".$arrs["sessiontype"]."</span>":"";
                            $price = (isset($arrs['price'])&&$arrs['price']>0.00&&$arrs['price']!="")?"<span class='opdescN'>".money_format("%n",$arrs['price'])."</span>":"";
                            $text = (isset($arrs["text"])&&$arrs["text"]!=null)?"<span class=' opdescl'>".$arrs["text"]."</span> ":"";
                            $priceStr = "<span class='pricewhole'>".$price.$isicp.$sessType."</span>"; 
                            $arrArrblk = $arrArrblk . "<div class='row-fluid arrBx'>".$text.$time.$priceStr."  </div>" ; 
                        endif;
                   endforeach;
                   $arrArrblk = $arrArrblk ."</div>"
                           
                           
                   
                   
                   
?>
                    <div class="content-section-a">
                        <div class="container prodBlock se">
                            <div class="row">
                                <div class="col-lg-5 col-sm-6">
                                    <div class="clearfix"></div>                                                
                                        <?php
                                            echo "<h2 class='section-heading'>" . $row->title . "</h2>";
                                            echo "<p class='lead'>".$row->description."</p>"; 
                                            
                                            $timeStr = ($row->time>0)?"<span class='time'>Time ".$row->time."mins </span>":"";
                                            $mprice = ($row->price>0.01)?"<span class='pricewhole'>Price ".money_format("%n",$row->price)."</span>":"";
                                            $dprice = ($row->discount_price>0.01)?"<span class='discount_price'>Now ".money_format("%n",$row->discount_price)."</span>":"";
                                            echo "<div class='time_price'><p>".$timeStr." &nbsp;&nbsp;&nbsp; ".$mprice."&nbsp;&nbsp;".$dprice."</p></div>";

                                            
                                            echo $arrArrblk;
                                            if(isset($optArr[$row->id])):
                                                echo $optArrBox;
                                            endif;
                                            
                                        ?>
                                </div>
                                <div class="col-lg-5 col-lg-offset-2 col-sm-6"> 
                                    <?php
                                        $imgarr = ($row->image)?$row->image:"logoBanner.svg";
                                    ?>
                                    <img class="servImg" src="<?php echo base_url();?>assets/uploaded_images/<?php echo $imgarr;?>" />
                                </div>
                            </div>
                        </div>
                    </div>
<?php               
                }else{
                     $i=0;
                     $optArrBox = "<div class='col-lg-12 col-sm-6' style='border:1px solid #ccc;'>";
                     foreach ($optionArray as $optss):
                        if($optss['service_id_fk']==$row->id):
                         $optArr[$row->id]= array(
                             'description'=>$optss['description'],
                             'price'=>$optss['price'],
                             'promotional_price'=>$optss['promotional_price'] ,
                         ); 
                        $optArrBox = $optArrBox ."<span class='opdesc'>".$optArr[$row->id]['description'] ."</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class='opPrice'>".money_format("%n",$optArr[$row->id]['price'])."</span> <span class='opProPrice'>".money_format("%n",$optArr[$row->id]['promotional_price'])."</span><br>";
                        endif;
                    endforeach;
                     $optArrBox =  $optArrBox. "</div>";
                     
                      $arrArrblk = "<div class='col-lg-12 col-sm-6' style='border:1px solid #ccc;'>";
                   
                   foreach ($arrArrass as $arrs):
                        if($arrs['service_id_fk']==$row->id):
                            $time ="";
                            $isicp ="";
                            $sessType="";
                            $price="";
                            $time = (isset($arrs["time"])&&$arrs["time"]!==null&&$arrs["time"]>0)?"<span class='optime'>".$arrs["time"]."mins</span> ":"";
                            $isicp = (isset($arrs["promotional_price"])&&$arrs["promotional_price"]>0.00&&$arrs["promotional_price"]!="")?"<span class='opdescP'>now ".money_format("%n",$arrs["promotional_price"])."</span>":"";
                            $sessType = (isset($arrs["sessiontype"])&&$arrs["sessiontype"]!="")?"<span class='sessType'>".$arrs["sessiontype"]."</span>":"";
                            $price = (isset($arrs['price'])&&$arrs['price']>0.00&&$arrs['price']!="")?"<span class='opdescN'>".money_format("%n",$arrs['price'])."</span>":"";
                            $text = (isset($arrs["text"])&&$arrs["text"]!=null)?"<span class=' opdescl'>".$arrs["text"]."</span> ":"";
                            $priceStr = "<span class='pricewhole'>".$price.$isicp.$sessType."</span>"; 
                            $arrArrblk = $arrArrblk . "<div class='row-fluid arrBx'>".$text.$time.$priceStr."  </div>" ;
                        endif;
                   endforeach;
                   $arrArrblk = $arrArrblk ."</div>"
                     
                     
?> 
                    <div class="content-section-b">
                        <div class="container prodBlock se">
                            <div class="row">                                
                                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                                    <div class="clearfix"></div>                                                
                                        <?php
                                            echo "<h2 class='section-heading'>" . $row->title . "</h2>";
                                            echo "<p class='lead'>".$row->description."</p>"; 
                                          
                                            $timeStr = ($row->time>0)?"<span class='time'>Time ".$row->time."mins </span>":"";
                                            $mprice = ($row->price>0.01)?"<span class='pricewhole'>Price ".money_format("%n",$row->price)."</span>":"";
                                            $dprice = ($row->discount_price>0.01)?"<span class='discount_price'>Now ".money_format("%n",$row->discount_price)."</span>":"";
                                            
                                            echo "<div class='time_price'><p>".$timeStr." &nbsp;&nbsp;&nbsp; ".$mprice."&nbsp;&nbsp;".$dprice."</p></div>";
                                             echo $arrArrblk;
                                            if(isset($optArr[$row->id])):
                                                echo $optArrBox;
                                            endif;
                                        ?>
                                </div>
                                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                                    <?php
                                        $imgarr = ($row->image)?$row->image:"logoBanner.svg";
                                    ?>
                                    <img class="servImg" src="<?php echo base_url();?>assets/uploaded_images/<?php echo $imgarr;?>" />
                                </div>
                                                        
                            
                        </div>
                        </div>
                    </div>
<?php
                }
            }
            
        }
        
        
 /*           echo '<div class="container">';
                foreach($query->result() as $rowa){
                    if(!in_array($rowa->head,  $headArray)){
                       echo "<span class='col-lg-3 col-sm-2 subNav' id='".$rowa->head."'>".$rowa->head."</span>";
                       array_push($headArray, $rowa->head);
                    }
                  
                }
                
            echo '</div>';

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
                                        echo $i;
                                                if(($i%2)<1){
                                                    $i++;
                                                    echo '<div class="content-section-a">';
                                                ?>
                                                    <div class="container prodBlock se<?php echo preg_replace('/\s+/', '', $row->head); ?>">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-sm-6">
                                                            
                                                            <div class="clearfix"></div>                                                
                                                                <?php
                                                                    echo "<h2 class='section-heading'>" . $row->title . "</h2>";
                                                                    echo "<p class='lead'>".$row->description."</p>"; 
                                                                    if($row->discount_price>0){
                                                                        echo "<div class='time_price'><p><span class='time'>Time ".$row->time."mins </span> &nbsp;&nbsp;&nbsp; <span class='price'>Price &#163;".$row->price."</span> <span class='discount_price'>Now &#163;".$row->discount_price."</span></p></div>";
    
                                                                    }else{
                                                                        echo "<div class='time_price'><p><span class='time'>Time ".$row->time."mins </span> &nbsp;&nbsp;&nbsp; <span class='pricewhole'>Price &#163;".$row->price."</span> <span class='discount_price'></span></p></div>";
                                                                    }
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
                                                    <div class="container prodBlock se<?php echo preg_replace('/\s+/', '', $row->head); ?>">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                                                            
                                                            <div class="clearfix"></div>                                                
                                                                <?php
                                                                    echo "<h2 class='section-heading'>" . $row->title . "</h2>";
                                                                    echo "<p class='lead'>".$row->description."</p>"; 
                                                                    if($row->discount_price>0){
                                                                        echo "<div class='time_price'><p><span class='time'>Time ".$row->time."mins </span> &nbsp;&nbsp;&nbsp; <span class='price'>Price &#163;".$row->price."</span> <span class='discount_price'>Now &#163;".$row->discount_price."</span></p></div>";
    
                                                                    }else{
                                                                        echo "<div class='time_price'><p><span class='time'>Time ".$row->time."mins </span> &nbsp;&nbsp;&nbsp; <span class='pricewhole'>Price &#163;".$row->price."</span> <span class='discount_price'></span></p></div>";
                                                                    }
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
		
*/		
		
?>
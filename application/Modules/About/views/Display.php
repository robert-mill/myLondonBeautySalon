<?php
    echo '<div class="container">';
    $i=0;
    $idArray = array();  
	
         
        foreach($query->result() as $val){
            
            if(array_key_exists("id_".$val->id, $idArray)){

            }else{
                if(($i%2)<1){
                    $i++;
                    
                    ?>
                    <div class="content-section-a">    
                       <div class="container">
                        
                            <div class="row">
                                <?php
                                    if($val->image){
                                ?>
                                <div class="col-lg-5 col-sm-6">
                                    <h2><?php echo $val->title; ?></h2>
                                    <h3><?php echo $val->sub_title; ?></h3>
                                    <p><?php echo $val->description; ?></p>
                                </div>
                                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                                <img class="homImg" src="<?php echo base_url();?>assets/uploaded_images/<?php echo $val->image;?>" />
                                </div>
                                <?php
                                    }else{
                                ?>
                                 <div class="col-lg-10 col-sm-6">
                                    <h2><?php echo $val->title; ?></h2>
                                    <h3><?php echo $val->sub_title; ?></h3>
                                    <p><?php echo $val->description; ?></p>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }else{
                    $i=0;
                    ?>
                        <div class="content-section-b">
                            <div class="row">
                                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                                    <h2><?php echo $val->title; ?></h2>
                                    <h3><?php echo $val->sub_title; ?></h3>
                                    <p><?php echo $val->description; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                                <img class="servImg" src="<?php echo base_url();?>assets/uploaded_images/<?php echo $row->image;?>" />
                            </div>
                        </div>
                <?php
                }
            }
            
            
            
        }
		
    echo '</div>';    
?>
<?php
     echo '<div class="container">';
	
		//echo anchor('tasks/create', '<p>Create new Tasks</p>');
        
       foreach($query->result() as $val){
          ?>
           <div class="content-section-a">    
                       <div class="container">
                        
                            <div class="row">
                                <div class="col-lg-5 col-sm-6">
          <?php
            echo "<h2>".$val->title."</h2>";
            echo "<p>".$val->body_text."</p>";
            ?>
                                </div>                       
                            </div>
                        </div>  
           </div>  
          <?php
            
        }	
	echo '</div> ';	
?>
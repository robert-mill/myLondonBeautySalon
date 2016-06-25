<?php
echo 'Success';


          echo '<div class="col-lg-4 col-sm-6 offset-0">';
           
            
            echo "<div class='col-lg-3 col-sm-2'><h4>".$data['title'].'</h4>';
            echo "<p>".$data['description'].'</p>';
            echo "<div>".$data['time'].'mins ';
            echo "&#163;".$data['price'].' _ &#163;';
            echo "".$data['discount_price'].'</div>';
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
           
            if($data['image']){
                 echo '<img src="'.base_url()."assets/uploaded_images/".$data['image'].'" style="width:75px;"/>';
            }
            echo '</div>'; 
            ?>
<script>
    $(function(){
       setTimeout(redirectOnThree,1000*3);
    });
    function redirectOnThree(){
        window.location.href = "http://localhost/comb/mlbs_services/";
    }
</script>
        


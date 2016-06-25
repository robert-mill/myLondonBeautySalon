<?php
echo 'Success';


          echo '<div class="col-lg-4 col-sm-6 offset-0">';
           
            
            echo "<div class='col-lg-3 col-sm-2'><h4>".$data['title'].'</h4>';
            echo "<p>".$data['description'].'</p>';
            echo "<p>".$data['address_1'].'</p>';
            echo "<p>".$data['address_2'].'</p>';
            echo "<p>".$data['address_3'].'</p>';
            echo "<p>".$data['post_code'].'</p>';
            echo "<p>".$data['email'].'</p>';
            echo "<p>".$data['phone'].'</p>';
            echo "<p>".$data['mobile'].'</p>';
            echo "<p>".$data['web_address'].'</p>';
            
            
            ///echo $val['image'];
                
           
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
        window.location.href = "<?php echo base_url();?>/Mlbs_contact/";
    }
</script>
        


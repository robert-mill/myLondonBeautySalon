<?php

//echo anchor('Mlbs_contact/create', '<p class="btn btn-success">Add Contact Article</p>');
echo '<ul>';
$i=0;
//ar_dump($query);
foreach($query as $key=>$val){
   
    $vid = (isset($val['id']))?$val['id']:"";
    $vtitle = (isset($val['title'])&&$val['title']!=="")?$val['title']:"";
    $vsub = (isset($val['sub_title'])&&$val['sub_title']!=="")?$val['sub_title']:"";
    $vdescription = (isset($val['description'])&&$val['description']!=="")?$val['description']:"";
    $vimage = (isset($val['image']))?$val['image']:"";
    $vid = (isset($vid))?$vid:0;
    $vaddress_1 = (isset($val['address_1'] ))?$val['address_1'] :"";
    $vaddress_2 = (isset($val['address_2'] ))?$val['address_2'] :"";
    $vaddress_3 = (isset($val['address_3'] ))?$val['address_3'] :"";
    $vemail = (isset($val['email'] ))?$val['email'] :"";   
    $vphone = (isset($val['phone'] ))?$val['phone'] :"";
    $vmobile = (isset($val['mobile'] ))?$val['mobile'] :"";
    $vweb_address = (isset($val['web_address'] ))?$val['web_address'] :"";
    echo "<li>";
        echo '<div class="col-lg-4 col-sm-6 offset-0">';
           echo "<div class='col-lg-3 col-sm-2'>".$vtitle .'</div>'; 
           echo "<div class='col-lg-3 col-sm-2'>".$vsub.'</div>';
           echo "<div>".$vdescription.'</div>';
           echo "<div>Image: ".$vimage.'</div>';
           echo "<div>Address 1: ".$vaddress_1.'</div>';
           echo "<div>Address 2: ".$vaddress_2.'</div>';
           echo "<div>Address 3: ".$vaddress_3.'</div>';
           echo "<div>Email: ".$vemail.'</div>';
           echo "<div>Web: ".$vweb_address.'</div>';
           echo "<div>Phone: ".$vphone.'</div>';
           echo "<div>Mobile: ".$vmobile.'</div>';
           $i++;
        
        echo '<div class="button_box col-lg-3 col-sm-2 offset-1">';
            echo '<a href="Mlbs_contact/edit/'.$vid.'">Edit</a>';
            //echo '<a href="Mlbs_contact/delete/'.$vid.'">Delete</a>';
        echo '</div>';
        
    echo "</li>";
}
echo '</ul>';
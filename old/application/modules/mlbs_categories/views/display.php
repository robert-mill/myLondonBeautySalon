<?php

//echo anchor('tasks/create', '<p>Create new Tasks</p>');

echo '<ul class="course_list">';
    foreach($query as $key=>$val){
           echo "<li><span class='course_id'>".$val['id'];
           echo $val['service_id_fk']."</span>";
           echo "<span class='course_title'>".$val['title_desc']."</span>";
           echo "<span class='course_price'>".$val['course_price']."</span>";
           echo "<span class='course_discount_price'>".$val['course_discount_price']."</span></li>";
      //  echo $val['description'];
     //   echo $val['time'];
     //   echo $val['price'];
     //   echo $val['discount_price'];
     //   echo $val['image'];
     ///   echo '<a href="mlbs_services/create/'.$val["id"].'">Edit</a>';

    }
echo '</ul>';
<?php
    $query = isset($query)?$query:"";
    $vid = isset($query['id'])?$query['id']:null;
    $vtitle = isset($query['title'])?$query['title']:"";
    $vdescription = isset($query['description'])?$query['description']:"";
    $vaddress1 = isset($query['address_1'])?$query['address_1']:"";
    $vaddress2 = isset($query['address_2'])?$query['address_2']:"";
    $vaddress3 = isset($query['address_3'])?$query['address_3']:"";
    $vpost_code = isset($query['post_code'])?$query['post_code']:"";
    $vemail = isset($query['email'])?$query['email']:"";
    $vphone = isset($query['phone'])?$query['phone']:"";
    $vmobile = isset($query['mobile'])?$query['mobile']:"";
    $vweb_address = isset($query['email'])?$query['web_address']:"";
    $vimage = isset($query['image'])?$query['image']:"";
     echo form_open('Mlbs_contact/process/edit/', $query);
        echo '<div class="span5 col-lg-5 " style="border:1px solid #ccc;">';
        echo "<br><span class='fromText'></span>".form_hidden('id', $vid );
        echo "<br><span class='fromText'>Title</span>".form_input('title', $vtitle );
        echo "<br><span class='fromText'>Description</span>".form_input('description',$vdescription);
        echo "<br><span class='fromText'>Address 1</span>".form_input('address_1',$vaddress1);
        echo "<br><span class='fromText'>Address 2</span>".form_input('address_2',$vaddress2);
        echo "<br><span class='fromText'>Address 3</span>".form_input('address_3',$vaddress3);
        echo "<br><span class='fromText'>Post Code</span>".form_input('post_code',$vpost_code);
        echo "<br><span class='fromText'>Email</span>".form_input('email',$vemail);
        echo "<br><span class='fromText'>Phone</span>".form_input('phone',$vphone);
        echo "<br><span class='fromText'>Mobile</span>".form_input('mobile',$vmobile);
        echo "<br><span class='fromText'>Web Address</span>".form_input('web _adress',$vweb_address);
        echo "<br><span class='fromText'>Image</span>".form_input('image',$vimage);
        echo form_submit('submit', 'Edit/Update', "class='submit'");
        echo '</div>';
     echo form_close();
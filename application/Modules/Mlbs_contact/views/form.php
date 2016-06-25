<?php
    echo '<div class="container">';
        echo '<div class="content-section">';
            echo '<div class="container">';
                echo '<div class="row">';
                    echo validation_errors("<p style='color:red;'>",'</p>');
                    echo form_open("/Mlbs_contact/process");
                    echo '<div class="col-lg-5 col-sm-6">';
                    echo "<span class='formText'>Title:</span>";
                    echo form_input('title', $title);
                    echo "</div>";
                    echo '<div class="col-lg-5  col-lg-offset-2 col-sm-6">';
                    echo "<span class='formText'>Body Text:</span>";
                    echo form_textarea('description', $description);

                    if(isset($update_id)){
                            echo form_hidden('id',$id);
                    }else{
                            echo form_hidden('id',$this->uri->segment(3));
                    }
                    echo "</div>";
                    echo '<div class="col-lg-5 col-sm-6">';
                        echo "<span class='formText'>Address Line 1:</span>";
                        echo form_input('address_1',$address_1);
                        echo "<br><span class='formText'>Address Line 2:</span> ";
                        echo form_input('address_2',$address_2);
                        echo "<br><span class='formText'>Address Line 3:</span> ";
                        echo form_input('address_3',$address_3);
                    echo '</div>';
                    echo '<div class="col-lg-5 col-lg-offset-2 col-sm-6">';
                        echo "<span class='formText'>Post Code:</span>";
                        echo form_input('post_code',$post_code);
                        echo "<br><span class='formText'>Email:</span>";
                        echo form_input('email',$email);
                        echo "<br><span class='formText'>Phone:</span>";
                        echo form_input('phone',$phone);
                        echo "<br><span class='formText'>Mobile:</span>";
                        echo form_input('mobile',$mobile);
                    echo '</div>';
                    echo '<div class="col-lg-12 col-sm-6">';
                        echo "<span class='formText'>Web address:</span>";
                        echo form_input('web_address',$web_address);
                        echo "<br><span class='formText'>Image:</span>";
                        echo form_input('image',$image);
                        echo "<br>";
                        echo form_submit('addImage','Add Image');
                        echo form_submit('submitForm','Submit');
                        echo form_close();
                    echo '</div>';     
            echo '</div>';       
        echo '</div>';        
    echo '</div>';
echo '</div>';
<?php
    $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
    $data = array('enctype' => 'multipart/form-data');
    $deals = Modules::run("Mlbs_deals/Mlbs_deals/get","id");
?>
<div class="container top">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("Mlbs_services"); ?>">
                    <?php echo ucfirst($this->uri->segment(1));?>
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
              <?php echo ucfirst($this->uri->segment(2));?>
        </li>
    </ul>
    <div class="page-header users-header">
            <h2>
                    <?php echo ucfirst($this->uri->segment(2));?> 
                    <!--<a  href="<?php echo site_url("Mlbs_services").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>-->
                <a  href="/Mlbs_services/add" class="btn btn-success">Add a new!</a>
            </h2>
       
    </div>
    <div class="container" id='edit_container' style="border:1px solid #ccc;">    
        <div class="row edit_container" id='edit_service' >
            
            
                <p>Edit the service</p> 
               
                <?php
                
                $selectId=(isset($query["cat_id"]))?$query["cat_id"]:null; 
                foreach ($categories as $row):
                    if($row['id']==$selectId):
                      $selectVl=$row['title'];  
                    endif;
                    $options_category[$row['id']] = $row['title'];
                endforeach;
                $id = (isset($query["id"]))?$query["id"]:null;
                    $cat_id = (isset($query["id"]))?$query["cat_id"]:null;
                    $title = (isset($query["title"]))?$query["title"]:"";
                    $description =(isset($query["description"]))?$query["description"]:"";
                    $time = (isset($query["time"]))?$query["time"]:0;
                    $price = (isset($query["price"]))?$query["price"]:"";
                    $discount_price = (isset($query["discount_price"]))?$query["discount_price"]:"";
                    $image = (isset($query["image"]))?$query["image"]:"";
                echo form_open('Mlbs_services/process/addImage/', $data);
                echo '<div class="span5 col-lg-5 " style="border:1px solid #ccc;">';
                    echo form_hidden('id', $query['id']);
                    echo '<br>Category<select id="cidss" name="cat_id">';
                        foreach ($categories as $item):
                            if($item["id"]==$selectId){
                                echo "<option value='".$item['id']."'selected='selected'>".$item['title']."</option>"; 
                            }else{
                                echo "<option value='".$item['id']."'>".$item['title']."</option>"; 
                            }
                    endforeach; 
                    echo '</select><br>';
                    echo "<br><span class='fromText'>TITLE</span>".form_input('title', $query['title']);
                    echo "<br><span class='fromText'>Description</span>".form_textarea("description",$description). '<br>';
                        $imgArr = array(
                            'width'=>'70',
                            'src' => "assets/uploaded_images/".$image
                        );
                        echo form_submit('submit', 'Update/Upload/Edit', "class='submit'");
                        echo '</div>';
                        echo '<div class="span5 col-lg-5 " style="border:1px solid #ccc;">';
                        echo img($imgArr); 
                        echo "<p><span class='fromText'>Price:</span>".form_input("price",$price)." ";
                        echo "<span class='fromText'>Discount Price:</span>".form_input("discount_price",$discount_price)."</p>";
                        echo form_hidden("image",$image)." ";
                        echo '<p>Select/Change Image<input type="file" name="userfile" value="'.$image.'" /></p><div id="result_show"></div>';
                        if(isset($file_data)){
                            echo form_input("image",$file_data['file_name']);   
                        }  
                        
                        echo "<div class='offer_list'>";
                           
               
                if(isset($query["id"])&&$query["id"]!=null){
                    echo '<table border="1" style="width:100%">';
                    echo '<legend style="background:#ccc; color: #fff;"> Current Courses</legend>';
                    echo '<tr style="background: #000; color: #fff;">';
                    echo '<th>text</th>';
                    echo '<th>Prce</th>';
                    echo '<th>promotional price</th>';
                    echo '<th>Delete</th>';
                    echo '</tr>';
                    foreach($options->result() as $opitems):
                        if($query["id"]==$opitems->service_id_fk):
                            echo "<tr><td>".$opitems->description.".</td><td>".$opitems->price.".</td><td>".$opitems->promotional_price.".</td><td><a href='/Mlbs_options/delete_deal/".$query["id"]."/".$opitems->id."'>Delete</a>.</td><tr>";
                    
                        endif;
                    endforeach;
                    echo '</table><br>';
                    ?>
                     <table border="1" style="width:100%">
                    <legend style="background:#ccc; color: #fff;">Current Deals</legend>
                    <tr style="background: #000; color: #fff;">
                        <th>Text</th>
                        <th>Time</th>
                        <th>Price</th>
                        <th>Deal</th>
                        <th>Per</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        
                    foreach ($deals as $deal):
                        
                        if($query["id"]==$deal['service_id_fk']){                  
                        
                    
                            echo "<tr><td>".$deal['text'].".</td><td>".$deal['time'].".</td><td>".$deal['price'].".</td><td>".$deal['promotional_price'].".</td><td>".$deal['sessiontype']."</td><td><a href='/Mlbs_services/delete_deal/".$query["id"]."/".$deal['id']."'>Delete</a>.</td><tr>";
                        }
                        
                        endforeach;
                    ?>
                </table>
                <?php
                }
                
            
                        
                            echo '</div>';
                echo form_close(); 
                ?>
                
                
              
                
                
            </div>
            

    </div><hr><br><br><hr>
        <div class="row edit_container" id="add_deal">
            <div class="span5 col-lg-5 " style="border:1px solid #ccc;">
                <p class='boxtitle'>Add Area Deal Options!</p> 
                

                <?=form_open('Mlbs_services/process/add_deal/'.$query["id"], $data)?>                       
                    <?=form_hidden("service_id_fk",$query["id"]);?>
                <p style="border-bottom:1px solid #ccc;">
                    <?php
                        $arrOpts1 = array(
                            'placeholder'=>'1. Example: &quot;Area 1&quot;',
                            'size'=>'50'
                        );
                    ?>
                    <?="<span class='fromText'>Deal Area</span>".form_input("text","",$arrOpts1). "<br>";?></p>
                <p style="border-bottom:1px solid #ccc;">    
                    <?php
                        $arrOpts2 = array(
                            'placeholder'=>'2. Example: 20',
                            'size'=>'50'
                        );
                    ?>
                    <?="<span class='fromText'>Time</span>".form_input('time',"",$arrOpts2);?> </p>
                <p style="border-bottom:1px solid #ccc;">
                    <?php
                        $arrOpts3 = array(
                            'placeholder'=>'3. Example: 20.00',
                            'size'=>'50'
                        );
                    ?>
                    <?="<span class='fromText'>Price</span>".form_input('price',"",$arrOpts3);?> </p>
                <p style="border-bottom:1px solid #ccc;">
                    <?php
                        $arrOpts4 = array(
                            'placeholder'=>' 4. Example: 20.00',
                            'size'=>'50'
                        );
                    ?>
                    <?="<span class='fromText'>Promotional Price</span>".form_input('promotional_price',"",$arrOpts4);?> </p>
                <p style="border-bottom:1px solid #ccc;">
                    <?php
                        $arrOpts6 = array(
                            'placeholder'=>'5. Example: Per Session',
                            'size'=>'50'
                        );
                    ?>
                    <?="<span class='fromText'>Session type</span>".form_input("sessiontype","",$arrOpts6);?></p>     
                  
                    <?=form_submit('submit', 'Add Area Deal', "class='submit'");?>
                <p>For time and currency only add the numbers! </p>
                <?=form_close()?>
                
            </div>
             <div class="span5 col-lg-5 " style="border:1px solid #ccc;">
                    
                <table border="1" style="width:100%">
                    <legend style="background:#ccc; color: #fff;">Current Deal Area-Options</legend>
                    <tr style="background: #000; color: #fff;">
                        <th>Text</th>
                        <th>Time</th>
                        <th>Price</th>
                        <th>Deal</th>
                        <th>Per</th>
                        <th>Delete</th>
                    </tr>
                    <?php

                    foreach ($deals as $deal):
                         if($query["id"]==$deal['service_id_fk']){  
                            echo "<tr><td>".$deal['text'].".</td><td>".$deal['time'].".</td><td>".$deal['price'].".</td><td>".$deal['promotional_price'].".</td><td>".$deal['sessiontype']."</td><td><a href='/Mlbs_services/delete_deal/".$query["id"]."/".$deal['id']."'>Delete</a>.</td><tr>";
                         }
                    endforeach;
                    ?>
                </table>
                        
            </div>
            

        </div>
        
        
        
        
        <div class="row edit_container" id='add_course'>
            <div class="span5 col-lg-5 " style="border:1px solid #ccc;">
               <p>Add Course</p> 
               <div class='offer_list'>
                    <div class='boxtitle'>Add Course</div>  
                    <?=form_open('Mlbs_services/process/add_options/'.$query["id"], $data);?>
                        <?=form_hidden('id', $query['id']);?>
                        <?php
                            $optObj1 = array(
                                'size'        => '50',
                                'placeholder'=>'1. Example: course of 5 best'
                                
                            );
                        ?>
                        <?="<br><span class='fromText'>Description</span>".form_input("description","",$optObj1). '<br>';?> 
                        <?php
                            $optObj2 = array(
                                'size'        => '50',
                                'placeholder'=>'1. Example: 20.00'
                                
                            );
                        ?>
                        <?="<br><span class='fromText'>Price</span>".form_input('price',"",$optObj2);?> 
                        <?php
                            $optObj3 = array(
                                'size'        => '50',
                                'placeholder'=>'1. Example: 20.00'
                                
                            );
                        ?>
                        <?="<br><span class='fromText'>Promotional Price</span>".form_input('promotional_price',"",$optObj3);?> 
                       <?=form_submit('submit', 'Add Offer', "class='submit'");?>
                    <?=form_close()?>
                </div>
               
            </div>
            <div class="span5 col-lg-5 " style="border:1px solid #ccc;">
               <p>List of Courses</p> 
               <?php
                if(isset($query["id"])&&$query["id"]!=null){
                    echo '<table border="1" style="width:100%">';
                    echo '<tr style="background: #000; color: #fff;">';
                    echo '<th>text</th>';
                    echo '<th>Prce</th>';
                    echo '<th>promotional price</th>';
                    echo '<th>Delete</th>';
                    echo '</tr>';
                    foreach($options->result() as $opitems):
                        if($query["id"]==$opitems->service_id_fk):
                            echo "<tr><td>".$opitems->description.".</td><td>".$opitems->price.".</td><td>".$opitems->promotional_price.".</td><td><a href='/Mlbs_options/delete_deal/".$query["id"]."/".$opitems->id."'>Delete</a>.</td><tr>";
                    
                        endif;
                    endforeach;
                    echo '</table>';
                }
                
               ?>
               
            </div>
            
        </div>
        
        
        
        
        
        
        <div class="row edit_container">

        </div>    
    </div> 
    
</div>
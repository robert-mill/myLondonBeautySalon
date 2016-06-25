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
    <div class="row">
        <div class="span12 columns">
            <div class="col-lg-5 offset1">
              <?php
             
                    $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
                    $data = array('enctype' => 'multipart/form-data'); 
                    
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
                    $image = (isset($query["image"]))?$query["title"]:"";
                
                echo form_open('Mlbs_services/process/addImage/', $data); 
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
                    echo "<br>TITLE".form_input('title', $query['title']);
                    echo "<br>Description".form_textarea("description",$description). '<br>';
                    
                        $imgArr = array(
                         'src' => "assets/uploaded_images/".$image
                        ); 
                   echo img($imgArr);
                    echo "<p>Price:".form_input("price",$price)." ";
                   echo " Discount Price:".form_input("discount_price",$discount_price)."</p></div>";
                   echo "<div class='offer_list col-lg-5 offset1'>";
                   echo "<div class='boxtitle'>Change/Add picture</div>";
                   echo '<input type="file" name="userfile" value="'.$image.'" /><div id="result_show"></div>';
                   if(isset($file_data)){
                        echo form_input("image",$file_data['file_name']);   
                    }
                    echo "</div>";
                   echo form_submit('submit', 'Upload', "class='submit'");
                echo form_close();
              ?>
            </div>
            
            
        </div>
   
        
                <div class="span12 columns">
                    <div class='offer_list'>
                        <div class='boxtitle'>Add offer</div>  
                      <?=form_open('Mlbs_services/process/add_options/'.$query["id"], $data);?>
                          <?=form_hidden('id', $query['id']);?> 
                          <?="<br>Description".form_textarea("description",""). '<br>';?> 
                          <?="<br>Price".form_input('price',"");?> 
                          <?="<br>Promotional Price".form_input('promotional_price',"");?> 
                         <?=form_submit('submit', 'Add Offer', "class='submit'");?>
                      <?=form_close()?>
                    </div>
                    
                    
                </div>
     
        
        <div class="row" style="border:1px solid #ccc;">
            <div class="span12 " style="border:1px solid #ccc;">
                        <h4 class='boxtitle'>Add area deal!</h4> 
                        <?php
                            $deals = Modules::run("Mlbs_deals/Mlbs_deals/get","id");
                           
                        ?>
                        
                        <?=form_open('Mlbs_services/process/add_deal/'.$query["id"], $data)?>                       
                            <?=form_hidden("service_id_fk",$query["id"]);?>
                        <p>1. Add text for promotion ie: &quot;Area 1&quot;</p>
                            <?="<br>Deal Area".form_textarea("text",""). '<br>';?>
                        <hr>
                        <p>2. Add time ie: 20 (just number of minutes only 'This is an option - not required')</p>
                            <?="<br>time".form_input('time',"");?> 
                        <hr>
                        <p>3. Add Price ie: 20.00 (just decimal only 'This is an option - not required')</p>
                        
                            <?="<br>Price".form_input('price',"");?> 
                        <hr>
                        <p>4. Add Promotional Price ie: 20.00 (just decimal only 'This is an option - not required')</p>
                            <?="<br>Promotional Price".form_input('promotional_price',"");?> 
                        <hr>   
                        <p>5. Add per session or other (This is an option - not required')</p>
                            <?="<br>Session type".form_input('sessiontype',"");?>     
                        <hr>    
                            <?=form_submit('submit', 'Add Area Deal', "class='submit'");?>
                        <?=form_close()?>
                        
                        <p>For time and currency only add the numbers! </p>
                      
            </div>
             <div class="span12 " style="border:1px solid #ccc;">
                    
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
                                    echo "<tr><td>".$deal['text'].".</td><td>".$deal['time'].".</td><td>".$deal['price'].".</td><td>".$deal['promotional_price'].".</td><td></td><td><a href='/Mlbs_services/delete_deal/".$query["id"]."/".$deal['id']."'>Delete</a>.</td><tr>";
                                endforeach;
                                ?>
                            </table>
                        
            </div>
        </div>
    
        
    </div>
    
    
    
    
    
    
    
        
</div>
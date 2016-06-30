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
                               
                                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }else{
                    $i=0;
                    ?>
                        <div class="content-section-b">
                            <div class="row">
                                 
                            </div>
                            <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                              
                            </div>
                        </div>
                <?php
                }
            }
            
            
            
        }
		
    echo '</div>'; 
    
?>
<div class="row-fluid span12 col-lg-12" >
                       
    
    
    <div class="span6 col-lg-6"  style=" text-decoration:none; overflow:hidden;  max-width:100%;">
                                <div class="col-lg-3">
                                    <? if(isset($val->title)): ?>
                                    <h4><?= $val->title; ?></h4>
                                    <? endif; ?>
                                    <? if(isset($val->address_1)): ?>
                                    <p><?= $val->address_1; ?></p>
                                    <? endif; ?>
                                    <? if(isset($val->address_2)): ?>
                                    <p><?= $val->address_2; ?></p>
                                    <? endif; ?>
                                    <? if(isset($val->post_code)): ?>
                                    <p><?= $val->post_code; ?></p>
                                    <? endif; ?>
                                    
                                </div>
                                <div class="col-lg-3">
                                    <? if(isset($val->email)): ?>
                                    <h4><?= $val->email; ?></h4>
                                    <? endif; ?>
                                    <? if(isset($val->phone)): ?>
                                    <p><?= $val->phone; ?></p>
                                    <? endif; ?>
                                    <? if(isset($val->mobile)): ?>
                                    <p><?= $val->mobile; ?></p>
                                    <? endif; ?>
                                </div>
            <div id="my-map-display" style="height:100%; width:100%;max-width:100%;">
                <iframe class="container well well-small span6"  style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=216a+Brick+Lane,+London,+United+Kingdom&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
            </div>
            
            <style>#my-map-display .map-generator{max-width: 100%; max-height: 100%; background: none;}</style>
    </div>
    <div class="span6 col-lg-6" >
        
        <?php
                        $attributes = array('class' => 'emailer', 'id' => 'emailer');
                        echo form_open('Contact/smail/',$attributes);
                        $nameAttr = array(
                            "name" =>"name",
                            "value" =>"",
                            "placeholder"=>"May I have your name?"
                          );
                        echo "<div >".form_input($nameAttr)."</div>";
                        
                        
                        
                         $fromAttr = array(
                            "name" =>"fromEmail",
                            "value" =>"",
                            "placeholder"=>"Your email so I can reply"
                          );
                        echo "<div >".form_input( $fromAttr)."</div>";
                        
                        
                        $subjectAttr = array(
                            "name" =>"subject",
                            "value" =>"",
                            "placeholder"=>"What is it about"
                          );
                        echo "<div >".form_input($subjectAttr)."</div>";
                      
                        
                        
                        $messageAttr = array(
                            "name" =>"message",
                            "value" =>"",
                            "placeholder"=>"Add a message"
                          );
                        
                        echo "<div >".form_textarea($messageAttr)."</div>";
                        echo form_submit('submit', 'Send', "class='submit'");
                        echo form_close(); 
                ?>
    </div>
</div>


<div>
    
</div>
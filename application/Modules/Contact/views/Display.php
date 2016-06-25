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
                                <div class="col-lg-5 col-sm-6">
                                    <? if(isset($val->title)): ?>
                                    <h2><?= $val->title; ?></h2>
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
                                <div class="col-lg-5 col-sm-6">
                                    <? if(isset($val->email)): ?>
                                    <h2><?= $val->email; ?></h2>
                                    <? endif; ?>
                                    <? if(isset($val->phone)): ?>
                                    <p><?= $val->phone; ?></p>
                                    <? endif; ?>
                                    <? if(isset($val->mobile)): ?>
                                    <p><?= $val->mobile; ?></p>
                                    <? endif; ?>
                                </div>
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
<div style="text-decoration:none; overflow:hidden; height:500px; width:500px; max-width:100%;">
    <div id="my-map-display" style="height:100%; width:100%;max-width:100%;">
        <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=216a+Brick+Lane,+London,+United+Kingdom&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
    </div><a class="embedded-map-code" href="https://www.interserver-coupons.com" id="grab-map-info">more</a><style>#my-map-display .map-generator{max-width: 100%; max-height: 100%; background: none;</style></div>
                                                                                                                                   <script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=10d37b62-dad8-fe94-c293-639390413b35&c=embedded-map-code&u=1466274175" defer="defer" async="async"></script>
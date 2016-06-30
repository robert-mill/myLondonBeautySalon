<div class="container">
<div class="row-fluid">
    <div class="col-lg-2" >.</div>
    <div class="span8">
        <h5>Thank you for your interest</h5>
        <p>We will aim to respond as soon as possible.</p>
        <div id="emailSent">
            <div class="col-lg-4" id="fromBlock">
                From: <div>
                        <?=$query['name'];?><br>
                        <?=$query['fromEmail'];?>
                     </div>
                     
            </div>
            <div class="col-lg-4" id="toBlock">
                To: <div>
                        <?=$query['toName'];?><br>
                        <?=$query['toEmail'];?>
                     </div>
            </div>
            
            <div class="col-lg-8" style="margin: 0 auto!important; border: 1px solid #ccc;">
                <h3><?=$query["subject"]?></h3>
                <p><?=$query["message"]?></p>
                
                <?php
                    if($query["sent"]>0):
                      echo '<i style="color:#00FF33;" class="fa fa-thumbs-up fa-5x"></i>'; 
                    endif;
                ?>
                <p></p>
                
            </div>
            
        </div>
    </div>
    <div class="col-lg-2" >.</div>
</div>
</div>

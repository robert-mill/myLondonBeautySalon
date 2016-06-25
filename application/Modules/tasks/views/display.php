<?php
		
		$i =0;
		foreach($query->result() as $row){
			
					
					if(($i%2)==0){
                                            echo 
						$i++;	
						
				?>
						<div class="content-section-a" >
							<div class="container">
								<div class="row">
									<div class="col-lg-5 col-sm-6">
										<hr class="section-heading-spacer">	
										<div class="clearfix"></div>
											<?php
											echo "<h2>" . $row->title . "</h2>";
											echo "<p>". $row->description."</p>";
											?>
									</div>
									<div class="col-lg-5 col-lg-offset-2 col-sm-6">
										<img class="img-responsive" alt="<?php echo $row->pic;?>" src="<?php echo base_url();?>assets/images/<?php echo $row->pic;?>" alt="" width="10%;">
									</div>
								</div>

							</div><!-- /.container -->
						</div><!-- /.content-section-a -->
							
					
						
				<?php
					}else{
						$i++;
									
				?>						
						  <div class="content-section-b" >
                                                                <div class="container">
                                                                        <div class="row">
                                                                                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                                                                                        <hr class="section-heading-spacer">	
                                                                                        <div class="clearfix"></div>
                                                                                                <?php
                                                                                                echo "<h2>" . $row->title . "</h2>";
                                                                                                echo "<p>". $row->description."</p>";
                                                                                                ?>
                                                                                </div>
                                                                                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                                                                                        <img class="img-responsive" alt="<?php echo $row->pic;?>" src="<?php echo base_url();?>assets/images/<?php echo $row->pic;?>" alt="" width="10%">
                                                                                </div>
                                                                        </div>

                                                                </div><!-- /.container -->
                                                      
                                                      
                                                      
								<!-- /.container -->
							</div><!-- /.content-section-b -->
				<?php						
					}
		}
?>
<?php
		echo anchor('tasks/create', '<p>Create new Tasks</p>');
		$i =0;
		foreach($items as $row){
			
					
                                                $edit_url = base_url()."admin/create/".$row["id"];
						
				?>
						<div class="content-section" >
							<div class="container">
								<div class="row">
									<div class="col-lg-5 col-sm-6">
										<hr class="section-heading-spacer">	
										<div class="clearfix"></div>
											<?php
											echo "<h5>" . $row["title"] . "</h5>";
											echo "<p>". $row["description"] ."</p>";
											?>
									</div>
									<div class="col-lg-5 col-lg-offset-2 col-sm-6">
										<img class="img-responsive" alt="<?php echo $row["pic"];?>" src="<?php echo base_url();?>assets/images/<?php echo $row["pic"];?>" alt="">
									</div>
                                                                        <div class="col-lg-1 col-lg-offset-2 col-sm-1">
                                                                            <h4><a href="<?php echo $edit_url;?>">Edit</a></h4>
                                                                        </div>
                                                                    
                                                                    
								</div>

							</div><!-- /.container -->
						</div><!-- /.content-section-a -->
    <?php
                }
    ?>

    
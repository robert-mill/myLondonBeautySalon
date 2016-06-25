
<?php

$stack = array();
$headArray = array();
$courseArray = array();

foreach($services as $ser){
	$title = $ser->title;
	$description = $ser->description;
	$image = $ser->pic;
	$time = ($ser->time)?$ser->time."mins":"";
	//$courseAndPrice =  "<span class='addSpaceLeft'>".$time."</span><span class='addSpaceLeft'>".$ser->course."</span> &#163;".$ser->price." <b>now &#163;".$ser->dprice."</b>";
	$index=0;
	$image = $ser->pic;
	$courseAndPrice ="";
			foreach($services as $ser3){
				if($ser->id==$ser3->id){
					if(!in_array($ser3->id."_".$ser3->title."_".$ser3->course,$courseArray)){

						array_push($courseArray,$ser3->id."_".$ser3->title."_".$ser3->course);
						$courseAndPrice .=  "<span class='addSpaceLeft'>".$ser3->time."mins</span><span class='addSpaceLeft'>".$ser3->course."</span> &#163;".$ser3->price." <b>now &#163;".$ser3->dprice."</b><br>";

					}
				}
			}
	
	
	echo '<div class="text-center">';
	if(!in_array($ser->head,$headArray)){
	?>
	
		<div class="row">
			<div class="col-xs-12">
				<div class="well"><h2><?php echo $ser->head;?></h2></div>
			</div>
		</div>
	
	<?php
		array_push($headArray,$ser->head);
	}
	?>
	
	
	
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-8">
			
				<div class="well"><h3><?php echo $title;?></h3></div>
				<div class="well"><h3><?php echo $description;?></h3></div>
			</div>
			<div class="col-xs-6 col-sm-3">
				<div class="well"><img src="<?php echo base_url()."uploads/". $image;?>"/></div>
			</div>
			<div class="col-xs-12">
				<div class="well"><h3><?php echo $courseAndPrice;?></h3></div>
			</div>
		</div>
	</div>
	
	
	<?php
	
	
	
	/*if(!in_array($ser->head,$stack)){
		array_push($stack,$ser->head);
			echo '<section id="'.$ser->head.'" class="row-fluid col-md-12 span12  container-fluid content-section text-center">';
				
					
						
						echo '<div class="col-md-12 span12 blah" style="border:1px solid #ccc;">';
							foreach($services as $ser2){
								if($ser2->head===$ser->head){
									array_push($headArray,$ser2->title);
									echo '<div class="subSection col-md-12 span12 " style="border:1px solid #ccc;">';
										
										echo "<div  class='col-md-8 span8 ' style='border:1px solid #ccc;'>";
										echo "<h2 class='col-md-8 span8' style='border:1px solid #ccc;'>";
											echo "<span  style='border:1px solid #ccc;'>".$ser2->title."</span>";
										echo "</h2>";
										echo "<span  class='col-md-8 span8 ' style='border:1px solid #ccc;'>".$ser2->description."</span></div>";										
										if($ser2->pic!==""){
											echo "<span class='col-md-4 span4 ' style='border:1px solid #ccc;'><img src='".base_url()."uploads/".$ser2->pic."'/><span>";
										}else{
											echo "<span class='col-md-4 span4 'style='border:1px solid #ccc;'><span>";
										}
									echo '</div>';	
									echo "<div class='col-md-12 span12 priceBlock'style='border:1px solid #ccc;'>";
											if($ser2->course){
												if(!in_array($ser2->title."_".$ser2->course."_".$ser2->dprice,$courseArray)){
													array_push($courseArray,$ser2->title."_".$ser2->course."_".$ser2->dprice);
													echo "<div class='courseBlock '>";
														echo "<div class='course >".$ser2->course."</div>";
														echo "<div class='catPrice'>";
															echo "&#163;".$ser2->price;
														echo " </div> ";
														echo "<div class='catDiscPrice'> ";
															echo "now &#163;".$ser2->dprice;
														echo "</div>";
													echo "</div>";
												}
											}
									echo '</div>';
					
									
										
									echo "</div>";
								}
							}
						echo '</div>';
					 
					
				
					
				echo '<div class="row">';
					echo '<div class="col-lg-8 col-lg-offset-2">';
							foreach($services as $ser2){
								if($ser2->head===$ser->head){
									if(!in_array($ser2->title, $headArray)){
										
										array_push($headArray,$ser2->title);
										echo '<div class="subSection">';
											echo "<h2>".$ser2->title.$ser2->title."</h2>";
											echo "<p>".$ser2->desc."</p>";	
											echo "<div class='priceBlock'>";
												
												if($ser2->course){
													foreach($services as $ser3){
														if($ser2->title==$ser3->title){
															if(!in_array($ser3->title."_".$ser3->course."_".$ser3->dprice,$courseArray)){

																array_push($courseArray,$ser3->title."_".$ser3->course."_".$ser3->dprice);
																	echo "<div class='courseBlock'>";
																		echo "<div class='course'>".$ser3->course."</div>";
																		echo "<div class='catPrice'>";
																			echo "&#163;".$ser3->price;
																		echo " </div> ";
																		echo "<div class='catDiscPrice'> ";
																			echo "now &#163;".$ser3->dprice;
																		echo "</div>";
																	echo "</div>";
															}
														}
													}
												}else{
														echo "<div class='courseBlock'>";
															echo "<div class='catPrice'>";
																echo "&#163;".$ser2->price;
															echo " </div> ";
															echo "<div class='catDiscPrice'> ";
																echo "now &#163;".$ser2->dprice;
															echo "</div>";
														echo "</div>";
												}
												
											echo "</div>";
										echo '</div>';
									
									}
									
								}
								$index++;
							}
					echo '</div>';
				echo '</div>';
				
				
			echo '</section>';
	}*/
	
}
?>
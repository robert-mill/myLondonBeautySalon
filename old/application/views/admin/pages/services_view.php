
<?php

$stack = array();
$headArray = array();
$courseArray = array();
foreach($services as $ser){
	
	$index=0;
	if(!in_array($ser->head,$stack)){
		array_push($stack,$ser->head);
			echo '<section id="'.$ser->head.'" class="container content-section text-center">';
					echo '<aside class="aside" id="asid_'.$ser->head.'">';
					echo '</aside>';
					
				echo '<div class="row">';
					echo '<div class="col-lg-8 col-lg-offset-2">';
							foreach($services as $ser2){
								if($ser2->head===$ser->head){
									if(!in_array($ser2->title, $headArray)){
										
										array_push($headArray,$ser2->title);
										echo '<div class="subSection">';
											echo "<h2>".$ser2->title."</h2>";
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
	}
	
}
?>
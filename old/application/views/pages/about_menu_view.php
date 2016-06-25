
<div class='image_menu'>

<?php
	echo '<section id="about" class="container content-section text-center">';
		echo '<div class="row">';
			echo '<div class="col-lg-8 col-lg-offset-2">';
				echo "<h2>".$title."</h2>";
				foreach($pageText as $pgTex){
					echo "<p>".str_replace("&nbsp;" , "<br>"  ,$pgTex->text)."</p>";
					
				}
			echo '</div>';
		echo '</div>';
	echo "</section>";
						
?>
</div>


<div class='image_menu'>

<?php
				
						foreach($menuList as $mlist){
							echo "<div class='menu_img'>";
							echo "<a class='page-scroll' href='#".$mlist->title."'><div class='menu_img_block'><img src='".base_url("images/".preg_replace( '/\s+/', '', strtolower($mlist->title))).".jpg'/></div>";
							echo "<span class='menu_btn'>".$mlist->title."</span>";
							echo '</a>';
							echo "</div>";


							
							 
						}
?>
</div>
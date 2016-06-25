<?php
	echo '';
		//echo anchor('tasks/create', '<p>Create new Tasks</p>');
		foreach($query->result() as $row){
			
			echo "<h2>" . $row->title . "</h2>";
			echo "<p>".$row->description."</p>";
	
			
		}
		echo "<hr>";
		
?>
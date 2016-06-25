<?php
		foreach($query->result() as $row){
			echo "<h2>" . $row->title . "</h2>";
			echo "<p>".$row->description."</p>";
		}
		echo "<hr>";
		
?>
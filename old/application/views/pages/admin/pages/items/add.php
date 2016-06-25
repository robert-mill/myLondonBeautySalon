<div class="container top">
	<ul class="breadcrumb">
        <li>
			<a href="<?php echo site_url("admin"); ?>">
				<?php echo ucfirst($this->uri->segment(1));?>
			</a> 
			<span class="divider">/</span>
        </li>
        <li>
			<a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
				<?php echo ucfirst($this->uri->segment(2));?>
			</a> 
			<span class="divider">/</span>
        </li>
        <li class="active">
			<a href="#">New</a>
        </li>
    </ul>
	<div class="page-header">
        <h2>
			Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
    </div>
	<?php
		if(isset($flash_message)){
			if($flash_message == TRUE){
				echo '<div class="alert alert-success">';
					echo '<a class="close" data-dismiss="alert">×</a>';
					echo '<strong>Well done!</strong> new item created with success.';
				echo '</div>';       
			}else{
				echo '<div class="alert alert-error">';
					echo '<a class="close" data-dismiss="alert">×</a>';
					echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
				echo '</div>';          
			}
		}
		
		$options_category = array('' => "Select");
		$options_courses = array();
		foreach ($categories as $row){
			$options_category[$row['id']] = $row['id'];
			$options_category[$row['id']] = $row['title'];
			//$options_category[$row['id']] = $row['desc'];
			
		}
	/*	foreach ($courses as $row){
			$options_courses[$row['id']] = $row['id'];
			$options_courses[$row['id']] = $row['title'];
			$options_courses[$row['id']] = $row['title'];
			
			//$options_category[$row['id']] = $row['desc'];
			
		}
	*/	
		
		
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		
		echo validation_errors();
		
		
		
		echo form_open('admin/items/add', $attributes);
    ?>	
	<fieldset>
	
		<div class="control-group">
			<label for="inputError" class="control-label">Title</label>
			<div class="controls">
				<input type="text" id="" name="title" value="<?php echo set_value('title'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Description</label>
			<div class="controls">
				<input type="text" id="" name="desc" value="<?php echo set_value('desc'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Time</label>
			<div class="controls">
				<input type="text" id="" name="time" value="<?php echo set_value('time'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Price</label>
			<div class="controls">
				<input type="text" id="" name="price" value="<?php echo set_value('price'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Discount Price</label>
			<div class="controls">
				<input type="text" id="" name="dprice" value="<?php echo set_value('dprice'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<?php
          echo '<div class="control-group">';
            echo '<label for="category_id" class="control-label">Category</label>';
            echo '<div class="controls">';
              //echo form_dropdown('category_id', $options_category, '', 'class="span2"');
              
              echo form_dropdown('category_id', $options_category, $categories[0]['id'], 'class="span2"');

            echo '</div>';
          echo '</div">';
        ?>
		
		
		
		
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Save changes</button>
			<button class="btn" type="reset">Cancel</button>
		</div>	
	</fieldset>
	<?php echo form_close(); ?>
	
	
	
</div>
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
			Adding <?php echo ucfirst($this->uri->segment(3));?>
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
		
		echo validation_errors();
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo form_open('admin/items/new_course', $attributes);
	?>
		<div class="control-group">
			<label for="inputError" class="control-label">Course</label>
			<div class="controls">
				<input type='hidden' name="item_id" value="<?php echo $this->uri->segment(4); ?>" >
				<input type="text" id="" name="title" value="<?php echo set_value('title'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
			<div class="control-group">
			<label for="inputError" class="control-label">Price</label>
			<div class="controls">
				<input type="text" id="" name="cprice" value="<?php echo set_value('cprice'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Discount Price</label>
			<div class="controls">
				<input type="text" id="" name="cdprice" value="<?php echo set_value('cdprice'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Save changes</button>
			<button class="btn" type="reset">Cancel</button>
		</div>
	<?php echo form_close(); ?>
</div><!--END class="container top"--> 
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
			<a href="#">Update</a>
		</li>
	</ul>
	<div class="page-header">
        <h2>
			Updating <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
    </div>
	<?php
		if($this->session->flashdata('flash_message')){
			if($this->session->flashdata('flash_message') == 'updated'){
				echo '<div class="alert alert-success">';
					echo '<a class="close" data-dismiss="alert">×</a>';
					echo '<strong>Well done!</strong> category updated with success.';
				echo '</div>';       
			}else{
				echo '<div class="alert alert-error">';
					echo '<a class="close" data-dismiss="alert">×</a>';
					echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
				echo '</div>';          
			}
		}
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo validation_errors();
		echo form_open('admin/categories/update/'.$this->uri->segment(4).'', $attributes);
    ?>
		<fieldset>
			<div class="control-group">
				
				
				<div class="controls">
				<label for="inputError" class="control-label">Title
					<input type="text" id="" name="title" value="<?php echo $categories[0]['title']; ?>" >
					<!--<span class="help-inline">Woohoo!</span>--></label>
				<label for="inputError" class="control-label">Description
					<input type="text" id="" name="desc" value="<?php echo $categories[0]['desc']; ?>" >
					<!--<span class="help-inline">Woohoo!</span>--></label>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-primary" type="submit">Save changes</button>
				<button class="btn" type="reset">Cancel</button>
          </div>
		</fieldset> 
	<?php echo form_close(); ?>
	
</div>
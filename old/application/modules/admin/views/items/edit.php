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
				echo '<strong>Well done!</strong> item updated with success.';
				echo '</div>';       
			}else{
				echo '<div class="alert alert-error">';
					echo '<a class="close" data-dismiss="alert">×</a>';
					echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
				echo '</div>';          
			}
		}
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		$options_category = array('' => "Select");
		
		foreach ($categories as $row){
			$options_category[$row['id']] = $row['id'];
			$options_category[$row['id']] = $row['title'];
			//$options_category[$row['id']] = $row['desc'];
			
		}
		echo validation_errors();
		echo form_open('admin/items/update/'.$this->uri->segment(4).'', $attributes);
    ?>
	<fieldset>
		 <div class="control-group">
            <label for="inputError" class="control-label">Title</label>
            <div class="controls">
              <input type="text" id="" name="title" value="<?php echo $items[0]->title; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Description</label>
            <div class="controls">
             <!-- <input type="text" id="" name="desc" value="<?php echo $items[0]->description; ?>">-->
              <textarea class='textArea' id="" name="desc" rows='10' >
			  <?php echo $items[0]->description; ?>
			  </textarea>
			  
			  
			  <!--<span class="help-inline">Desc</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">Time</label>
            <div class="controls">
              <input type="text" id="" name="time" value="<?php echo $items[0]->time;?>">
              <!--<span class="help-inline">time</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Price</label>
            <div class="controls">
              <input type="text" name="price" value="<?php echo $items[0]->price; ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
		   <div class="control-group">
            <label for="inputError" class="control-label">Discount Price</label>
            <div class="controls">
              <input type="text" name="mdprice" value="<?php echo $items[0]->mdprice; ?>">
              <!--<span class="help-inline">OOps</span>-->
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
	
	
	
</div>
	
<div class="main">
<div class="data">
<div class="page">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
        <legend>My London Beauty Image uploader</legend>
        <?php 
			echo form_open_multipart('admin/manipulation/upload');
			if(isset($imgId)){
				$id = ($this->uri->segment(4))?$this->uri->segment(4):$imgId;
			}else{
				$id = $this->uri->segment(4);
			}
			
		?>
		
        <fieldset>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label for="userfile" class="control-label">Select File to Upload</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" name="userfile" size="20" />
                        <span class="text-danger">
						<?php if (isset($error)) { 
								foreach($error as $err){
									if(strpos(strtolower($err),"exceeds")>0){
										echo "<div class='col-md-3 errBox'>Image too big</div>";
										
									}else{
										echo $err."<br>";	
									}
								
								}; 
							  }	
						?></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
						<input type='hidden' name='itemId' value='<?php echo $id;?>'/>
                        <input type="submit" value="Upload File" class="btn btn-primary"/>
                    </div>
                </div>
            </div>
        </fieldset>
        
        <?php echo form_close(); 
		if(isset($uploadedpath)){
			echo form_open_multipart('admin/manipulation/addImage');
			 echo "<div class='col-md-3'>";
				echo '<img src="'.$uploadedpath.'" width="200px"/>';
				echo '<input type="hiddden" name="uploadedImg" value="'.$uploadedimg.'" />';
				echo '<input type="hiddden" name="uploadedID" value="'.$imgId.'" />';
				echo '<input type="submit" value="Save" class="btn btn-success"/>';
			 echo "</div>";
			echo form_close(); 
			echo form_open_multipart('admin/manipulation/deleteImage');
			 echo "<div class='col-md-3'>";
				
				echo '<input type="hiddden" name="uploadedImg" value="'.$uploadedimg.'" />';
				echo '<input type="hiddden" name="uploadedID" value="'.$imgId.'" />';
				echo '<input type="submit" value="Delete" class="btn btn-danger"/>';
			 echo "</div>";
			echo form_close(); 
			
		}
		
		?>
		

        <?php if(isset($delerror)){
			    echo $delerror;
			 }else{
				 echo '..';
			 }
				if (isset($success_msg)) { echo $success_msg; }else{echo 'The maximum size of image file is 500 X 500 and less than 1200k' ;} ?>
        </div>
    </div>
</div>
</div></div>
</div>

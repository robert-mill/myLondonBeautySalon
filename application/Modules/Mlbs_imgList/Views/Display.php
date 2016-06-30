<div class="container top">
	<ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url("Mlbs_imgList"); ?>">
			<?php echo ucfirst($this->uri->segment(1));?>
		</a>
                <span class="divider">/</span>
            </li>
            <li class="active">
		  <?php echo ucfirst($this->uri->segment(2));?>
	    </li>
        </ul>
    	<div class="page-header users-header">
		<h2>
			<?php echo ucfirst($this->uri->segment(2));?> 
		</h2>
	</div>
    <div class="row">
        <div class="span12 columns">
            <div class="well">
                <?php
              //  $files1 = glob("assets/toDownload/*.{jpg,JPEG,jpg,png,gif}", GLOB_BRACE);
                
            /*    foreach ($files1 AS $file) {
                    
                    
                    $config['source_image'] = $file;
                    $config['image_library'] = 'gd2';
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 500;
                    $config['height'] = 500;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                }
             */   
                
                $files2 = glob("assets/toDownload/*.{jpg,JPEG,jpg,png,gif}", GLOB_BRACE);
                $arrPic = [];
                    foreach($files2 as $file) :
                      if(!in_array($file, $arrPic)):
                      echo img($file);
                      array_push($arrPic, $file);
                      endif;
                    endforeach;
                ?>
            </div>
            
        </div>
    </div>
</div>
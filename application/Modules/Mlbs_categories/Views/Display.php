<div class="container top">
	<ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url("Mlbs_categories"); ?>">
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
			<!--<a  href="<?php echo site_url("Mlbs_services").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>-->
                    <a  href="/Mlbs_categories/add" class="btn btn-success">Add a new!</a>
                </h2>
	</div>
    <div class="row">
        <div class="span12 columns">
            <div class="well">
                <table>
                    <tr><th>Title</th><th>Description</th><th>Edit</th><th>Delete</th></tr>
                    <?php
                          $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
                          $data = array('enctype' => 'multipart/form-data');  
                            
                      foreach ($categories as $row):
                      ?>
                    
                    <tr><td><?=$row['title']?></td><td><?=$row['description']?></td><td><a href="/Mlbs_categories/process/edit/<?=$row["id"]?>"  class="btn btn-success">Edit</a></td><td><a href="/Mlbs_categories/process/delete/<?=$row["id"]?>"  class="btn btn-warning">Delete</a></td></tr>
                         
                         
                        
                      <?php
                      endforeach;



                    ?>
               </table>
            </div>
            
            
        </div>
    </div>
    
</div>
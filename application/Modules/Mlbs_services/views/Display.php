<div class="container top">
	<ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url("Mlbs_services"); ?>">
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
			<a  href="/<?php echo $this->uri->segment(1); ?>/add" class="btn btn-success">Add a new.</a>
		</h2>
	</div>
    <div class="row">
        <div class="span12 columns">
            <div class="well">
                <?php
                $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
                $options_category = array(0 => "all");
                foreach ($categories as $row):
                    $options_category[$row['id']] = $row['title'];
                endforeach;
                $options_items= array();
                foreach ($query as $array):
                        foreach ($array as $key => $value) :
                                $options_items[$key] = $key;
                            endforeach;
                        break;
                endforeach;
                echo form_open('admin/items', $attributes);
                   
                    
                   
                echo form_close();
                ?>
            </div>
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                        <tr>
                                <th class="header">ID</th>
                                <th class="yellow header headerSortDown">Title</th>
                                <th class="yellow header headerSortDown">Description</th>
                                <th class="yellow header headerSortDown">Image</th>
                                <th class="yellow header headerSortDown">Time</th>
                                <th class="yellow header headerSortDown">Price</th>
                                <th class="yellow header headerSortDown">Discounted Price</th>
                                				
                        </tr>
                </thead>
                <tbody>
                    <?php
			$ckArr = array();
                        foreach($query as $row){
                              $image_properties = array(
                                        'src' => base_url()."assets/uploaded_images/".$row['image'],
                                        'class' => 'post_images',
                                        'width' => '50',
                                        'height' => '50',
                                        'title' => $row['title'],
                                        'rel' => 'lightbox',
                              );
                            
                            echo '<tr>';
                                if(in_array($row['id']."_".$row['title'] ,$ckArr)){
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                }else{
                                    echo '<td>'.$row['id'].'</td>';
                                   // echo '<td>'.$row['head'].'</td>';
                                    echo '<td>'.$row['title'].'</td>';
                                    echo '<td>'.$row['description'].'</td>';
                                    echo '<td>'.img($image_properties, TRUE).'</td>';
                                    echo '<td>'.$row['time'].'</td>';
                                    echo '<td>'.$row['price'].'</td>';
                                    echo '<td>'.$row['discount_price'].'</td>';
                                    echo '<td class="crud-actions">';
                                    echo '<a href="'.site_url("Mlbs_services").'/edit/'.$row['id'].'" class="btn btn-info">View & edit</a><a href="'.site_url("Mlbs_services").'/delete/'.$row['id'].'" class="btn btn-danger">Delete</a>';
                                       //echo form_open("Mlbs_about/process/addImage");
                                        


                                   // echo '    <a href="'.site_url("admin").'/items/new_course/'.$row['id'].'" class="btn btn-success"">Add course</a>
				//	    <a href="'.site_url("admin").'/manipulation/manipulation/'.$row['id'].'" class="btn btn-info">image</a>
				//	    <a href="'.site_url("admin").'/items/update/'.$row['id'].'" class="btn btn-info">View & edit</a>  
				//	    <a href="'.site_url("admin").'/items/delete/'.$row['id'].'" class="btn btn-danger">Delete</a>
                                    echo '</td>';
                                    
                                }
                            echo '</td>';
                            array_push($ckArr,$row['id']."_".$row['title']);
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container top">
	<ul class="breadcrumb">
		<li>
          <a href="<?php echo site_url("admin"); ?>">
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
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
    </div>
	<div class="row">
        <div class="span12 columns">
			<div class="well">
				<?php			   
					$attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
					$options_categories = array();
					foreach ($categories as $array) {
					  foreach ($array as $key => $value) {
						
						$options_categories[$key] = $key;
					  }
					  break;
					}
					echo form_open('admin/categories', $attributes);
						echo form_label('Search:', 'search_string');
						echo form_input('search_string', $search_string_selected);
						echo form_label('Order by:', 'order');
						echo form_dropdown('order', $options_categories, $order, 'class="span2"');
						$data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');
						$options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
						echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');
						echo form_submit($data_submit);
					echo form_close();
				?>
			</div>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th class="header">ID</th>
						<th class="yellow header headerSortDown">Title</th>
						<th class="yellow header headerSortDown">Description</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($categories as $row){			
						
							echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row['title'].'</td>';
								echo '<td>'.$row['desc'].'</td>';
								echo '<td class="crud-actions">';
									echo'<a href="'.site_url("admin").'/categories/update/'.$row['id'].'" class="btn btn-info">view & edit</a>';  
									echo'<a href="'.site_url("admin").'/categories/delete/'.$row['id'].'" class="btn btn-danger">delete</a>';
								echo '</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
			<?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
			
		</div>
	</div>
	
</div>
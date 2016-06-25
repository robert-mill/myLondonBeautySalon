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
				$options_category = array(0 => "all");
				foreach ($categories as $row){
					$options_category[$row['id']] = $row['title'];
				}
				$options_items= array();
				foreach ($items as $array) {
					foreach ($array as $key => $value) {
						$options_items[$key] = $key;
					}
					break;
				}
				echo form_open('admin/items', $attributes);
					echo form_label('Search:', 'search_string');
					echo form_input('search_string', $search_string_selected, 'style="width: 170px;
	height: 26px;"');
					echo form_label('Filter by category:', 'category_id');
					echo form_dropdown('category_id', $options_category, $category_selected, 'class="span2"');
					echo form_label('Order by:', 'order');
					echo form_dropdown('order', $options_items, $order, 'class="span2"');
					$data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');
					$options_order_type  = array('Asc' => 'Asc', 'Desc' => 'Desc');
					echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');
					echo form_submit($data_submit);
				echo form_close();
			?>
			</div>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th class="header">ID</th>
						<th class="header">Category</th>
						<th class="yellow header headerSortDown">Title</th>
						<th class="yellow header headerSortDown">Description</th>
						<th class="yellow header headerSortDown">Image</th>
						<th class="yellow header headerSortDown">Price</th>
						<th class="yellow header headerSortDown">Course Price</th>
						<th class="yellow header headerSortDown">Course Discounted Price</th>
						<th class="yellow header headerSortDown">Time</th>	
						<th class="yellow header headerSortDown">Course Deal</th>					
					</tr>
				</thead>
				<tbody>
					<?php
					$ckArr = array();
						foreach($items as $row){
							echo '<tr>';
								if(in_array($row->id."_".$row->title ,$ckArr)){
									echo '<td></td>';
									echo '<td></td>';
									echo '<td></td>';
									echo '<td></td>';
									echo '<td></td>';
									echo '<td></td>';
									echo '<td></td>';
									echo '<td></td>';
									echo '<td></td>';
								}else{
									echo '<td>'.$row->id.'</td>';
									echo '<td>'.$row->head.'</td>';
									echo '<td>'.$row->title.'</td>';
									echo '<td>'.$row->description.'</td>';
									if($row->pic){
										echo '<td><img class="resImg" src="'.base_url().'/uploads/'.$row->pic.'"/><br>';
										echo '<a href="'.site_url("admin").'/items/delImg/'.$row->id.'/'.$row->pic.'" class="btn btn-danger">delete</a>';
										echo '</td>';
									}else{
										echo '<td></td>';
									}
									echo '<td>'.$row->price.'</td>';
									echo '<td>'.$row->cprice.'</td>';
									echo '<td>'.$row->dprice.'</td>';
									
									if($row->time){
										echo '<td>'.$row->time.'mins</td>';
									}else{
										echo '<td></td>';
									}
								}
									if($row->course!=""){
										echo '<td>'.$row->course.'<a href="'.site_url("admin").'/items/delCourse/'.$row->cid.'" class="btn btn-danger">delete course</a></td>';
									}else{
										echo '<td></td>';	
									
									}
								if(!in_array($row->id."_".$row->title ,$ckArr)){
								
									echo '<td class="crud-actions">
									<h2>
				
										<a href="'.site_url("admin").'/items/new_course/'.$row->id.'" class="btn btn-success"">Add course</a>
										<a href="'.site_url("admin").'/manipulation/manipulation/'.$row->id.'" class="btn btn-info">image</a>
										<a href="'.site_url("admin").'/items/update/'.$row->id.'" class="btn btn-info">View & edit</a>  
										<a href="'.site_url("admin").'/items/delete/'.$row->id.'" class="btn btn-danger">Delete</a>
									</td>';
								}
								echo '</tr>';
							array_push($ckArr,$row->id."_".$row->title);
							
							
						}
					?>
				</tbody>
			</table>
		</div>
	<div>
	  
</div>
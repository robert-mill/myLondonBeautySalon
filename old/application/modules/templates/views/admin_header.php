<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>My London Beauty Salon Admin</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/admin/manipulation.css" rel="stylesheet" type="text/css">  
  <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css"> 
  <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
  
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">My London Beauty</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'products'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/items">Items</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'manufacturers'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/categories">Categories</a>
	        </li>
	       <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
			<li <?php if($this->uri->segment(2) == 'login'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/login">Login</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
    <div class="box" style="width: 100%; height: 50px; display: block;">&nbsp;&nbsp;</div>

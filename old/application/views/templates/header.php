<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>/grayscale.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/grayscale_custom.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom_style.css">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!--Additional CSS -->

	
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >
<?php
if($title=="home"){
	


?>
 <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading"><img src="<?php echo base_url();?>'images/MyLondonBeautySalon_logo.png'"/></h1>
                        <p class="intro-text">http://www.mylondonbeautysalon.co.uk/<br><a class="page-scroll" href="#download"><?php echo $title;?><i class="fa fa-angle-double-down fa-lg"></i></a></p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php
}else{
?>
	 <header class="intro">
	 <div class="intro-body">
		  <div class="container">
			<div class="row">ghgh
				<?php
					$this->view("pages/".$title."_menu_view");
				?>
			</div>
		 </div>
	 </div>
	 </header>
<?php
}
?>
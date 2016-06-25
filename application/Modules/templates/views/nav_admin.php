
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="/">My London Beauty Salon</a>
				
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/mlbs_home">Home</a>
                    </li>
                    <li>
                        <a href="/mlbs_about">About</a>
                    </li>
                   <li>
                        <a href="/Mlbs_categories">Categories</a>
                    </li>
                    <li class="dropdown">
                        
	          <?php
                    if($this->uri->segment(2)=='edit' && $this->uri->segment(1)=='Mlbs_services'):
                  ?>
                        <a href="http://www.mylondonbeautysalon.co.uk/mlbs_services" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class='dmListLinks_0' id="X-edit_service"><a href="http://www.mylondonbeautysalon.co.uk/mlbs_services/edit/<?=$this->uri->segment(3)?>">Edit service</a></li>
                            <li class='dmListLinks_540' id="X-add_deal"><a href="/mlbs_services/edit/<?=$this->uri->segment(3)?>">Add Deal</a></li>
                            <li class='dmListLinks_1100' id="X-add_course"><a href="/mlbs_services/edit/<?=$this->uri->segment(3)?>">Add Course</a></li> 
                        </ul>
	            </li>
                   <?php
                   else:
                       echo '<li><a href="/mlbs_services">Services</a></li>';
                   endif;
                   ?>
                    
                    
                    <li>
                        <a href="/mlbs_contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



 
<!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">Start</span> London Beauty Salon
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->    


				   <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/contact">Contact</a>
                    </li>
					
                </ul>
            </div>
			<?php
				if($title=='services'){
			?>
			<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
				<ul class="nav navbar-nav">
					<?php
					
						foreach($menuList as $mlist){
							
							// echo '<li><a class="page-scroll" href="#'.$mlist->title.'">'.$mlist->title.'</a></li>';
							 
						}
					?>
				</ul>
			</div>
			<?php
				}
			?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
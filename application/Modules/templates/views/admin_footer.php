	<div id="footer">
		<hr>
		<div class="inner">
			<div class="container">
				<p class="right"><a href="javascript:window.history.go(-1);">Back</a></p>
				<p>
				</p>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/admin.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jfunctions.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.canvasResize.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/canvasResize.js"></script>
	<script>
            $(function(){
                var edit_containerPos = $("#edit_container").offset().top;
                $(".dropdown-menu li").on("click", function(e){
                    e.preventDefault();
                    var thisId = $(this).attr("id");
                    var tclass = $(this).attr("class").split("_");
                    var thisIds = thisId.split("-");
                    var id = thisIds[1];
                    goToByScroll(id,tclass[1]);
                     
                    
                });
            });
              function goToByScroll(id,tclass){
                  id = id.replace("link", "");
                  
                  
                  var numLinks = $(".dmListLinks").length;
                  var thisClass = parseInt(tclass);
                  
                  $("#edit_container").animate({
                      scrollTop: thisClass
                  },'slow');
              }
            
            
            $('input[name=userfile]').change(function(e) {
                var file = e.target.files[0];
                canvasResize(file, {
                      width: 300,
                      height: 0,
                      crop: false,
                      quality: 80,
                      //rotate: 90,
                      callback: function(data, width, height) {
                      $(img).attr('src', data);
                      }
                });
            });
	$("#resize_button").on("click",function() {

		$('div#img_resize').hide();
		$('div#crop').hide();
		$('div#water_mark').hide();
		$('div#rotate').hide();
		$('div#resize').show();
	});
	$("#watermark_button").click(function() {
		$('div#img_resize').hide();
		$('div#resize').hide();
		$('div#crop').hide();
		$('div#rotate').hide();
		$('div#water_mark').show();
	});
	$("#crop_button").click(function() {
		$('div#img_resize').hide();
		$('div#resize').hide();
		$('div#water_mark').hide();
		$('div#rotate').hide();
		$('div#crop').show();
	});
	$("#rotate_button").click(function() {
		
		$('div#img_resize').hide();
		$('div#resize').hide();
		$('div#water_mark').hide();
		$('div#crop').hide();
		$('div#rotate').show();
	});

</script>
</body>
</html>
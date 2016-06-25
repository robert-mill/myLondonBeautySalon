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

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>ci-my-admin/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/admin.min.js"></script>
	
	<script>
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
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<html>
<head>
<title>.:: Admin Framework Langit Inspirasi ::.</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Framework Langit Inspirasi Responsive Web, Bootstrap Web Langit Inspirasi Framework, Flat Web Langit Inspirasi Framework, 
Smartphone Framework Langit Inspirasi, Yosef Murya, YM Kusuma Ardhana, Yosef Murya Kusuma Ardhana" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="assets/admin/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="assets/admin/js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="assets/admin/css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>
<body>	
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>LOGIN</h1>
			</div>
			<?php
				if(count($message)) {
			?>
				<div class="alert <?php if($message["success"] == false) echo "alert-danger"; else echo "alert-success"; ?>"><?php echo $message["message"]; ?></div>
			<?php
				}
			?>
			<div class="login-block">
				<form method="POST">
					<input type="text" name="username" placeholder="ex : yosefmurya" required autofocus>
					<input type="password" name="password" class="lock" placeholder="Password" required>
					<div class="forgot-top-grids">						
						<div class="clearfix"> </div>
					</div>
					<button class="btn btn-primary btn-block" type="submit">Sign in</button>					
				</form>				
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>
		© 2017 Framework by  <a href="http://langitinspirasi.co.id/" target="_blank">Langit Inspirasi</a> 
	 </p>
</div>	
<!--COPY rights end here-->

<!--scrolling js-->
		<script src="assets/admin/js/jquery.nicescroll.js"></script>
		<script src="assets/admin/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="assets/admin/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>
<? ob_start(); ?>
<?php 	include("includes/connection.php");
		include("language/language.php");

	if(isset($_SESSION['admin_name']))
	{
		header("Location:home.php");
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Wallpaper Admin</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>

<script src="js/login.js" type="text/javascript"></script>

</head>
<body id="login-bg"> 

<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="index.php"><img src="images/logo.png" width="246" height="70" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	<div style="color:#990000;"> <?php if(isset($_REQUEST['msg'])){ echo $client_lang[$_REQUEST['msg']]; }?></div><br />
	<!--  start login-inner -->
	<div id="login-inner">
	<form action="login_db.php" method="post" enctype="multipart/form-data" onsubmit="return checkValidation(this);">
		
			<label>Username</label>
			<input type="text"  class="login-inp" name="username" id="username" value=""/>
			<br/>
      <label>Password</label>
			<input type="password" value="" name="password" id="password"  onfocus="this.value=''" class="login-inp" />
      <div class="clear"></div>
        
      <div class="clear"></div>
      <input type="submit" class="submit-login" /></td>
		</form>
		<div class="clear"></div>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	 <a href="" class="forgot-pwd">Forgot Password?</a>
	<img class="adm-pic" src="images/login/admin-pic.png" alt="" />
 </div>
 <!--  end loginbox -->
  <!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		  <div id="forgotbox-text">Please send us your email and we'll send your password.</div>
  		<form action="forgot.php" method="post" enctype="multipart/form-data">
    		<label>Email address:</label>
    		<input type="text" name="email" value=""   class="login-inp" required="required" />
    		<input type="submit" class="submit-login"  />
  		</form>
  		<div class="clear"></div>
  		
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
		<img class="forgot-pwd1" src="images/login/forgot-pwd.png" alt="" />
	</div>
	<!--  end forgotbox -->
</div>
<!-- End: login-holder -->
</body>
</html>
<? ob_flush();?>
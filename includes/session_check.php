<?php
	
	if(!isset($_SESSION['admin_name']))
	{
		session_destroy();
		
	
		echo "<script language=javascript type=text/javascript>document.location='index.php';</script>";
	}
	 
	
?>
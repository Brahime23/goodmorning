<?php include("includes/connection.php");
 
if($_POST["email"]=='') { 
     
     echo "<script>document.location='index.php?msg=9';</script>";
}
else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { 
     
     echo "<script>document.location='index.php?msg=10';</script>";
}
else
{
	$qry="select * from tbl_admin where email='".$_POST["email"]."'";
		 
		$result=mysqli_query($cn,$qry);
		$row=mysqli_fetch_assoc($result);
	
	if($row > 0)
		{
	
				$to = $row['email'];
			
				// subject
				$subject = 'HD-Wallpaper admin password';	
				
				
				$message = '
							<div>
							   <strong>Username</strong>:'.$row['username'].'<br>				    
							   <strong>Password</strong> :'.$row['password'].'<br>				    
							 </div>
							';
				
				 
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
				// Mail it
			   if(@mail($to, $subject, $message, $headers)){
				
					echo "<script>document.location='index.php?msg=11';</script>"; 
			   }
			
			   else
			   {
					echo "<script>document.location='index.php?msg=12';</script>"; 
			   }
		}
		else
		{
			echo "<script>document.location='index.php?msg=8';</script>"; 
		}
}	
?>
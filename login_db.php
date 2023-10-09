<?php include("includes/connection.php");


	/*if(isset($_POST['remember']))
	{
		  setcookie("user_id", $_SESSION['user_id'], time()+60*60*24*COOKIE_TIME_OUT, "/");
		  setcookie("user_name",$_SESSION['user_name'], time()+60*60*24*COOKIE_TIME_OUT, "/");

		  header('location:home.php');
	}*/


	$username=$_POST['username'];
	$password=trim($_POST['password']);

	if($username=="")
	{

		echo "<script>document.location='index.php?msg=1';</script>";
	}
	else if($password=="")
	{
		echo "<script>document.location='index.php?msg=2';</script>";
	}
	else
	{
		$qry="select * from tbl_admin where username='".$username."' and password='".$password."'";

		$result=mysqli_query($cn,$qry);
		$row=mysqli_fetch_assoc($result);
	
		if($row > 0)
		{
			$_SESSION['id']=$row['id'];
		    $_SESSION['admin_name']=$row['username'];

			if(isset($_POST['remember']))
			{
			  setcookie("id", $_SESSION['id'], time()+60*60*24);
			  setcookie("admin_name",$_SESSION['admin_name'], time()+60*60*24);

			}

			echo "<script>document.location='home.php';</script>";

		}
		else
		{
			echo "<script>document.location='index.php?msg=4';</script>";
		}
	}





?>

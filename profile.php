<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new k_wallpaper($cn);


	if(isset($_SESSION['id']))
	{

		$qry="select * from tbl_admin where id='".$_SESSION['id']."'";

		$result=mysqli_query($cn,$qry);
		$row=mysqli_fetch_assoc($result);

	}
	if(isset($_POST['submit']))
	{

		$kwallpaper->editProfile();

		echo "<script>document.location='profile.php';</script>";
	    exit;
	}


?>
<script src="js/category.js" type="text/javascript"></script>

                <div id="main">
                <h2><a href="home.php">Dashboard</a> &raquo; <a href="#" class="active"></a></h2>


                	<form action="" name="editprofile" method="post" class="jNice"enctype="multipart/form-data">



                    	<fieldset>

                        	<p><label>Username:</label>
								<input type="text" name="username" id="username" value="<?php echo $row['username'];?>" class="text-long" />
							</p>

                            <p><label>Password:</label>
								<input type="password" name="password" id="password" value="<?php echo $row['password'];?>" class="text-long" />
							</p>

                            <p><label>Email:</label>
								<input type="text" name="email" id="email" value="<?php echo $row['email'];?>" class="text-long" />
							</p>

                            <input type="submit" name="submit" value="Edit Profile"/>
                        </fieldset>
                    </form>
                </div>
                <!-- // #main -->

                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>
        <!-- // #containerHolder -->

<?php include("includes/footer.php");?>

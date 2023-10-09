<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new k_wallpaper($cn);

	if(isset($_POST['submit']) and isset($_GET['add']))
	{

		$_SESSION['msg']="Category added successfully";


		$kwallpaper->addCategory();


		echo "<script>document.location='manage_category.php';</script>";
	    exit;

	}

	if(isset($_GET['cat_id']))
	{

			$qry="SELECT * FROM tbl_category where cid='".$_GET['cat_id']."'";
			$result=mysqli_query($cn,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	if(isset($_POST['submit']) and isset($_POST['edit']))
	{

		$kwallpaper->editCategory();

		echo "<script>document.location='manage_category.php';</script>";
	    exit;
	}


?>
<script src="js/category.js" type="text/javascript"></script>

                <div id="main">
                <h2><a href="home.php">Dashboard</a> &raquo; <a href="#" class="active"></a></h2>


                	<form action="" name="addeditcategory" method="post" class="jNice" onsubmit="return checkValidation(this);" enctype="multipart/form-data">

					<input  type="hidden" name="edit" value="<?php echo $_GET['cat_id'];?>" />

					<h3><?php if(isset($_GET['cat_id'])){?>Edit<?php }else{?>Add<?php }?> Category</h3>
                    	<fieldset>

                        	<p><label>Category Name:</label>
								<input type="text" name="category_name" id="category_name" value="<?php if(isset($_GET['cat_id'])){echo $row['category_name'];}?>" class="text-long" />
							</p>
                        	 <?php if(isset($_GET['cat_id'])){
								 ?>

							<img src="images/thumbs/<?php echo $row['category_image'];?>" />
						   <?php }?>
                             <p style="margin-top: -35px;"><label style="padding-top:40px;">Select Image:</label><input type="file" name="image" id="image" value="" class="text-long" /></p>

                            <input type="submit" name="submit" value="<?php if(isset($_GET['cat_id'])){?>Edit Category<?php }else {?>Add Category<?php }?>" onclick="return chk(this);"/>
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

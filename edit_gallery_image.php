<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new k_wallpaper($cn);


	//Get all Category
	$qry="SELECT * FROM tbl_category";
	$result=mysqli_query($cn,$qry);



	if(isset($_GET['img_id']))
	{
		$img_qry="SELECT * FROM  tbl_gallery WHERE id='".$_GET['img_id']."'";
		$img_res=mysqli_query($cn,$img_qry);
		$img_row=mysqli_fetch_assoc($img_res);

	}

	 if(isset($_POST['submit']) and isset($_GET['img_id']))
	{

		$kwallpaper->editimage();


		echo "<script>document.location='manage_gallery.php';</script>";
	    exit;

	}

?>

                <!-- h2 stays for breadcrumbs -->
                <h2><a href="home.php">Dashboard</a> &raquo; <a href="#" class="active"></a></h2>

                <div id="main">



					<h3>Edit Image</h3>

					<form action="" method="post" class="jNice" enctype="multipart/form-data">

						<fieldset>

							<p>
								<label>Select Category:</label>


									<select name="category">

										<option value="0">--Select Category--</option>
										<?php
												while($row=mysqli_fetch_array($result))
												{
										 			if(isset($_POST['category']))
													{
															if($_POST['category']==$row['cid']){
															?>
															<option value="<?php echo $row['cid'];?>"  selected="selected"><?php echo $row['category_name'];?></option>								<?php }else{?>
										<option value="<?php echo $row['cid'];?>"><?php echo $row['category_name'];?></option>
										<?php 				}?>

												<?php }
													else
													{
														 if($img_row['cat_id']==$row['cid']){

											 ?>
										<option value="<?php echo $row['cid'];?>"  selected="selected"><?php echo $row['category_name'];?> </option>								<?php }else{?>
										<option value="<?php echo $row['cid'];?>"><?php echo $row['category_name'];?></option>
										<?php 				}
														}
												}
										?>
									</select>
								 </p>


							<p><label>Image:</label>
              <?php
								$cat_img_res=mysqli_query($cn,'SELECT * FROM tbl_category WHERE cid=\''.$img_row['cat_id'].'\'');
								$cat_img_row=mysqli_fetch_assoc($cat_img_res);
							?>

								<img src="categories/<?php echo $cat_img_row['category_name'];?>/<?php echo $img_row['image'];?>" height="100" width="100" />
							</p>


							<p><label>Select Image:</label>
								<input type="file" name="image" id="image" value="" class="text-long" />
							</p>



                            <input type="submit" name="submit" value="Edit Image" />
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

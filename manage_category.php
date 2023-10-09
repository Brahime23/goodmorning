<?php include("includes/header.php");

	require("includes/function.php");
	$kwallpaper=new k_wallpaper($cn);


	//Get all Category
	$qry="SELECT * FROM tbl_category";
	$result=mysqli_query($cn,$qry);

	if(isset($_GET['cat_id']))
	{
		$kwallpaper->deleteCategory();


		echo "<script>document.location='manage_category.php';</script>";
	    exit;

	}

?>

                <!-- h2 stays for breadcrumbs -->
                <h2><a href="home.php">Dashboard</a> &raquo; <a href="#" class="active">Manage Category</a></h2>

                <div id="main">
                	<form action="" class="jNice">
					<h3>Manage Category</h3>

					<h3 align="right"><a href="add_category.php?add=yes">Add Category</a></h3>
                    	<table cellpadding="0" cellspacing="0">

						<?php

							$i=0;
							while($row=mysqli_fetch_array($result))
							{

						?>


							<tr <?php if($i%2==0){?>class="odd"<?php }?>>
                                <td><?php echo $row['category_name'];?></td>
                                <td><img src="images/thumbs/<?php echo $row['category_image'];?>" /></td>
                                <td class="action"><a href="add_category.php?cat_id=<?php echo $row['cid'];?>" class="edit">Edit</a><a href="?cat_id=<?php echo $row['cid'];?>" class="delete" onclick="return confirm('Are you sure you want to delete this Category?');">Delete</a></td>
                            </tr>

						<?php

							$i++;
							}
						?>

                        </table>

                </div>
                <!-- // #main -->

                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>
        <!-- // #containerHolder -->

<?php include("includes/footer.php");?>

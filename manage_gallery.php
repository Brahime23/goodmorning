<?php include("includes/header.php");
	require("includes/function.php");
	$kwallpaper=new k_wallpaper($cn);


	$tableName="tbl_gallery";
	$targetpage = "manage_gallery.php";
	$limit = 15;

	$query = "SELECT COUNT(*) as num FROM $tableName";
	$total_pages = mysqli_fetch_array(mysqli_query($cn,$query));
	$total_pages = $total_pages['num'];

	$stages = 3;
	$page=0;
	if(isset($_GET['page'])){
	$page = mysqli_real_escape_string($cn, $_GET['page']);
	}
	if($page){
		$start = ($page - 1) * $limit;
	}else{
		$start = 0;
		}

    // Get page data

   $qry="SELECT * FROM tbl_gallery
LEFT JOIN tbl_category ON tbl_gallery.cat_id= tbl_category.cid ORDER BY tbl_gallery.id DESC LIMIT $start, $limit";
	$result=mysqli_query($cn,$qry);



	if(isset($_GET['img_id']))
	{
		$kwallpaper->deleteImage();


		echo "<script>document.location='manage_gallery.php';</script>";
	    exit;

	}

?>

                <!-- h2 stays for breadcrumbs -->
                <h2><a href="home.php">Dashboard</a> &raquo; <a href="#" class="active">Manage Gallery</a></h2>

                <div id="main">
                	<form action="" class="jNice">
					<h3>Manage Gallery</h3>

					<h3 align="right"><a href="add_gallery_image.php?add=yes">Add Image</a></h3>
                    	<table cellpadding="0" cellspacing="0">

						<tr>
						<td><h3>Category</h3></td>

						<td><h3>Image</h3></td>
						<td><h3>Edit</h3></td>
						<td><h3>Delete</h3></td>

						</tr>


						<?php

							$i=0;
							while($row=mysqli_fetch_array($result))
							{

						?>

							<tr <?php if($i%2==0){?>class="odd"<?php }?>>
								<td><?php echo $row['category_name'];?></td>

								<td><img src="categories/<?php echo $row['category_name'];?>/<?php echo $row['image'];?>" height="100" width="100" /></td>
                                <td class="action"><a href="edit_gallery_image.php?img_id=<?php echo $row['id'];?>" class="edit">Edit</a></td>
								<td class="action"><a href="?img_id=<?php echo $row['id'];?>" class="delete" onclick="return confirm('Are you sure you want to delete this Image?');">Delete</a></td>
                            </tr>

						<?php

							$i++;
							}
						?>

                        </table><br />
						<?php
								// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;
	$next = $page + 1;
	$lastpage = ceil($total_pages/$limit);
	$LastPagem1 = $lastpage - 1;


	$paginate = '';
	if($lastpage > 1)
	{




		$paginate .= "<div class='paginate'>";
		// Previous
		if ($page > 1){
			$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
		}else{
			$paginate.= "<span class='disabled'>previous</span>";	}



		// Pages
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<span class='current'>$counter</span>";
				}else{
					$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
				}
			}
		}

				// Next
		if ($page < $counter - 1){
			$paginate.= "<a href='$targetpage?page=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}

		$paginate.= "</div>";


}

 // pagination
 echo $paginate;
								?>
 <br />

                </div>
                <!-- // #main -->

                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>
        <!-- // #containerHolder -->

<?php include("includes/footer.php");?>

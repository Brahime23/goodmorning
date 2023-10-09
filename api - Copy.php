<?php include("includes/connection.php");

  
	if(isset($_GET['cat_id']))
	{
		
		$cat_id=$_GET['cat_id'];		
	
	
		$cat_img_res=mysqli_query($cn,'SELECT * FROM tbl_category WHERE cid=\''.$cat_id.'\'');
		  $cat_img_row=mysqli_fetch_assoc($cat_img_res);
	
			$query="SELECT tbl_gallery.id,tbl_gallery.cat_id,tbl_gallery.image,tbl_category.category_name FROM tbl_gallery
		LEFT JOIN tbl_category ON tbl_gallery.cat_id= tbl_category.cid 
		where tbl_gallery.cat_id='".$cat_id."'";
		
	}
	else if(isset($_GET['latest']))
	{
		$limit=$_GET['latest'];	 	
		$query="SELECT tbl_gallery.id,tbl_gallery.cat_id,tbl_gallery.image,tbl_category.category_name FROM tbl_gallery
		LEFT JOIN tbl_category ON tbl_gallery.cat_id= tbl_category.cid 
		ORDER BY tbl_gallery.id DESC LIMIT $limit";
	}
	else
	{
		$query="SELECT cid,category_name FROM tbl_category";
			
	}
	
	
     
	$resouter = mysqli_query($cn,$query);
     
    $set = array();
     
    $total_records = mysqli_num_rows($resouter);
    if($total_records >= 1){
     
      while ($link = mysqli_fetch_assoc($resouter)){
	  
	  	$set['wallpaper'][] = $link;
      }
    }
     
    echo $val= json_encode($set);
	 	 
	 
?>
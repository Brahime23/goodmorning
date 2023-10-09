<?php include("includes/connection.php");

  
	if(isset($_GET['cat_id']))
	{
		
		$cat_id=$_GET['cat_id'];		
	
	
				$cat_img_res=mysqli_query($cn,'SELECT * FROM tbl_category WHERE cid=\''.$cat_id.'\'');
				$cat_img_row=mysqli_fetch_assoc($cat_img_res);
	
				$cat_nm=$cat_img_row['category_name'];
				$files = array();

				$dir = opendir(dirname(realpath(__FILE__)).'/categories/'.$cat_img_row['category_name'].'/');
				while ($file = readdir($dir)) {
						if ($file == '.' || $file == '..') {
								continue;
						}
					
						$allimages[] = $file;
				}
				
				$total_arr=array_merge((array)$cat_nm,(array)$allimages);
				
				sort($total_arr);
				
				 
				foreach($total_arr as $key=>$file){
						
										if($key != count($total_arr)-1)
										{
													$array['HDwallpaper'][] = array(										 
																	'images' => $file,
																	'cat_name' => $cat_nm										 
															);
										}
								}   
				echo stripslashes(json_encode($array));
								
		
	}
	else if(isset($_GET['latest']))
	{
		 
		 
		 
				$limit=$_GET['latest'];	 	
		$query="SELECT tbl_gallery.image,tbl_category.category_name FROM tbl_gallery
		LEFT JOIN tbl_category ON tbl_gallery.cat_id= tbl_category.cid 
		ORDER BY tbl_gallery.id DESC LIMIT $limit";
		
		$resouter = mysqli_query($cn,$query);
     
    $set = array();
     
    $total_records = mysqli_num_rows($resouter);
    if($total_records >= 1){
     
      while ($link = mysqli_fetch_assoc($resouter)){
	   
        $set['HDwallpaper'][] = $link;
      }
    }
     
     echo $val= str_replace('\\/', '/', json_encode($set));
		
	}
	else
	{
		$query="SELECT cid,category_name,category_image FROM tbl_category";
		
		
		$resouter = mysqli_query($cn,$query);
     
    $set = array();
     
    $total_records = mysqli_num_rows($resouter);
    if($total_records >= 1){
     
      while ($link = mysqli_fetch_assoc($resouter)){
	   
        $set['HDwallpaper'][] = $link;
      }
    }
     
     echo $val= str_replace('\\/', '/', json_encode($set));
			
	}
	 
?>
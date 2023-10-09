<?php include("includes/connection.php");

  
	if(isset($_GET['cat_id']))
	{
		
		$cat_id=$_GET['cat_id'];		
	
	
		$cat_img_res=mysqli_query($cn,'SELECT * FROM tbl_category WHERE cid=\''.$cat_id.'\'');
		$cat_img_row=mysqli_fetch_assoc($cat_img_res);
	
			/*$handle = opendir(dirname(realpath(__FILE__)).'/categories/'.$cat_img_row['category_name'].'/');
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                echo $files[]=$file;
            }
        }*/
				
				$files = array();

				$dir = opendir(dirname(realpath(__FILE__)).'/categories/'.$cat_img_row['category_name'].'/');
				while ($file = readdir($dir)) {
						if ($file == '.' || $file == '..') {
								continue;
						}
					
						$files['HDwallpaper'][] = "image:".$file;
				}
				
				header('Content-type: application/json');
				echo json_encode($files);
								
		
	}
	else if(isset($_GET['latest']))
	{
		 
		 
		 
				$limit=$_GET['latest'];	 	
		$query="SELECT tbl_gallery.image FROM tbl_gallery
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
		$query="SELECT cid,category_name FROM tbl_category";
		
		
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
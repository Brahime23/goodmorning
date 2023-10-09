<?php include("includes/header.php");?>
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Print resources</a></h2>
                
                <div id="main">
                	 
					<h3 align="left">Total Categories</h3>
                   <?php 
						
						$qry_cat="SELECT COUNT(*) as num FROM tbl_category";
						$total_category= mysqli_fetch_array(mysqli_query($cn,$qry_cat));
						$total_category = $total_category['num'];
					
					?>	
                    	<p style="margin-left:50px;"><a href="manage_category.php" style="color:#009900;text-decoration:none; font-size:16px;"><?php echo $total_category;?></a></p>
                    
                    	 
					<h3 align="right" style="margin-top:-40px">Total Images</h3>
                     <?php 
						
						$qry_gallery="SELECT COUNT(*) as num FROM tbl_gallery";
						$total_images = mysqli_fetch_array(mysqli_query($cn,$qry_gallery));
						$total_images = $total_images['num'];
					
					?>	 
                     <p align="right" style="margin-right:45px; margin-bottom:50px;"><a href="manage_gallery.php" style="color:#009900;text-decoration:none; font-size:16px;"><?php echo $total_images;?></a></p>
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
<?php include("includes/footer.php");?>       

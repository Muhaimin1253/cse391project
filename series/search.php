<?php

$db = mysqli_connect("localhost", "root", "", "dbinfo") or die("Not connected");

 if(isset($_POST['search'])){
	    $searchquery = $_POST['search'];
		//$searchquery = preg_replace("#[^0-9a-z]#i","",$searchquery);
	
		//$query = mysqli_query($db,"SELECT * FROM gameinfo WHERE gname LIKE '%{$searchquery}%' or gname SOUNDS LIKE '%{$searchquery}%'"); 
		$query = mysqli_query($db,"SELECT * FROM gameinfo WHERE gname LIKE CONCAT('%','$searchquery','%')"); 			
		$count = mysqli_num_rows($query );
		if($count==0){
			echo $output = "No results found";
		} else{
			
		   while($row = mysqli_fetch_array($query )){
			   $gname = $row['gname'];
			   $pic = $row['pic'];
			   $link = $row['link'];
			   ?>
			   
			   <p>
			   <?php echo $gname; ?>
			   </p>
			   <a href="<?php echo $link?>">
			   <img src="<?php echo $pic?>" style="width:75%">
			   </a>
		  

		  <?php }
	 }
 }?>


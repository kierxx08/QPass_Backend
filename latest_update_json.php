<?php
require "conn.php";


echo '
[  ';

$sqlUpdate = mysqli_query($conn,"SELECT * FROM `latest_update` ORDER BY id DESC");
$num_Update = mysqli_num_rows($sqlUpdate);
$i = 1;
while($Update_fetch=mysqli_fetch_array($sqlUpdate)){
	$Update_id = $Update_fetch['id'];
	$Update_title = $Update_fetch['title'];
	$Update_sm_desc = $Update_fetch['sm_desc'];
	$Update_img = "https://bastaleakserver000.000webhostapp.com/QPass_App/sm_icon/$Update_id.png";
	$Update_date = date("M d, Y", $Update_fetch['date']);


	echo '
	{  
      "title":"'.$Update_title.'",
      "sm_desc":"'.$Update_sm_desc.'",
      "img":"'.$Update_img.'",
      "date":"'.$Update_date.'"
   }';

   if($i<$num_Update){
   	echo ',';
   }
   $i += 1;
}
echo ']';
?>
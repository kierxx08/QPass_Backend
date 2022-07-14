<?php
require "conn.php";


echo '
[  ';

$sqlCovid = mysqli_query($conn,"SELECT * FROM `covid_case` ORDER BY case_ID DESC");
$num_case = mysqli_num_rows($sqlCovid);
$i = 1;
while($case_fetch=mysqli_fetch_array($sqlCovid)){
	$case_id = $case_fetch['case_id'];
	$case_brgy_id = $case_fetch['case_brgy_id'];

	$sqlBrgy = mysqli_query($conn,"SELECT * FROM `brgy_info` WHERE brgy_id='$case_brgy_id'");
	$row_Brgy=mysqli_fetch_array($sqlBrgy);

	$case_brgy_name = $row_Brgy['brgy_name'];
	$case_detected = date("M d, Y",$case_fetch['case_detected']);

	echo '
	{  
      "case_id":"Case '.$case_id.'",
      "url":"'.$case_detected.'",
      "case_brgy":"Brgy. '.$case_brgy_name.'",
      "case_image":"https://images.vexels.com/media/users/3/199841/isolated/preview/96a7cac08ad4539e1888d8f5c82b5f48-coronavirus-covid19-icon-by-vexels.png"
   }';

   if($i<$num_case){
   	echo ',';
   }
   $i += 1;
}
echo ']';
?>
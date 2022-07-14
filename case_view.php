<?php
require "conn.php";

$caseNo=$_POST["caseNo"];

$sqlCovid = mysqli_query($conn,"SELECT * FROM `covid_case` ORDER BY case_ID DESC LIMIT $caseNo,1");
$row_Covid=mysqli_fetch_array($sqlCovid);
$num_case=mysqli_num_rows($sqlCovid);


$case_id = $row_Covid['case_id'];
$case_age = $row_Covid['case_age'];
$case_gender = $row_Covid['case_gender'];
$case_brgy_id = $row_Covid['case_brgy_id'];

$sqlBrgy = mysqli_query($conn,"SELECT * FROM `brgy_info` WHERE brgy_id='$case_brgy_id'");
$row_Brgy=mysqli_fetch_array($sqlBrgy);

$case_brgy_name = $row_Brgy['brgy_name'];
$case_status = $row_Covid['case_status'];
$case_where = $row_Covid['case_where'];
$case_detected = date("M d, Y",$row_Covid['case_detected']);

echo "Success;$case_id;$case_age;$case_gender;$case_brgy_name;$case_status;$case_where;$case_detected";



?>
<?php
require "conn.php";


$sqlCases = mysqli_query($conn,"SELECT * FROM `covid_case` ORDER BY case_id DESC");
$num_Cases = mysqli_num_rows($sqlCases);
$case_fetch=mysqli_fetch_array($sqlCases);
$case_Updated = date("M d, Y",$case_fetch['case_detected']);

$sqlRecovered = mysqli_query($conn,"SELECT * FROM `covid_case` WHERE case_status = 'Recovered'");
$num_Recovered = mysqli_num_rows($sqlRecovered);

$sqlDied = mysqli_query($conn,"SELECT * FROM `covid_case` WHERE case_status='Died'");
$num_Died = mysqli_num_rows($sqlDied);

$sqlActive = mysqli_query($conn,"SELECT * FROM `covid_case` WHERE case_status!='Died' AND case_status!='Recovered'");
$num_Active = mysqli_num_rows($sqlActive);

echo'
    {
        updated: "'.$case_Updated.'",
        cases: '.$num_Cases.',
        recovered: '.$num_Recovered.',
        deaths: '.$num_Died.',
        active: '.$num_Active.'
    }'
?>
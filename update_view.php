<?php
require "conn.php";
if(isset($_POST['caseNo'])){
    $caseNo=$_POST['caseNo'];

    $sqlCovid = mysqli_query($conn,"SELECT * FROM `latest_update` ORDER BY id DESC LIMIT $caseNo,1");
    $row_Covid=mysqli_fetch_array($sqlCovid);
    $num_case=mysqli_num_rows($sqlCovid);


    $case_id = $row_Covid['id'];
    $case_age = $row_Covid['title'];
    $case_gender = $row_Covid['full_desc'];
    $case_detected = date("M d, Y", $row_Covid['date']);

    $photo =  "https://bastaleakserver000.000webhostapp.com/QPass_App/photo/$case_id.jpg";

echo "Success;$case_age;$case_gender;$case_detected;$photo";
}else{
    echo "Error";
}


?>
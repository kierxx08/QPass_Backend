<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Laurel Cases</h2>
<table>
  <tr>
    <th>Case ID</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Barangay</th>
    <th>Status</th>
    <th>Where</th>
    <th>Detected</th>
  </tr>
<?php
	include('conn.php');

    $case_query = mysqli_query($conn,"select * from covid_case");
    //$case_count = mysqli_num_rows($case_query);
    //$case_fetch=mysqli_fetch_array($case_query);
    

    while($case_fetch=mysqli_fetch_array($case_query)){
    	$case_id = $case_fetch['case_id'];
    	$case_age = $case_fetch['case_age'];
      $case_gender = $case_fetch['case_gender'];
      $case_brgy_id = $case_fetch['case_brgy_id'];

      $brgy_query = mysqli_query($conn,"SELECT * FROM `brgy_info` WHERE brgy_id='$case_brgy_id'");
      $brgy_fetch=mysqli_fetch_array($brgy_query);

      $case_brgy_name = $brgy_fetch['brgy_name'];

      $case_status = $case_fetch['case_status'];
      $case_where = $case_fetch['case_where'];
      $case_detected = date("Y-m-d H:i:s",$case_fetch['case_detected']);

?>
  <tr>
    <td><?php echo $case_id; ?></td>
    <td><?php echo $case_age; ?></td>
    <td><?php echo $case_gender; ?></td>
    <td><?php echo $case_brgy_name; ?></td>
    <td><?php echo $case_status; ?></td>
    <td><?php echo $case_where; ?></td>
    <td><?php echo $case_detected; ?></td>
  </tr>
<?php } ?>
</table>

</body>
</html>

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
<title>Device Registered</title>
</head>
<body>

<h2 align="center">Device Registered</h2>
<table>
  <tr>
    <th>Brand</th>
    <th>Model</th>
  </tr>
<?php
  include('conn.php');

    $device_query = mysqli_query($conn,"select * from device_info");
    //$device_count = mysqli_num_rows($device_query);
    //$device_fetch=mysqli_fetch_array($device_query);
    

    while($device_fetch=mysqli_fetch_array($device_query)){
      $device_brand = $device_fetch['device_brand'];
      $device_model = $device_fetch['device_model'];

?>
  <tr>
    <td><?php echo $device_brand; ?></td>
    <td><?php echo $device_model; ?></td>
  </tr>
<?php } ?>
</table>

</body>
</html>

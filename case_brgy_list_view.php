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
<title>COVID-19 UPDATE</title>
</head>
<body>

<h2 align="center">COVID-19 UPDATE</h2>
<table>
  <tr>
    <th>Barangay</th>
  </tr>
<?php
  include('conn.php');

    $brgy_query = mysqli_query($conn,"select * from brgy_info");
    //$user_count = mysqli_num_rows($user_query);
    //$user_fetch=mysqli_fetch_array($user_query);
    

    while($brgy_fetch=mysqli_fetch_array($brgy_query)){
      $brgy_name = $brgy_fetch['brgy_name'];

?>
  <tr>
    <td><?php echo $brgy_name; ?></td>
  </tr>
<?php } ?>
</table>

</body>
</html>

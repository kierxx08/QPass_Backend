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
<title>User Registered</title>
</head>
<body>

<h2 align="center">User Registered</h2>
<table>
  <tr>
    <th>Name</th>
  </tr>
<?php
  include('conn.php');

    $user_query = mysqli_query($conn,"select * from user_info");
    //$user_count = mysqli_num_rows($user_query);
    //$user_fetch=mysqli_fetch_array($user_query);
    

    while($user_fetch=mysqli_fetch_array($user_query)){
      $user_fname = $user_fetch['fname'];
      $user_lname = $user_fetch['lname'];

?>
  <tr>
    <td><?php echo $user_fname ." ". $user_lname; ?></td>
  </tr>
<?php } ?>
</table>

</body>
</html>

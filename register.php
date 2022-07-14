<?php
require "conn.php";


$username = $_POST["username"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$bday = $_POST["bday"];
$brgy = $_POST["brgy"];
$add = $_POST["add"];
$password = $_POST["psw"];
$mobile = "63";
$mobile .= $_POST["mobile"];
$gender = $_POST["gender"];
$found = 1;
	while ($found == 1) {
		//$genID = "U-";
		$genID = date("y");
		$genID .= date("m");
		$genID .= date("d");
		$genID .= str_pad(rand(0, 9999), 4, 0, STR_PAD_LEFT);
		$usernameQuery = mysqli_query($conn,"SELECT * FROM `user_info` WHERE user_id='$genID'");
		if (mysqli_num_rows($usernameQuery)==1) {
			$found = 1;
		}else{
			$found = 0;
		}
	}
	
	
	$usernameQuery = mysqli_query($conn,"SELECT * FROM `user_info` WHERE username='$username'");
	$mobileQuery = mysqli_query($conn,"SELECT * FROM `user_info` WHERE mobile='$mobile'");
	$sql_brgy = mysqli_query($conn,"SELECT * FROM `brgy_info` WHERE brgy_name='$brgy'");
	$row_brgy=mysqli_fetch_array($sql_brgy);
	$brgy_id = $row_brgy['brgy_id'];


if ($conn) {
	if(mysqli_num_rows($usernameQuery)>0) {
		echo "Username is already used, type another one.";
	}else if(!ctype_digit($mobile)) {
		echo "Mobile number must be digit only.";
	}else if(strlen($mobile)!=12) {
		echo "Mobile number must be 10 digit.\n(eg. 9123456789)";
	}else if(mysqli_num_rows($mobileQuery)>0) {
		echo "Mobile number is already used.";
	}else if(strlen($password)>40 || strlen($password)<6){
		echo "Password must be less than 40 and more than 6 characters.";
	}else{

		$sql_register = "INSERT INTO `user_info` (`user_id`, `username`, `fname`, `lname`, `bday`, `mobile`, `brgy_id`, `add2`, `password`, `gender`, `status`) VALUES ('$genID','$username','$fname','$lname','$bday','$mobile','$brgy_id','$add','$password','$gender','verify')";

		if(mysqli_query($conn,$sql_register)){
				echo "Successfully Registered";
		}else{
			echo "Failed to Register";
		}
		
	}
}else{
	echo "Connection Error";
}


?>

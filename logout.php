<?php
require "conn.php";


$key = $_POST["key"];

if($conn){
		$sqlCheckEmail = "SELECT * FROM `user_access` WHERE access_id='$key'";
		$emailQuery = mysqli_query($conn,$sqlCheckEmail);
        
		if (mysqli_num_rows($emailQuery)==1) {
		    $sqlCheckKey2 = "DELETE FROM `user_access` WHERE access_id='$key'";

			if(mysqli_query($conn,$sqlCheckKey2)){
				echo "Logout Success";
			}else{
				echo "Logout Error";
			}

		}else{
			echo "Key Error;$key";
		}

}else{
	echo "Connection Error";
}
?>
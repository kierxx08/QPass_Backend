<?php
require "conn.php";

$username= $_POST["username"];
$password= $_POST["psw"];
$phone_id= $_POST["device_id"];
$found = 1;
	while ($found == 1) {
		$genID = str_pad(rand(0, 9999999999), 10, 0, STR_PAD_LEFT);
		$idQuery = mysqli_query($conn,"SELECT * FROM `user_access` WHERE user_id='$genID'");
		if (mysqli_num_rows($idQuery)==1) {
			$found = 1;
		}else{
			$found = 0;
		}
	}


if($conn){
		$sqlCheckUsername = "SELECT * FROM `user_info` WHERE username='$username'";
		$usernameQuery = mysqli_query($conn,$sqlCheckUsername);

		if (mysqli_num_rows($usernameQuery)>0) {
			$sqlLogin = "SELECT * FROM `user_info` WHERE username='$username' AND password='$password'";
			$loginQuery = mysqli_query($conn,$sqlLogin);
			if (mysqli_num_rows($loginQuery)>0) {
				$row_login=mysqli_fetch_array($loginQuery);
				$user_id_login = $row_login['user_id'];
				$user_fname_login = $row_login['fname'];
				$user_lname_login = $row_login['lname'];
				$user_bday_login = $row_login['bday'];
				$user_mobile_login = $row_login['mobile'];
				$user_brgy_id_login = $row_login['brgy_id'];
				
	            $sqlBrgy = mysqli_query($conn,"SELECT * FROM `brgy_info` WHERE brgy_id='$user_brgy_id_login'");
	            $row_Brgy=mysqli_fetch_array($sqlBrgy);

	            $user_brgy_login = $row_Brgy['brgy_name'];
	
				$user_add2_login = $row_login['add2'];
				$user_gender_login = $row_login['gender'];
				
			    $sqlDevice = "SELECT * FROM `device_info` WHERE device_id='$phone_id'";
			    $loginDevice = mysqli_query($conn,$sqlDevice);
			    if (mysqli_num_rows($loginDevice)>0) {
				
			        $sqlAccessDevice = "SELECT * FROM `user_access` WHERE device_id='$phone_id'";
			        $loginAccessDevice = mysqli_query($conn,$sqlAccessDevice);
			        if (mysqli_num_rows($loginAccessDevice)<=0) {
				
			            $sqlAccessDevice = "SELECT * FROM `user_access` WHERE device_id='$phone_id'";
			               $loginAccessDevice = mysqli_query($conn,$sqlAccessDevice);
			            if (mysqli_num_rows($loginAccessDevice)<=0) {
				
                            $date = time();
		                    $sql_access = "INSERT INTO `user_access` (`access_id`, `user_id`, `device_id`, `date`) VALUES ('$genID','$user_id_login','$phone_id','$date')";

		                    if(mysqli_query($conn,$sql_access)){
					            echo "Login Success;$genID;$user_id_login;$user_fname_login;$user_lname_login;$user_bday_login;$user_mobile_login;$user_brgy_login;$user_add2_login;$user_gender_login";
		                    }else{
			                    echo "Login Failed";
		                    }
			            }else{
			                echo "Account: Not Properly Logout\nContact Support";
			            }
			        }else{
			            echo "Device: Not Properly Logout\nContact Support";
			        }
			    }else{
			        echo "Device not Found\nPlease Clear App Data";
			    }
					
			}else{
				echo "Wrong Password";
			}


		}else{
			echo "This Username is not Registered";
		}
	

}else{
	echo "Connection Error";
}
?>

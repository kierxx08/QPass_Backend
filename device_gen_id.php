<?php
require "conn.php";
include "assets/gen_key.php";

if(isset($_POST["device_brand"]) && isset($_POST["device_model"])){
    $phone_brand=$_POST["device_brand"];
    $phone_model=$_POST["device_model"];

    $sql_register = "INSERT INTO `device_info` (`device_id`, `device_brand`, `device_model`) VALUES ('$key','$phone_brand','$phone_model')";

    if($conn){
        if(mysqli_query($conn,$sql_register)){
            echo "Success;$key";
        }else{
	        echo "Failed to Register";
        }
    }else{
	    echo "Error";
    }
}else{
	    echo "Error";
}
?>
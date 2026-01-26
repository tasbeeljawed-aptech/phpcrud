<?php
include("config.php");
$connection = mysqli_connect($host,$dbusername,$dbpassword,$databasename);
if($connection){
    echo "Connected Successfully";
}else{
    echo "Connection Failed";
}

?>
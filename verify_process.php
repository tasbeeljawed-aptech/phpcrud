<?php
include("dbconnection.php");
session_start();

$userotp = $_POST["otp"];

if($_SESSION["otp"] == $userotp){
    // equal
    // data insert DB
    // use sessions

    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $query = "INSERT INTO users(username, email, password)
              VALUES ('$username', '$email', '$password')";

    $run = mysqli_query($connection, $query);

    if($run){
        // removes only otp session
        unset($_SESSION["otp"]);
        echo "<script>alert('SignUp Successful! Now You can Login.')
        window.location.href = 'login.php'
        </script>";
    }else{
        echo "Connectivity Issue";
    }

}else{
    echo "<script>alert('Invalid OTP')
    window.location.href = 'verify_otp.php'
    </script>";
}

?>
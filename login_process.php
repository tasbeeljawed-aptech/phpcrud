<?php
session_start();

include("dbconnection.php");

$email = $_POST["email"];
$password = $_POST["password"];

$query_select = "SELECT * FROM users where email = '$email'";
$row = mysqli_query($connection, $query_select);

if(mysqli_num_rows($row) > 0){
    // user exists in users table

    $data = mysqli_fetch_assoc($row);

    if(password_verify($password, $data["password"])){
        // password verify
        // sessions create 

        $_SESSION["id"] = $data["id"];
        $_SESSION["username"] = $data["username"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["logged_in"] = true;

        echo "<script>alert('Login Successfull')
        window.location.href = 'index.php'
        </script>";

    }else{
        // password not verify
        echo "<script>alert('Invalid Password')
        window.location.href = 'login.php'
        </script>";

    }

}else{
    echo "<script>alert('User Not Found, Kindly SignUp')
    window.location.href = 'signup.php'
    </script>";
}

?>
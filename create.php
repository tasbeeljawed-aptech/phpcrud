<?php
// echo "Create.php"
include('dbconnection.php');

if(isset($_POST["createprofile"])){
    $name =  $_POST["name"];
    $gender =  $_POST["gender"];
    $age = $_POST["age"];
    $class =  $_POST["class"];

    $profileimage = $_FILES["image"];
    $profileimage_name = $profileimage["name"];
    $profileimage_tmp_name = $profileimage["tmp_name"];

    // echo "<br>";
    // print_r($profileimage);
    // echo "<br>";

    // echo $profileimage_name;
    // echo "<br>";
    // echo $profileimage_tmp_name;
    // echo "<br>";

    $folder = "images/";
    $image_path = $folder . $profileimage_name;


    echo $name;
    echo "<br>";
    echo $gender;
    echo "<br>";
    echo $age;
    echo "<br>";
    echo $class;
    echo "<br>";
    echo $image_path;


    $query = "INSERT INTO student (student_name, student_gender, student_age, student_class , image_path)
    VALUES ('$name','$gender','$age','$class','$image_path')";

    $run =  mysqli_query($connection,$query);

    if($run){
        // query executes
        move_uploaded_file($profileimage_tmp_name, $image_path);
        // echo "<br>Data Inserted";
        echo "<script>alert('Data Inserted')
        window.location.href = 'read.php'
        </script>";
    }else{
        // query not executes
        // echo "<br>Data Not Inserted";
        echo "<script>alert('Data Not Inserted')
        </script>";
    }


}

?>
<?php
session_start();
if(!isset($_SESSION["logged_in"])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Class</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    <?php
    include("dbconnection.php");

    echo "<br>";
    $query = "SELECT * FROM student";

    $rows = mysqli_query($connection,$query); // rows -> sql form

    // // covert sql form -> associative array(key: value)
    // $data = mysqli_fetch_assoc($rows); // associative array (1 row covert)
    // $data1 = mysqli_fetch_assoc($rows); // associative array (1 row covert)
    // $data2 = mysqli_fetch_assoc($rows); // associative array (1 row covert)


    // print_r($data);
    // echo "<br>";
    // print_r($data1);
    // echo "<br>";
    // print_r($data2);

    while($data = mysqli_fetch_assoc($rows)){
        // print_r($data);
        // echo "<br>";

        echo "<tr>
        <td>".$data["student_id"]."</td>
        <td>".$data["student_name"]."</td>
        <td>".$data["student_gender"]."</td>
        <td>".$data["student_age"]."</td>
        <td>".$data["student_class"]."</td>
        <td><img src='".$data["image_path"]."' height='50' width='50'></td>
        <td><a href='update.php?id=$data[student_id]'> ✏ Update</a> <a href='delete.php?id=$data[student_id]'> 🗑 Delete</a></td>
        </tr>";
    }

    
    ?>

</table>
<a href="form.php">Add Student</a>
<a href="logout.php">Logout</a>
</body>
</html>
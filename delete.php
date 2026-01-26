<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('dbconnection.php');

    $id = $_GET['id'];
    $query_select  = "SELECT * FROM student WHERE student_id ='$id'";
    $row = mysqli_query($connection,$query_select); //sql form
    $data = mysqli_fetch_assoc($row); 
    // print_r($data);
    $image_path = $data["image_path"];
    // echo $image_path
    unlink($image_path);

    $query_Delete = "DELETE FROM student WHERE student_id = '$id'";
    $run = mysqli_query($connection, $query_Delete);

    if($run){
        echo "<script>alert('Data Deleted')
        window.location.href = 'read.php'
        </script>";
    }else{
        echo "<script>alert('Data Not Deleted')
        window.location.href = 'read.php'
        </script>";
    }

    ?>
</body>
</html>
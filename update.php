<?php
session_start();
if(!isset($_SESSION["logged_in"])){
    header("location:login.php");
}
?>
<?php
include("dbconnection.php");

$id =  $_GET["id"];

$query = "SELECT * FROM student WHERE student_id = '$id'";

$row = mysqli_query($connection, $query);

$data = mysqli_fetch_assoc($row);

// echo "<br><br>";

// print_r($data);

// echo "<br><br>";

// echo $data["student_id"] . "<br>";
// echo $data["student_name"] . "<br>";
// echo $data["student_gender"] . "<br>";
// echo $data["student_age"] . "<br>";
// echo $data["student_class"] . "<br>";
// echo $data["image_path"] . "<br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Update Student</h1>
    <form action="update.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $data["student_id"] ?>" >

        <label for="">Student Name: </label>
        <input type="text" name="name" id="" value="<?php echo $data["student_name"] ?>">

        <br><br>

        <label for="">Student Gender: </label>
        <select name="gender" id="">
            <?php
            if($data["student_gender"] == "male"){
                echo "
                <option value='select'>Select Gender</option>
                <option value='male' selected>Male</option>
                <option value='female'>Female</option>
                ";
            }else{
                echo "
                <option value='select'>Select Gender</option>
                <option value='male' >Male</option>
                <option value='female'selected>Female</option>
                ";
            }
            ?>
        </select>

        <br><br>

        <label for="">Student Age: </label>
        <input type="number" name="age" id="" value="<?php echo $data["student_age"] ?>">

        <br><br>

        <label for="">Student Class: </label>
        <input type="number" name="class" id="" value="<?php echo $data["student_class"] ?>">

        <br><br>

        <img src="<?php echo $data["image_path"]?>" alt="" height="50" width="50">
        <br><br>

        <!-- input -> hide user -> old image path server -->
        <input type="hidden" name="old_image_path" value="<?php echo $data["image_path"]?>">

        <label for="">Student Image: </label>
        <input type="file" name="image" id="">

        <br><br>

        <button type="submit" name="updateprofile">Update Profile</button>
    </form>
</body>
<a href="logout.php">Logout</a>

</html>

<?php
if(isset($_POST["updateprofile"])){
    $id = $_POST['id'];
    $name =  $_POST["name"]  ;
    $gender =  $_POST["gender"] ;
    $age =  $_POST["age"] ;
    $class =  $_POST["class"] ;
    $profile_image = $_FILES["image"];
    $profile_image_name = $profile_image["name"];
    $profile_image_tmp_name =$profile_image["tmp_name"];
    $old_image_path = $_POST["old_image_path"];
    $folder = "images/";



    echo $name;
    echo "<br>";
    echo $gender;
    echo "<br>";
    echo $age;
    echo "<br>";
    echo $class;
    echo "<br>";
    print_r($profile_image);
    echo "<br>";
    echo $profile_image_name;
    echo "<br>";
    echo $profile_image_tmp_name;
    echo "<br>";
    echo $new_image_path;
    echo "<br>";
    echo $old_image_path;

    // 2 users
    // data update
    // data + img update


    // check user new image upload -> yes/no
    if(is_uploaded_file($profile_image_tmp_name)){
        //code -> user new image upload

        // old image delete
        unlink($old_image_path);

        $new_image_path  = $folder . $profile_image_name;

        $query = "UPDATE student SET
        student_name = '$name',
        student_gender = '$gender',
        student_age = '$age',
        student_class = '$class',
        image_path = '$new_image_path'
        WHERE
        student_id = '$id'";

        $run = mysqli_query($connection,$query);

        if($run){
            // query execute
            move_uploaded_file($profile_image_tmp_name, $new_image_path);
            echo "<script>alert('data updated')
            window.location.href = 'read.php'
            </script>";
        }else{
            // query not executes
            echo "<script>alert('data not updated')</script>";
        }
    }else{
        // code -> data update
        $query = "UPDATE student SET
        student_name = '$name',
        student_gender = '$gender',
        student_age = '$age',
        student_class = '$class'
        WHERE
        student_id = '$id'";

        $run = mysqli_query($connection,$query);

        if($run){
            // query execute
            echo "<script>alert('data updated')
            window.location.href = 'read.php'
            </script>";
        }else{
            // query not executes
            echo "<script>alert('data not updated')</script>";
        }
    }

   



}

?>
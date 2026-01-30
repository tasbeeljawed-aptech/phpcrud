<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Student</h1>
    <form action="create.php" method="post" enctype="multipart/form-data">

        <label for="">Student Name: </label>
        <input type="text" name="name" id="" required>

        <br><br>

        <label for="">Student Gender: </label>
        <select name="gender" id="">
            <option value="select">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <br><br>

        <label for="">Student Age: </label>
        <input type="number" name="age" id="" required>

        <br><br>

        <label for="">Student Class: </label>
        <input type="number" name="class" id="" required>

        <br><br>

        <label for="">Student Image: </label>
        <input type="file" name="image" id="" required>

        <br><br>

        <button type="submit" name="createprofile">Create Profile</button>
    </form>
</body>
</html>
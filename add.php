<?php
include 'db.php';

if(isset($_POST['submit'])){
    //$name = $_POST['name'];
    $name = ucfirst($_POST['name']);
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
   
if(!is_dir("uploads")){
        mkdir("uploads");
    }

    move_uploaded_file($tmp, "uploads/".$image);

    $sql = "INSERT INTO users (name,email,mobile,password,image)
            VALUES ('$name','$email','$mobile','$password','$image')";
    mysqli_query($conn, $sql);

    header("Location: home.php");
}
?>

<div class="container">
    <h2>Add User</h2>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name"  required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="mobile" placeholder="Mobile" required>
        <input type="password" name="password" placeholder="Password"  required>
        <input type="file" name="image">


        <button name="submit">Add User</button>
    </form>
</div>
<head><link rel="stylesheet" href="add.css">
</head>
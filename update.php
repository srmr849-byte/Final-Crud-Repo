<?php
include 'db.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($data);
/*$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

if($image != ""){
    move_uploaded_file($tmp, "uploads/".$image);
    $updateImage = ", image='$image'";
} else {
    $updateImage = "";
} */

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    if($image != ""){
        move_uploaded_file($tmp, "uploads/".$image);
        $updateImage = ", image='$image'";
    } else {
        $updateImage = "";
    }


    mysqli_query($conn,
        "UPDATE users SET
         name='$name',
         email='$email',
         mobile='$mobile',
         password='$password'
         $updateImage
         WHERE id=$id"
    );

    header("Location: home.php");
}
?>
<div class="container">
    <h2>Update User</h2>
<form method="post">
    Name <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Email <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Mobile <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"><br><br>
    Password <input type="password" name="password" value="<?php echo $row['password']; ?>"><br><br>
    <input type="file" name="image">

    <button name="update">Update</button>
</form>
</div>
<head>
    <link rel="stylesheet" href="add.css">
</head>
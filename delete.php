<?php
include 'db.php';
/*
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM users WHERE id=$id");

header("Location: home.php");
*/
$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT image FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($data);

unlink("uploads/".$row['image']);

mysqli_query($conn,"DELETE FROM users WHERE id=$id");
header("Location: home.php");

?>

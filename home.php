<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM users");
?>
<div class="container">

    <a href="add.php" class="btn btn-add">Add User</a>



<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>Sl No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <!-- <th>Password</th> -->
        <th>Image</th>

        <th>Operations</th>
    </tr>
    

    <?php
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <!-- <td><?php // echo $row['password']; ?></td> -->
             <td>
                 <img src="uploads/<?php echo $row['image']; ?>" 
                  width="40" height="40" 
                   style="border-radius:40%;">
            </td>

            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-update">Update</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>"
                    class="btn btn-delete"
                    onclick="return confirmDelete();"> Delete  </a>
                </a>
            </td>
        </tr>
    <?php } ?>
</table>
</div>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this user?");
    }
</script>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="home.css">


</head>
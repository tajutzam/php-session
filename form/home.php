<?php
require_once "../database/koneksi.php";
session_start();
$id =  $_SESSION['id'];

$_query = "select user_email , user_password , user_fullname from user_detail where id = $id";
$mysqli_result = mysqli_query($connect, $_query);
$row = $mysqli_result->fetch_assoc();
$usernameValue = $row['user_email'];
$pwdValue = md5($row['user_password']);
$fullname = $row['user_fullname'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
   
    <table class="table">
        <tr>
            <td>No</td>
            <td>Email</td>
            <td>FullName</td>
            <td>Aksi</td>
            
        </tr>
        <?php
            $querySelect = "select * from user_detail";
        $result = mysqli_query($connect, $querySelect);
        $no = 1;
        while($row = mysqli_fetch_array($result)){
            $user_email = $row['user_email'];
            $user_name = $row['user_fullname'];
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $user_email ?></td>
            <td><?php echo $user_name ?></td>
            <td>
                <a href="">
                    <button type="submit" class="btn btn-warning">Edit</button>
                </a>
                <a href="edit.php">
                    <button type="submit" class="btn btn-danger">Del</button>
                </a>
            </td>
        </tr>
        <?php $no++; }?>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>

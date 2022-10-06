<?php
    require_once "../database/koneksi.php";
    // $connect
    if(isset($_POST['register'])){
        // jika register di pencet
        $username = $_POST['username'];
        $password = $_POST['pwd'];
        $fullname = $_POST['fullname'];
        $query = "insert into user_detail (user_email , user_password , user_fullname , level)  values ('$username','$password','$fullname',1)";
        $result = mysqli_query($connect , $query);
        header("Location:login.php");
    }
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
    <?php
    ?>
    <div class="alert alert-primary" role="alert">
                          <?php echo $error ?>
    </div>             
    <div class="row">
    <h2 class ="col-6">Halo , Silahkan Regristasi</h2>
    <form action="register.php" method="post" class="col-6">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
            <label for="floatingPassword">Password</label>
        </div>
        <br>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="fullname">
            <label for="floatingInput">Nama lengkap</label>
        </div>
        <br>
        <button type="submit" name="register" class="btn btn-primary">Register</button>   
        <a href="login.php">
            <button type="submit" class="btn btn-dark"> Login  </button>
        </a>
    </form>
    </div>
    </div>
</div>
</body>
</html>

<!-- <!doctype html>
<html lang="en">
<head>
  
</head>
<body>
<form action="register.php" method="post">
    <label for="">Masukan Username</label><br>
    <input type="text" name="username" id=""><br>
    <label for="">Masukan Password</label><br>
    <input type="password" name="pwd" id=""><br>
    <label for="">Masukan Nama Lengkap</label><br>
    <input type="text" name="fullname" id="">
    <button type="submit" name="register">Register</button>
</form>
<a href="login.php">
    <button type="submit">Login</button>    
</a>

</body>
</html> -->

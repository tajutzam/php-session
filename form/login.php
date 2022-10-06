<?php
    require_once "../database/koneksi.php";
    $error ="";
    session_start();
    
    if(isset($_SESSION['username'])){ // cek session dengan username jika ada langsung ke home
        header('Location: sb/index.php');
    } // jika tidak ada session maka login dlu 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['pwd'];
        if(!empty(trim($username)) && !empty(trim($password))){
            $query_login ="select * from user_detail where user_email ='$username'";
            $mysqli_stmt =mysqli_query($connect,$query_login);
            $num = mysqli_num_rows($mysqli_stmt);
            $row = $mysqli_stmt->fetch_assoc();
            if($num!=0){
                $idValue = $row['id'];
                $usernameValue = $row['user_email'];
                $passwordValue = $row['user_password'];
                $fullname = $row['user_fullname'];
                $levelValue = $row['level'];
                if($username==$usernameValue&&$password==$passwordValue){
                    // set session untuk di akses di home
                    $_SESSION['id']=$idValue;
                    $_SESSION['username']=$usernameValue;
                    $_SESSION['fullname']=$fullname;
                    $_SESSION['level']=$levelValue;
                    $_SESSION['id']=$idValue;
                    header("Location: sb/index.php");
                }else{
                    $error="username atau password salah";                  
                }
            }else{
               $error = "user tidak ditemukan";             
            }
        }else{
            $error="data tidak boleh kosong";          
        }
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
    <h2 class ="col-6">Halo , Silahkan Login</h2>
    <form action="login.php" method="post" class="col-6">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
            <label for="floatingPassword">Password</label>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>   
        <a href="register.php">          tidak punya akun ? klick saya</a>    
    </form>
    </div>
    </div>
</div>
</body>
</html>

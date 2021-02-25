<?php
session_start();
if (isset($_SESSION['user'])) {
    header("location: index.php");
} else {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body {
        width: 100%;
        height: 600px;
        margin: 0px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login {
        display: flex;
        flex-direction: column;
        padding: 10px;
        text-align: center;
        height: auto;
        width: 300px;
        padding-top: 20px;
        padding-bottom: 20px;
        border-radius: 30px;
        background-color: burlywood;
    }

    input {
        margin-bottom: 15px;
    }

    .main {
        width: 75%;
        background-color: royalblue;
        border-radius: 35px;
        display: flex;
        justify-content: space-between;
        /* justify-content: center; */
        align-items: center;
        padding: 40px;
        padding-left: 90px;
        padding-right: 90px;
    }
    .title{
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 55%;
    }
</style>

<body>
    <div class="main">
        <div class="title">
            <h1 style="margin: 0px; color: white;">MY Article</h1>
            <h3 style="margin: 0px; color: white;">Ayo buat artikelmu disini.</h3>
        </div>
        <div class="login">
            <h4>Login</h4>
            <form action="" method="post">
                <input type="text" name="user" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" name="login" value="Masuk" id="">
            </form>
            <?php
            if (isset($_POST['login'])) {
                if (empty($_POST['user'])||empty($_POST['pass'])) {
                    echo "<script>alert('Username atau Password kosong!')</script>";
                } else {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    include('../database/koneksi.php');
                    $read = new Read;
                    $data = $read->login($user, $pass);
                    if ($data=="null") {
                        echo "<script>alert('Akun tidak ditemukan!')</script>";
                    } elseif ($data=="error") {
                        echo "<script>alert('Password salah!')</script>";
                    } else {
                        $_SESSION['user']=$data;
                        echo "<script>window.location.replace('index.php')</script>";
                    }
                    
                }
                
            }
            ?>
            <p>Sudah punya akun? <a href="daftar.php">Daftar</a></p>
        </div>
    </div>
</body>

</html>
<?php }?>
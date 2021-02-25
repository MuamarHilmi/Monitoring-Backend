<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location: index.php');
} else {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
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

    .title {
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
            <h4>Registrasi</h4>
            <form action="" method="post">
                <input type="text" class="inp-text" name="name" placeholder="Nama"><br>
                <input type="radio" id="male" name="gender" value="L">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="P">
                <label for="female">Female</label><br>
                <input type="text" class="inp-text" name="user" placeholder="Username">
                <input type="password" class="inp-text" name="pass" placeholder="Password">
                <input type="password" class="inp-text" name="passconfirm" placeholder="Confirm Password">
                <input type="submit" name="daftar" value="Daftar" id="">
            </form>
            <?php
            if (isset($_POST['daftar'])) {
                if (empty($_POST['name'])||empty($_POST['gender'])||empty($_POST['user'])||empty($_POST['pass'])||empty($_POST['passconfirm'])) {
                    echo "<script>alert('Data tidak boleh kosong!')</script>";
                }elseif ($_POST['pass']!==$_POST['passconfirm']) {
                    echo "<script>alert('Konfirmasi password salah!')</script>";
                }else {
                    $nama = $_POST['name'];
                    $gender = $_POST['gender'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    include('../database/koneksi.php');
                    $insert = new Insert;
                    $insert->daftar($nama,$gender,$user,$pass);
                    echo "<script>alert('Daftar berhasil!. Kembali login!.')</script>";
                    echo "<script>window.location.replace('login.php')</script>";
                    
                }
            }
            ?>
            <p>Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>

</html>
<?php }?>
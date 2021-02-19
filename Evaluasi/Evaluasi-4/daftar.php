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
        <title>Daftar</title>
    </head>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            height: 600px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login {
            background-color: gray;
            border-radius: 35px;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 350px;
            width: 300px;
        }
        input{
            margin-bottom: 10px;
        }
        form{
            height: auto;
            width: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>

    <body>
        <div class="title"></div>
        <div class="login">
            <h2>Daftar</h2>
            <form action="" method="post">
                <input type="text" name="nama" id="" placeholder="Nama">
                <input type="text" name="user" id="" placeholder="Username">
                <input type="password" name="pass" id="" placeholder="Password">
                <input type="password" name="passconfirm" id="" placeholder="Confirm Password">
                <input type="submit" value="Daftar" name="btn_login">
            </form>
            <?php
                if (isset($_POST['btn_login'])) {
                    if (empty($_POST['nama'])||empty($_POST['user'])||empty($_POST['pass'])||empty($_POST['passconfirm'])) {
                        echo "<script>alert('Data Tidak Boleh Ada yang Kosong!')</script>";
                    }elseif($_POST['pass']!=$_POST['passconfirm']) {
                        echo "<script>alert('Password tidak sama!')</script>";
                    }else {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $nama = $_POST['nama'];
                        include('insert.php');
                        $insert = new Insert;
                        $insert->daftar($user,$pass,$nama);
                        echo "<script>alert('Berhasil Mendaftar, Ulangi Login!')</script>";
                        echo "<script>window.location.replace('login.php')</script>";
                        // header("location: login.php");
                    }
                }
            ?>
            <p>Sudah punya akun? <a href="login.php" style="font-weight: bold; color:blue">Login</a></p>
        </div>
    </body>

    </html>

<?php
}
?>
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
            height: 250px;
            width: 300px;
        }

        input {
            margin-bottom: 10px;
        }

        form {
            height: auto;
            width: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>

    <body>
        <div class="login">
            <h2>Login</h2>
            <form action="" method="post">
                <input type="text" name="user" id="" placeholder="Username">
                <input type="password" name="pass" id="" placeholder="Password">
                <input type="submit" value="Login" name="btn_login">
            </form>
            <?php
            if (isset($_POST['btn_login'])) {
                if (empty($_POST['user']) || empty($_POST['pass'])) {
                    echo "<script>alert('Data Tidak Boleh Ada yang Kosong!')</script>";
                } else {
                    // echo "login";
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    include("database/database.php");
                    $read = new Read;
                    $data = $read->login($user,$pass);
                    // print_r($data);
                    if (empty($data)) {
                        ?><script>alert("Login Gagal!\nPeriksa Username dan Password anda!")</script><?php
                    } else {
                        $_SESSION['user']=$data;
                        header("location: index.php");
                        // echo "berhasil";
                    }

                }
            }
            ?>
            <p>Sudah punya akun? <a href="daftar.php" style="font-weight: bold; color:blue">Daftar</a></p>
        </div>
    </body>

    </html>

<?php
}
?>
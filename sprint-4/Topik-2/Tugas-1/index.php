<?php
if (empty($_COOKIE['user'])) {
    header("location: login.php");
} else {
// print_r($_COOKIE['user']['nama']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<style>
    body {
        width: 100%;
        height: 100%;
        margin: 0px;
    }
    .center{
        width: 100%;
        height: 500px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .logout{
        width: 100%;
        height: 50px;
        background-color: salmon;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .btn{
        margin: 10px;
    }
</style>

<body>
    <div class="logout">
        <form action="" method="post">
            <button type="submit" name="logout" class="btn">Logout</button>
        </form>
        <?php
            if (isset($_POST['logout'])) {
                setcookie("user[nama]", "", 0, "/");
                setcookie("user[pass]", "", 0, "/");
                header("location: login.php");
            }
        ?>
    </div>
    <div class="center">
        <h1>Welcome to Dashboard</h1>
        <h2><?= $_COOKIE['user']['nama']?></h2>
    </div>
</body>

</html>

<?php
}
?>
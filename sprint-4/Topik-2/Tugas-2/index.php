<?php
session_start();
// print_r($_SESSION['user']);
if (empty($_SESSION['user'])) {
    header("location: login.php");
} else {
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
                session_unset();
                session_destroy();
                header("location: index.php");
            }
        ?>
    </div>
    <div class="center">
        <h1>Welcome to Dashboard</h1>
        <h2><?= $_SESSION['user']['username']?></h2>
    </div>
</body>

</html>

<?php
}
?>
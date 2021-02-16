<?php
    include("database.php");
    $database = new Database();
    $data = $database->readId($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>update</h1>
    <form action="" method="post">
        <input type="text" name="nama" value="<?= $data['nama']?>" placeholder="Nama Barang">
        <br><br>
        <input type="text" name="harga" value="<?= $data['harga']?>" placeholder="Harga">
        <br><br>
        <input type="submit" name="btn_update" value="Ubah">
    </form>

    <?php
        if (isset($_POST['btn_update'])) {
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $id = $_GET['id'];
            $database->update($nama, $harga, $id);
            echo "<script>window.location.replace('index.php')</script>";
        }
    ?>
</body>

</html>
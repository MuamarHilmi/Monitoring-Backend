<?php
include("database.php");
$database = new Database();
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
    <h1>Tambah Data</h1>
    <form action="" method="post">
        <input type="text" name="nama" placeholder="Nama Barang">
        <br><br>
        <input type="text" name="harga" placeholder="Harga">
        <br><br>
        <input type="submit" name="btn_tambah" value="Tambah">
    </form>
    <?php
        if (isset($_POST['btn_tambah'])) {
            // echo "tambah";
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $database->insert($nama, $harga);
            echo "<script>window.location.replace('index.php')</script>" ;
        }
    ?>
</body>
</html>
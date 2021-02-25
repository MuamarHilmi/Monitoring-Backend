<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        width: 100%;
        height: 600px;
        margin: 0px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    div {
        display: flex;
        flex-direction: column;
        padding: 10px;
        text-align: center;
        height: auto;
        width: 300px;
        border: 1px solid black;
        background-color: burlywood;
    }
    input {
        margin-bottom: 15px;
    }
</style>
<body>
    <div>
        <h4>Tambah Kategori</h4>
        <form action="" method="post">
            <input type="text" name="kat" placeholder="Kategori">
            <input type="submit" name="tambah_kat" value="Tambah" id="">
            <input type="button" onclick="location.href='tambah.php'" value="Kembali">
        </form>
        <?php 
            include('../database/koneksi.php');
            if (isset($_POST['tambah_kat'])) {
                $kat = $_POST['kat'];
                $insert = new Insert;
                $insert->tbh_kategori($kat);
                echo "<script>window.location.replace('tambah.php')</script>";
            }
        ?>
    </div>
</body>

</html>
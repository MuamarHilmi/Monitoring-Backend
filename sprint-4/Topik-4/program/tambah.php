<?php
include('../database/koneksi.php');
$read = new Read;
$insert = new Insert;
session_start();
if (empty($_SESSION['user'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>
<style>
    body {
        margin: 0px;
        padding: 0px;
        height: 650px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tambah {
        background-color: lightcoral;
        border-radius: 35px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        height: auto;
        width: 80%;
    }

    .bio {
        display: flex;
        justify-content: space-between;
        margin: 10px;
    }

    .artikel {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin: 10px;
    }

    .item-bio {
        display: flex;
        flex-direction: column;
        width: 400px;
    }

    .input-group {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 10px;
        align-items: center;
    }

    .input-group label {
        width: 90px;
    }

    .inp-artikel {
        display: flex;
        margin-bottom: 10px;
        max-width: 100%;
    }

    .inp-artikel textarea {
        min-width: 500px;
        max-width: 100%;
        border-radius: 10px;
        margin-left: 25px;
    }

    .inp-artikel input {
        margin-left: 30px;
    }

    input[type='file'] {
        /* display: none; */
        border-radius: 10px;
        border: 1px solid #ffffff;
    }

    .submit input {
        width: 300px;
        align-self: center;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<body>
    <form action="" method="POST" enctype="multipart/form-data" class="tambah">
        <h2 style="text-align: center; margin-bottom:20px; border-bottom:1px solid black">Buat Artikel</h2>
        <div class="bio">
            <div class="item-bio">
                <div class="input-group">
                    <label for="">Nama:</label>
                    <input type="text" value="<?= $_SESSION['user']['nama'] ?>" name="nama" id="" readonly>
                </div>
                <div class="input-group">
                    <label for="">Kategori:</label>
                    <select name="kategori" name="kategori">
                        <option value="" selected>Pilih Kategori</option>
                        <?php
                        $data = $read->rKategori();
                        foreach ($data as $value) : ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['kategori'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <button type="button" onclick="location.href='tambahkat.php'">+ Kategori</button>
                </div>
                <div class="input-group">
                    <label for="">Judul:</label>
                    <input type="text" placeholder="Judul" name="judul" id="">
                </div>
            </div>
            <div><?= date("l, d F Y") ?></div>
        </div>
        <div class="artikel">
            <label for="" class="inp-artikel">Artikel:
                <textarea name="artikel" id="" cols="30" rows="10"></textarea>
            </label>
            <label for="" class="inp-artikel">Cover:
                <input type="file" name="cover" id="">
            </label>
            <p>*) Gambar harus 'jpg', 'png', atau 'jpeg'</p>
        </div>
        <div class="submit" style="align-self: center;">
            <input type="submit" name="tambah" value="Tambah">
            <input type="button" onclick="location.href='index.php'" value="Kembali">
        </div>
    </form>
    <?php
    if (isset($_POST['tambah'])) {
        if (empty($_POST['kategori']) || empty($_POST['judul']) || empty($_POST['artikel']) || empty($_FILES['cover'])) {
            echo "<script>alert('Data kosong!')</script>";
        } else {
            $ektensi = ['jpg', 'png', 'jpeg'];
            $filename = $_FILES['cover']['name'];
            $tmpname = $_FILES['cover']['tmp_name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (in_array($ext, $ektensi)) {
                $id = $_SESSION['user']['id_user'];
                $judul = $_POST['judul'];
                $kategori = $_POST['kategori'];
                $artikel = $_POST['artikel'];
                $tgl_post = date("Y-m-d");
                // echo "data benar";
                $insert->iArtikel($id, $judul, $kategori, $artikel, $filename, $tmpname, $tgl_post);
                echo "<script>window.location.replace('index.php')</script>";
            } else {
                echo "<script>alert('File bukan gambar!')</script>";
            }
        }
    }
    ?>
</body>

</html>
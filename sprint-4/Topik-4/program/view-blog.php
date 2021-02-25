<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYArtikel</title>
</head>
<style>
    header,
    footer {
        background-color: #443636;
        color: wheat;
    }

    body {
        width: 100%;
        height: auto;
        margin: 0px;
    }

    header {
        height: 40px;
    }

    footer {
        width: 100%;
        height: 30px;
        position: fixed;
        bottom: 0px;
        text-align: center;
    }

    .center {
        margin: auto;
        padding: 10px;

    }

    .header-judul {
        display: inline;
        font-weight: bold;
        font-size: 25px;
        margin: 20px 5px 10px 10px;
        color: wheat;
        text-decoration: none;
    }

    .header-item {
        display: inline;
        margin: 10px 5px 10px;
        color: wheat;
        text-decoration: none;
    }

    .header-item:hover {
        font-weight: bold;
    }

    .section {
        margin: 10px;
        margin-bottom: 60px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .conten {
        border: 1px solid brown;
        border-radius: 20px;
        width: 70%;
        margin: 10px;
        background-color: #00Ffff;
        padding: 20px;
        display: flex;
        flex-direction: column;
        height: auto;
    }
    .conten h3,.conten img{
        align-self: center;
    }
    .conten p{
        max-width: 100%;
        word-wrap: break-word;
        text-align: justify;
    }
</style>

<body>
    <header class="center">
        <div>
            <a class="header-judul" href="blog.php">MYArtikel</a>
            <a class="header-item" href="index.php">+ Artikel</a>
            <a class="header-item" href="data-blog.php">Data Artikel</a>
        </div>
    </header>
    <section class="section">
        <?php
        include('../database/koneksi.php');
        $read = new Read;
        $data = $read->rArtikelId($_GET['id']);
        ?>
        <div class="conten">
            <a href="data-blog.php?id=<?= $data['id_kategori'] ?>" style="margin: 10px 0; align-self:flex-end">K: <?= $data['kategori'] ?></a>
            <img src="../gambar/<?= $data['cover'] ?>" width="200px" height="200px" onclick="location.href='view-blog.php?id=<?= $data['id_artikel'] ?>'">

            <h3 style="margin: 10px 0" onclick="location.href='view-blog.php?id=<?= $data['id_artikel'] ?>'"><?= $data['judul'] ?></h3>
            <p style="margin: 10px 0"><?= $data['artikel'] ?></p>
        </div>
    </section>
    <footer class="center">
        MyArtikel
    </footer>
</body>

</html>
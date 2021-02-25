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
        height: 210px;
    }

    .conten div {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .conten div h3 {
        cursor: pointer;
        max-width: 40%;
        word-wrap: break-word;
    }

    .conten div h3:hover {
        font-size: 23px;
    }

    .conten img {
        border: 1px solid black;
        border-radius: 20px 0 0 20px;
        margin-right: 20px;
    }

    .conten img:hover {
        border: 5px solid black;
        cursor: pointer;
    }

    .conten p {
        max-height: 50%;
        max-width: 95%;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        word-break: break-all;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .conten a {
        max-width: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
        color: black;
        font-weight: bold;
    }
</style>

<body>
    <header class="center" id="home">
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
        $data = $read->rArtikel();
        foreach ($data as $value) {
        ?>
            <div class="conten">
                <img src="../gambar/<?= $value['cover'] ?>" width="200px" height="200px" onclick="location.href='view-blog.php?id=<?= $value['id_artikel'] ?>'">
                <div>
                    <a href="data-blog.php?id=<?= $value['id_kategori'] ?>" style="margin: 10px 0">K: <?= $value['kategori'] ?></a>
                    <h3 style="margin: 10px 0" onclick="location.href='view-blog.php?id=<?= $value['id_artikel'] ?>'"><?= $value['judul'] ?></h3>
                    <p style="margin: 10px 0"><?= $value['artikel'] ?></p>
                </div>
            </div>
        <?php } ?>
    </section>
    <footer class="center">
        MyArtikel
    </footer>
</body>

</html>
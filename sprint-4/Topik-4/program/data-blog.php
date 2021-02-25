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
        text-align: center;
        height: 210px;
    }

    .judul:hover {
        background-color: brown;
        color: white;
        border-radius: 15px;
        cursor: pointer;
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

        <table class="conten">
            <thead>
                <th>No</th>
                <th>Bambang lah</th>
                <th>Pengarang</th>
                <th>Tanggal Terbit</th>
                <th>Kategori</th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                include('../database/koneksi.php');
                $read = new Read;
                if (isset($_GET['id'])) {
                    $data = $read->rArtikelKat($_GET['id']);
                    // print_r($data);
                } else {
                    $data = $read->rArtikel();
                }
                foreach ($data as $value) :
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td class="judul" onclick="location.href='view-blog.php?id=<?= $value['id_artikel'] ?>'"><?= $value['judul'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['tgl_post'] ?></td>
                        <td><?= $value['kategori'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </section>
    <footer class="center">
        MyArtikel
    </footer>
</body>

</html>
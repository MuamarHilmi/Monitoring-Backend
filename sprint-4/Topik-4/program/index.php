<?php
session_start();
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
        <title>Dasboard</title>
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

        .daftar {
            background-color: gray;
            border-radius: 35px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: auto;
            width: 1000px;
        }

        a {
            text-decoration: none;
            color: black;
            height: 100%;
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid black;
            text-align: center;
        }

        .config {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        button {
            margin: 0px 10px;
        }

        .btn {
            width: auto;
        }

        .aksi {
            display: flex;
            justify-content: center;
        }

        .judul:hover {
            background-color: brown;
            color: white;
            border-radius: 15px;
            cursor: pointer;
        }
    </style>

    <body>
        <div class="daftar">
            <h2 style="text-align: center;">Daftar Artikel</h2>
            <form action="" method="post" class="config">
                <div>
                    <button type="button" onclick="location.href='tambah.php'" style="cursor: pointer;">Tambah</button>
                </div>
                <div>
                    <form action="" method="post">
                        <button type="submit" name="logout" value="exit" style="cursor: pointer;">Logout</button>
                    </form>
                    <?php
                    if (isset($_POST['logout'])) {
                        session_unset();
                        session_destroy();
                        header("location: index.php");
                    }
                    ?>
                    <button type="button" onclick="location.href='blog.php'" style="cursor: pointer;">Blog</button>
                </div>
            </form>
            <table>
                <thead>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tanggal Terbit</th>
                    <th>Kategori</th>
                    <th class="aksi">Aksi</th>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    include('../database/koneksi.php');
                    $read = new Read;
                    $data = $read->rArtikel();
                    foreach ($data as $value) :
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td class="judul" onclick="location.href='view-blog.php?id=<?= $value['id_artikel'] ?>'"><?= $value['judul'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['tgl_post'] ?></td>
                            <td><?= $value['kategori'] ?></td>
                            <td class="aksi">
                                <div class="btn">
                                    <button style="cursor: pointer;" type="button" onclick="location.href='ubah.php?id=<?= $value['id_artikel'] ?>'">Ubah</button>
                                </div>
                                <form action="" method="post" class="btn">
                                    <button style="cursor: pointer;" type="submit" name="hapus" value="<?= $value['id_kategori'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                                </form>
                                <?php
                                if (isset($_POST['hapus'])) {
                                    $hapus = new Database;
                                    $id = $_POST['hapus'];
                                    $query = "DELETE FROM tb_artikel WHERE id_kategori=$id";
                                    $hapus->execute($query);
                                    echo "<script>window.location.replace('index.php')</script>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </body>

    </html>
<?php } ?>
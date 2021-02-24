<?php
session_start();
if (empty($_SESSION['user'])) {
    header("location: login.php");
} else {
    // print_r($_SESSION['user']);
    //     session_unset();
    //     session_destroy();
    // }
    include('database/database.php');
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid black;
        }

        .config {
            display: flex;
            justify-content: flex-end;
            padding: 20px;
        }

        button {
            margin: 0px 10px;
        }
    </style>

    <body>
        <div class="daftar">
            <h2 style="text-align: center;">Daftar Artikel</h2>
            <form action="" method="post" class="config">
                <button type="submit" name="logout" value="exit">Logout</button>
                <a href="#"><button>Blog</button></a>
            </form>
            <?php
            if (isset($_POST['logout'])) {
                session_unset();
                session_destroy();
                header("location: login.php");
            } ?>
            <table>
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Asal</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                    $read = new Read;
                    $data = $read->dt_santri();
                    $i = 1;
                    foreach ($data as $value) :
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['divisi'] ?></td>
                            <td><?= $value['asal'] ?></td>
                            <td>
                                <form action="" method="post">
                                    <button type="submit" value="<?= $value['id'] ?>">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <form action="" method="post">
                        <tr>
                            <td>#</td>
                            <td>
                                <input type="text" name="nama" id="">
                            </td>
                            <td>
                                <input type="text" name="divisi" id="">
                            </td>
                            <td>
                                <input type="text" name="asal" id="">
                            </td>
                            <td>
                                <input type="submit" name="tambah" value="Tambah">
                            </td>
                        </tr>
                    </form>
                    <?php
                    if (isset($_POST['tambah'])) {
                        if (empty($_POST['nama']) || empty($_POST['divisi']) || empty($_POST['asal'])) {
                            echo "<script>alert('Data tidak boleh kosong!')</script>";
                        } else {
                            $insert = new Insert;
                            $insert->tambah($_POST['nama'], $_POST['divisi'], $_POST['asal']);
                            echo "<script>window.location.replace('index.php')</script>";
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </body>

    </html>

<?php } ?>
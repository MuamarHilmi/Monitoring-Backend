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
    <title>Tugas CRUD</title>
</head>
<style>
    .tabel th,
    .tabel td {
        border: 1px solid black;
        padding: 10px;
    }

    .tabel {
        border: 2px solid black;
    }
</style>

<body>
    <h1>Data Barang</h1>
    <a href="insert.php"><button>Tambah</button></a>
    <br>
    <br>
    <table class="tabel">
        <thead>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <form action="" method="post">
                <?php
                $data = $database->readAll();
                // print_r($data);
                $i = 1;
                foreach ($data as $val) :
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $val['nama'] ?></td>
                        <td><?= $val['harga'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $val['id']?>"><button type="button">Ubah</button></a>
                            <button type="submit" name="hapus" value="<?= $val['id'] ?>">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </form>

            <?php
            if (isset($_POST['hapus'])) {
                $val = $_POST['hapus'];
                // echo $val;
                $database->delete($val);
                echo "<script>window.location.replace('index.php')</script>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>
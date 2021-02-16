<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Diterima</h1>
    <?php
    if ($_POST) {
        // print_r($_POST);
    ?>
    <h3>POST</h3>
    <table border="1px" cellpadding="10">
        <thead>
            <th>Nama Barang</th>
            <th>Harga</th>
        </thead>
        <tbody>
            <tr>
                <td><?= $_POST['nama_barang']?></td>
                <td><?= $_POST['harga']?></td>
            </tr>
        </tbody>
    </table>
    <?php
    } else {
        // print_r($_GET);
    ?>
    <h3>GET</h3>
    <table border="1" cellpadding="10">
        <thead>
            <th>Nama Kurir</th>
            <th>Nama Pengirim</th>
            <th>Asal Barang</th>
            <th>Tujuan Barang</th>
        </thead>
        <tbody>
            <tr>
                <td><?= $_GET['nama']?></td>
                <td><?= $_GET['nama_pengirim']?></td>
                <td><?= $_GET['asal']?></td>
                <td><?= $_GET['tujuan']?></td>
            </tr>
        </tbody>
    </table>
    <?php
    }

    ?>
</body>

</html>
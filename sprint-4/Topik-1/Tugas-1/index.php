<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tugas 1-Mengirim Data</h1>
    <br>
    <h3>Post</h3>
    <form action="hasil.php" method="post">
        <input type="text" name="nama_barang" placeholder="Nama Barang">
        <input type="text" name="harga" placeholder="Harga">
        <input type="submit" value="Kirim">
    </form>
    <br>
    <h3>Get</h3>
    <form action="hasil.php" method="get">
    <input type="text" name="nama" placeholder="Nama Kurir">
    <br>
    <br>
    <input type="text" name="nama_pengirim" placeholder="Nama Pengirim">
    <br>
    <br>
    <input type="text" name="asal" placeholder="Asal Barang">
    <br>
    <br>
    <input type="text" name="tujuan" placeholder="Tujuan Barang">
    <br>
    <br>
    <input type="submit" value="kirim">
    </form>
</body>

</html>
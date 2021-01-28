<?php

function luasLingkaran($jari)
{
    $luas = 3.14*$jari**2;
    return $luas;
}

function luasSegitiga($alas, $tinggi)
{
    $luas = 0.5*$alas*$tinggi;
    return $luas;
}

function luasTrapesium($al_atas, $al_bawah, $tinggi)
{
    $luas = ($al_atas + $al_bawah)/2*$tinggi;
    return $luas;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="latihan2.php" method="post">
        <h3>Luas Segitiga</h3>
        <label for="alas"> Alas :
            <input type="text" name="alas" id="">
        </label>
        <br>
        <br>
        <label for="tinggi"> Tinggi :
            <input type="text" name="tinggi" id="">
        </label>
        <br>
        <br>
        <input type="submit" name="hitungsegitiga" value="Hitung Luas">
    </form>
    <br><br>
    <?php
    if (isset($_POST['hitungsegitiga'])) {

        echo "Luas Segitiga = " . luasSegitiga($_POST['alas'], $_POST['tinggi']);
    }
    ?>
    <form action="latihan2.php" method="post">
        <h3>Luas Lingkaran</h3>
        <label for="jari"> Panjang Jari-jari:
            <input type="text" name="jari" id="">
        </label>
        <br>
        <br>
        <input type="submit" name="hitunglingkaran" value="Hitung Luas">
    </form>
    <br><br>
    <?php
    if (isset($_POST['hitunglingkaran'])) {

        echo "Luas Lingkaran = " . luasLingkaran($_POST['jari']);
    }
    ?>
    <form action="latihan2.php" method="post">
        <h3>Luas Trapesium</h3>
        <label for="al_atas"> Alas Atas :
            <input type="text" name="al_atas" id="">
        </label>
        <br>
        <br>
        <label for="al_bawah"> Alas Bawah :
            <input type="text" name="al_bawah" id="">
        </label>
        <br>
        <br>
        <label for="tinggi"> Tinggi :
            <input type="text" name="tinggi" id="">
        </label>
        <br>
        <br>
        <input type="submit" name="hitungtrapesium" value="Hitung Luas">
    </form>
    <br><br>
    <?php
    if (isset($_POST['hitungtrapesium'])) {

        echo "Luas Trapesium = " . luasTrapesium($_POST['al_atas'], $_POST['al_bawah'], $_POST['tinggi']);
    }
    ?>
</body>

</html>
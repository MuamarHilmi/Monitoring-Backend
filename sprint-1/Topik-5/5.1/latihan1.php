<?php

function calcRectangleArea($width, $length)
{
    $luas = $width*$length;
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
    <form action="latihan1.php" method="post">
        <h3>Luas Persegi Panjang</h3>
        <label for="lebar"> Lebar : 
        <input type="text" name="lebar" id="">
        </label>
        <br>
        <br>
        <label for="panjang"> Panjang : 
        <input type="text" name="panjang" id="">
        </label>
        <br>
        <br>
        <input type="submit" name="hitung" value="Hitung Luas">
    </form>
    <br><br>
    <?php
    if (isset($_POST['hitung'])) {
        
        echo "Luas Persegi Panjang = ".calcRectangleArea($_POST['lebar'], $_POST['panjang']);
    }
    ?>
</body>
</html>
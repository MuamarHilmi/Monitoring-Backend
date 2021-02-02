<?php

class Persegi_panjang
{
    public static function Luas($panjang, $lebar)
    {
        $luas = $panjang * $lebar;
        return $luas;
    }

    public static function Keliling($panjang, $lebar)
    {
        $keliling = 2 * ($panjang + $lebar);
        return $keliling;
    }
}

class Lingkaran
{
    public static function Luas($jari)
    {
        $luas = 3.14 * $jari ** 2;
        return $luas;
    }
    public static function Keliling($jari)
    {
        $keliling = 2 * 3.14 * $jari;
        return $keliling;
    }
}

class Trapesium
{
    public static function Luas($a_atas, $a_bawah, $tinggi)
    {
        $luas = ($a_atas + $a_bawah) / 2 * $tinggi;
        return round($luas, 2);
    }
    public static function Keliling($a_atas, $a_bawah, $tinggi)
    {
        $a_samping = sqrt((($a_bawah - $a_atas) / 2) ** 2 + $tinggi ** 2);
        $keliling = (2 * $a_samping) + $a_bawah + $a_atas;
        return round($keliling, 2);
    }
}

echo "
==========================
||  PROGRAM MATEMATIKA  ||
==========================";
while (true) {
    echo "
MENU
-----
1. Persegi Panjang
2. Lingkaran
3. Trapesium
    
Pilih menu: ";
    $menu = trim(fgets(STDIN));
    echo "\n";
    switch ($menu) {
        case 1:
            echo "PERSEGI PANJANG
-----------------
Masukan panjang: ";
            $panjang = trim(fgets(STDIN));
            echo "Masukan lebar: ";
            $lebar = trim(fgets(STDIN));
            echo "
MENGHITUNG
-----------
KELILING = " . Persegi_panjang::Keliling($panjang, $lebar);
            echo "\nLUAS = " . Persegi_panjang::Luas($panjang, $lebar) . "\n";
    
            echo "\nUlang? (y/n)";
            $conf = trim(fgets(STDIN));
            if ($conf=="n") {
                die;
            }
            break;
        case 2:
            echo "LINGKARAN
-----------------
Masukan jari-jari: ";
            $jari = trim(fgets(STDIN));
            echo "
MENGHITUNG
-----------
KELILING = " . Lingkaran::Keliling($jari);
            echo "\nLUAS = " . Lingkaran::Luas($jari) . "\n";
    
            echo "\nUlang? (y/n)";
            $conf = trim(fgets(STDIN));
            if ($conf=="n") {
                die;
            }
            break;
        case 3:
            echo "TRAPESIUM
-----------------
Masukan panjang bawah: ";
            $a_bawah = trim(fgets(STDIN));
            echo "Masukan panjang atas: ";
            $a_atas = trim(fgets(STDIN));
            echo "Masukan tinggi: ";
            $tinggi = trim(fgets(STDIN));
            echo "
MENGHITUNG
-----------
KELILING = " . Trapesium::Keliling($a_atas, $a_bawah, $tinggi);
            echo "\nLUAS = " . Trapesium::Luas($a_atas, $a_bawah, $tinggi) . "\n";
    
            echo "\nUlang? (y/n)";
            $conf = trim(fgets(STDIN));
            if ($conf=="n") {
                die;
            }
            break;
    
        default:
            echo "\"Menu yang anda masukkan tidak ditemukan\"\n";
            break;
    }
}